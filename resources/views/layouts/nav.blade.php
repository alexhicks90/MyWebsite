
<header id="banner" class="clearfix" style="height: 30vh; min-height: 250px; no-repeat center center;
      background-size: cover;">
  <div class="container" id="logoContainer">
      <div class="row">
        <div class="col-sm-4">
          <img src="/images/profile.jpg" width="225px" height="225px" alt="Logo" id="logo" class="mx-5 mx-sm-auto">
        </div>
        <div class="col-sm-8">
          <h1>Alex Hicks</h1>
          <h4>Web Developer</h4>
        </div>
        
      </div>
  </div>
</header>



<nav id="mainNav" class="sticky-top navbar navbar-toggleable">
  
  <button class="navbar-toggler navbar-toggler-right" type="button" 
    data-toggle="collapse" data-target="#navCollapse" aria-controls="navCollapse" 
    aria-expanded="false" aria-label="Toggle Navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="container">
  <a href="{{ url('/') }}" class="navbar-brand">
    Alex Hicks
  </a>
  
  <div class="collapse navbar-collapse" id="navCollapse">
    <div class="navbar-nav">
      <a class="{{ Request::is('/') ? 'active' : '' }} nav-item nav-link" href="{{ url('/') }}">Home</a>
      <a class="nav-item nav-link" href="#">Profile</a>
      <a class="{{ Request::is('resume') ? 'active' : '' }} nav-item nav-link" href="{{ url('/resume') }}">Resume</a>
      
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle {{ Request::is('minesweeper*') ? 'active' : '' }}" href="{{ url('/minesweeper/index') }}" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Minesweeper
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="{{ url('/minesweeper/index') }}">Play</a>
          <div class="dropdown-divider"></div>
          <h5 class="dropdown-header">High Scores:</h5>
          <a class="dropdown-item" href="/minesweeper/scores/beginner">Beginner</a>
          <a class="dropdown-item" href="/minesweeper/scores/intermediate">Intermediate</a>
          <a class="dropdown-item" href="/minesweeper/scores/expert">Expert</a>
        </div>
      </li>
      @if (! Auth::check())
        <a class="nav-item nav-link ml-auto" href="login">Login</a>
        <a class="nav-item nav-link ml-auto" href="/register">Register</a>
      @endif
      @if (Auth::check())
        <a class="nav-item nav-link ml-auto" href="#">{{ Auth::user()->name }}</a>
        <a class="nav-item nav-link ml-auto" href="/logout">Logout</a>
      @endif
    </div><!-- navbar-nav -->
  </div> <!-- navbar collapse -->
  </div>
</nav><!-- nav -->


<script src="/js/profilePicAlign.js"></script>
