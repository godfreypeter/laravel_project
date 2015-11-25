<?php

namespace App\Http\Controllers;

use App\Articles;

use Auth;

use App\Http\Requests;
use App\Http\Requests\ArticleRequest;
use Illuminate\HttpResponse;
use App\Http\Controllers\Controller;
use Request;
use App\Tag;

class ArticlesController extends Controller
{

	public function __construct()
	{
		$this->middleware('auth', ['only'=>'create']);
	}



	public function index()
	{
		$articles = Articles::latest("published_at")->published()->get();

		$latest = Articles::latest()->first();
		return view('articles.index', compact('articles', 'latest'));
	}



	public function show(Articles $article)
	{
		return view('articles.show', compact('article'));
	}



	public function create()
	{
		$tags = Tag::lists('name', 'id');
		return view('articles.create', compact('tags'));
	}



	public function store(ArticleRequest $request)
	{

		$this->createArticle($request);
		
		flash()->overlay('Your article has been successfully created!', 'Good Job.');

		return redirect('articles');
	}



	public function edit(Articles $article)
	{
		$tags = Tag::lists('name', 'id');
		return view('articles.edit', compact('article', 'tags'));
	}



	public function update(Articles $article, ArticleRequest $request)
	{
		$article->update($request->all());

		$this->syncTag($article, $request->input('tag_list'));

		return redirect('articles');
	}



	private function syncTag(Articles $article, array $tags)
	{
		$article->tags()->sync($tags);
	}



	private function createArticle(ArticleRequest $request)
	{
		$article = Auth::user()->articles()->create($request->all());

		$this->syncTag($article, $request->input('tag_list'));

		return $article;
	}



}