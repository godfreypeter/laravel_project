@extends('app')


@section('content')
	<h1>{{$article->title}}</h1>
	@if($log==true && $user==$article->user_id)
		<h5 style="text-align:right; margin-top:-24px;"><a href="{{ url('/articles/'.$article->id.'/edit') }}" class="btn-link">Edit this article</a></h5>
	@endif
	<hr>
		<article style="text-align:justify">
			{{{ $article->body }}}
		</article>

	@unless($article->tags->isEmpty())
	<h5>Tags :</h5>
	<ul>
		@foreach($article->tags as $tag)
			<li>{{ $tag->name }}</li>
		@endforeach
	</ul>
	@endunless

@stop