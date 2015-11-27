@extends('app')


@section('content')
	<h1>Write A New Article</h1>

	<hr>

	{!! Form::model($article = new \App\Articles, ['url' => 'articles']) !!}

		@include('articles.form', ['submitbutton' => 'Add Article'])

	{!! Form::close() !!}

	@include('errors.list')

@stop