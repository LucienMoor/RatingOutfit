
  <nav class="navbar">
    <div class="navbar-inner">
      <ul class="nav">
        <li><a href="{{ URL::to('user/'.$user->id) }}"> {{{$user->pseudo}}}'s Profil</a></li>
        <li><a href="{{ URL::to('/articleList/'.$user->id) }}"> Favorite Articles </a></li>
        <li><a href="{{ URL::to('/contactList/'.$user->id) }}"> Favorite Users </a></li>
        <li><a href="{{ URL::to('/allUserComment/'.$user->id) }}"> Comments </a></li>
      </ul>
      @if (Auth::check())
      <div id="userInfo">
      <a href="{{ URL::to('user/' . Auth::id()) }}">Me</a>
      </div>
      @else
      <div id="inscription">
        <a href="{{ URL::to('/auth/login') }}"><h3>Sign in</h3></a>
        <a href="/user/create"><h3> Join</h3> </a>
      </div>
      @endif 
    </div>
  </nav>   

