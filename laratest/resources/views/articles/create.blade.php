@extends('app')


@section('content')
	<h1>Write A New Article</h1>

	<hr>

	{!! Form::open(['url' => 'articles']) !!}

		@include('articles.form', ['submitbutton' => 'Add Article'])

	{!! Form::close() !!}

	@include('errors.list')

@stop