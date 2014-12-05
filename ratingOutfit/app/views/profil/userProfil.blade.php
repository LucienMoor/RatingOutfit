
  <nav class="navbar">
    <div class="navbar-inner">
      <ul class="nav">
        <li><a href="{{ URL::to('user/'.$user->id) }}"> {{{$user->pseudo}}}'s Profil</a></li>
        <li><a href="{{ URL::to('/articleList/'.$user->id) }}"> Favorite Articles </a></li>
        <li><a href="{{ URL::to('/contactList/'.$user->id) }}"> Favorite Users </a></li>
        <li><a href="{{ URL::to('/allUserComment/'.$user->id) }}"> Comments </a></li>
      </ul>
    </div>
  </nav>   

