@extends('app')


@section('content')
	<h1>{{$article->title}}</h1>
	@if($log==true && $user==$article->user_id)
		<h5 style="text-align:right; margin-top:-24px;"><a href="{{ url('/articles/'.$article->id.'/edit') }}" class="btn-link">Edit this article</a></h5>
	@endif
	<hr>
		<article style="text-align:justify">
			{{ $article->body }}
		</article>



	@unless($article->tags->isEmpty())

	<br>
	<strong>Tags : &nbsp;</strong>
	<span>
		@foreach($article->tags as $tag)
			@if($article->tags->last()!=$tag)
				<a href="{!! URL::to('/tags/'.$tag->name) !!}">{{ $tag->name }}</a>, 
			@else
				<a href="{!! URL::to('/tags/'.$tag->name) !!}">{{ $tag->name}}</a>
			@endif
		@endforeach
	</span>
	@endunless

@stop