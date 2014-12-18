
    <a href="{{ URL::to('articleDetail/create') }}">Create an article</a>
      <h3>@include('subview.searchBar')</h3>
      <table class="table table-striped table-bordered">
      <tr>
        <th>title</th>
        <th>description</th>
        <th>number of votes</th>
        <th>points</th>
        <th>picture</th>
        <th>style</th>
        <th>gender</th>
      </tr>
          @foreach($articles as $key => $value)
      <tr>
          
        <p>
          <td>{{$value->title}}</td>
          <td> {{ $value->description }}</td>
          <td>{{ $value->nbVotes() }}</td>
          <td> {{ $value->point }}</td>
          
          <td>{{HTML::image("pictures/article/$value->picture")}}</td>
          <td> {{ $value->style->style }}</td>
          <td>{{ $value->gender() }}</td>
          <td><a class="btn btn-small btn-success" href="{{ URL::to('articleDetail/' . $value->id) }}">Show this article</a></td>
          @if (Auth::check())
            @if (Auth::id()==$value->user_ID)
          <td>
          {{ Form::open(array('url' => 'articleDetail/' . $value->id, 'class' => 'pull-right')) }}
                    {{ Form::hidden('_method', 'DELETE') }}
                    {{ Form::submit('Delete this article', array('class' => 'btn btn-warning')) }}
            {{ Form::close() }}
          </td>
          <td>
            <?php $data=array('userID'=>Auth::id(),'articleID'=>$value->id);
             echo View::make('articleFavorite.AddRemoveForm')->with('data',$data);
            ?>

          </td>
          <td><a class="btn btn-small btn-info" href="{{ URL::to('articleDetail/' . $value->id . '/edit') }}">Edit this article</a></td>
        @endif
      @endif
      </tr>
         @endforeach
      </table>