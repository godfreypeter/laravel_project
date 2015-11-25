<!doctype html>

<html lang="en">

<head>
	<meta charset="UTF-8"></meta>
	<title>My Blog</title>
	{!! Html::style('css/all.css') !!}
</head>



<body>

    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="{!! URL::to('/') !!}">My Blog</a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
          <ul class="nav navbar-nav">
            <li><a href="{!! URL::to('/articles') !!}">Articles</a></li>
            <li><a href="{!! URL::to('/articles/create') !!}">Create Article</a></li>
            <li><a href="#contact">Contact</a></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>



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