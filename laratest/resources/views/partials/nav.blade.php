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
        @if($log==true)<li><a href="{!! URL::to('/articles/create') !!}">Create Article</a></li>@endif
      </ul>

      <ul class="nav navbar-nav navbar-right">
        @if($log==true)
          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Hi {{ $user }} <span class="caret"></span></a>
        @else
          <li class="dropdown">
            <a href="{!! URL::to('/auth/login') !!}" class="dropdown">Login</a></li>

          <li class="dropdown">
            <a href="{!! URL::to('/auth/register') !!}" class="dropdown-toggle">Register</a>
        @endif
        @if($log==true)
          <ul class="dropdown-menu">
            <!-- <li role="separator" class="divider"></li> -->
            <li>
              <a href="{!! URL::to('/auth/logout') !!}">Logout</a>
            </li>
          </ul>
        @endif
        </li>
      </ul>
    </div>
  </div>
</nav>