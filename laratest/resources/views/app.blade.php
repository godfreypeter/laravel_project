<!doctype html>

<html lang="en">

<head>
	<meta charset="UTF-8"></meta>
	<title>My Blog</title>
	{!! Html::style('css/all.css') !!}
</head>



<body>

  @include('partials.nav')


	<div class="container">
		@include('flash::message')

		@yield('content')
	</div>


	<script>
		$('#flash-overlay-modal').modal();
		//$('div.alert').not('.alert-important').delay(3000).slideUp(300);
	</script>
	{!! Html::script('js/all.js') !!}
	@yield('footer')
</body>

</html>