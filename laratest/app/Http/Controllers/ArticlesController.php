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
use App\ArticleTag;
use DB;

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



	public function show(Articles $article)
	{
		return view('articles.show', compact('article'));
	}



	public function tag($tags)
	{
		$tag_id=Tag::getTagId($tags);
		$tagarticle = ArticleTag::getTagedArticle($tag_id);
		foreach($tagarticle as $article_id)
		{
			$articles[] = DB::table('articles')->where('id', $article_id->article_id)->get();
		}
		for ($i = 0, $c = count($articles); $i < $c; ++$i) {
		    $articles[$i] = (array) $articles[$i];
		}
		return view('articles.tag', compact('articles'));
		//return $articles;
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
