 <nav class="navbar">
    <div class="navbar-inner">
      <ul class="nav">
        <li> <a href="/user"> Users </a></li>
        <li><a href="/articleDetail"> Articles </a></li>
      </ul>
      
      @if (Auth::check())
      <div id="userInfo">
        <a href="{{ URL::to('user/' . Auth::id()) }}"><h3>Me</h3></a>
        <a href="{{ URL::to('/auth/logout') }}"><h3>Log out</h3></a>
      </div>
      @else
      <div id="inscription">
        <a href="{{ URL::to('/auth/login') }}"><h3>Sign in</h3></a>
        <a href="/user/create"><h3> Join</h3> </a>
      </div>
      @endif 
    </div>
  </nav>   