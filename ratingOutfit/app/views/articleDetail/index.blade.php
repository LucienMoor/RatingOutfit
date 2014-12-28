
{{ HTML::style('css/main.css') }}
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script src="http://masonry.desandro.com/masonry.pkgd.js "></script>
<script src="https://rawgithub.com/desandro/classie/master/classie.js"></script>
<div class="page">
  @if (Auth::check())
    <div class="createArticle"><a href="{{ URL::to('articleDetail/create') }}">Create an article</a></div>
  @endif
  <br/>
        <div class="filter">@include('subview.filter')</div>

        <div class="grid">
            @foreach($articles as $key => $value)
          <div class="grid-item <?php echo $value->style->style.' '.$value->gender(); ?> all">
            <h3>{{$value->title}}</h3><br/>
            {{ $value->description }}<br/>
            {{ $value->nbVotes() }}<br/>
            {{ $value->point }}<br/>

            {{HTML::image("pictures/article/$value->picture","outfit image", array('class' => 'item'))}}<br/>
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


              <br/>
              <a class="btn btn-small btn-info" href="{{ URL::to('articleDetail/' . $value->id . '/edit') }}">Edit this article</a><br/>
          @endif
                            <?php $data=array('userID'=>Auth::id(),'articleID'=>$value->id);
                 echo View::make('articleFavorite.AddRemoveForm')->with('data',$data);
                ?>
        @endif
        </div>
      @endforeach
  </div>
  </div> 
  <br/>
<script>
  $(document).ready(function(){
      var container = document.querySelector('.grid');


  eventie.bind( container, 'click', function( event ) {
    // don't proceed if item was not clicked on
    if ( !classie.has( event.target, 'item' ) ) {
      return;
    }
    // change size of item via class
    classie.toggle( event.target, 'gigante' );
    // trigger layout
  });
    
  });


</script>

