<!doctype html>

<html lang="en">

<head>
	<meta charset="UTF-8"></meta>
	<title>My First App</title>
	<link rel="stylesheet" type="text/css" href="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
</head>



<body>
	<div class="container">
		@include('flash::message')

		@yield('content')
	</div>


	<script>
		$('#flash-overlay-modal').modal();
		//$('div.alert').not('.alert-important').delay(3000).slideUp(300);
	</script>

	<script src="../js/all.js"></script>
	@yield('footer')
</body>

</html>