@extends('app')


@section('content')

	<h1>Articles </h1>
	<hr>
	@foreach($articles as $article)
		<article>
			<h3>
				<a href="{{ url('/articles',$article->id) }}">{{ $article->title }}</a>
			</h3>
			<body>{{ $article->body }}</body>
		</article>
	@endforeach

@stop