{{ HTML::style('css/main.css') }}
    <a href="{{ URL::to('articleDetail/create') }}">Create an article</a>

      <h3>@include('subview.searchBar')</h3>

      <div class="grid">

          @foreach($articles as $key => $value)
        <div class="grid-item">
          <h3>{{$value->title}}</h3><br/>
          {{ $value->description }}<br/>
          {{ $value->nbVotes() }}<br/>
          {{ $value->point }}<br/>
          
          {{HTML::image("pictures/article/$value->picture")}}<br/>
          {{ $value->style->style }}<br/>
          {{ $value->gender() }}<br/>
          <a class="btn btn-small btn-success" href="{{ URL::to('articleDetail/' . $value->id) }}">Show this article</a><br/>
          @if (Auth::check())
            @if (Auth::id()==$value->user_ID)
          
            {{ Form::open(array('url' => 'articleDetail/' . $value->id, 'class' => 'pull-right')) }}
                      {{ Form::hidden('_method', 'DELETE') }}
                      {{ Form::submit('Delete this article', array('class' => 'btn btn-warning')) }}
              {{ Form::close() }}
            <br/>

              <?php $data=array('userID'=>Auth::id(),'articleID'=>$value->id);
               echo View::make('articleFavorite.AddRemoveForm')->with('data',$data);
              ?>
            <br/>
            <a class="btn btn-small btn-info" href="{{ URL::to('articleDetail/' . $value->id . '/edit') }}">Edit               this article</a><br/>
        @endif
      @endif
      </div>
    @endforeach
</div>
<br/>
