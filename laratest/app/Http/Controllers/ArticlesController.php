<?php

namespace App\Http\Controllers;

use App\Articles;

use App\Http\Requests;
use App\Http\Requests\ArticleRequest;
use Illuminate\HttpResponse;
use App\Http\Controllers\Controller;
use Request;

class ArticlesController extends Controller
{

	public function __construct()
	{
		$this->middleware('auth', ['only'=>'create']);
	}

	public function index()
	{
		$articles = Articles::latest("published_at")->published()->get();
		return view('articles.index', compact('articles'));
	}

	public function show($id)
	{
		$article = Articles::findorFail($id);
		return view('articles.show', compact('article'));
	}

	public function create()
	{
		if(\Auth::guest())
		{
			return redirect('articles');
		}
		return view('articles.create');
	}

	public function store(ArticleRequest $request)
	{
		$request=$request->all();
		$request['user_id'] = \Auth::user()->id;
		Articles::create($request);
		return redirect('articles');
	}

	public function edit($id)
	{
		$article = Articles::findOrFail($id);
		return view('articles.edit', compact('article'));
	}

	public function update($id, ArticleRequest $request)
	{
		$article= Articles::findOrFail($id);
		$article->update($request->all());
		return redirect('articles');
	}
}
