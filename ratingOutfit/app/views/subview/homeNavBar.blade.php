 <nav class="navbar">
    <div class="navbar-inner">
      <ul class="nav">
        <li> <a href="/user"> Users </a></li>
        <li><a href="/articleDetail"> Articles </a></li>
      </ul>
      
      
      
      <div id="inscription">
        @if (Auth::check())
        <a href="{{ URL::to('user/' . Auth::id()) }}"><h3>Me</h3></a>
        <a href="{{ URL::to('/auth/logout') }}"><h3>Log out</h3></a>
        @else
        <a href="{{ URL::to('/auth/login') }}"><h3>Sign in</h3></a>
        <a href="/user/create"><h3> Join</h3> </a>
        @endif 
      </div>
    
    </div>
  </nav>   