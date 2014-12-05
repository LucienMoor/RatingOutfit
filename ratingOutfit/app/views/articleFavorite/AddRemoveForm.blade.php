@if (Auth::check())
@if (Favorite::ifExist( $data['userID'],$data['articleID']))
    {{ Form::open(array('url' => 'articleFavorite/' . Favorite::findID($data['userID'],$data['articleID']))) }}
        {{ Form::hidden('_method', 'DELETE') }}
        {{Form::submit('delete favorite', array('class' => 'btn btn-primary'))}}
@else
    {{ Form::open(array('url' => 'articleFavorite')) }}
        {{Form::hidden('userID', $data['userID'])}}
        {{Form::hidden('articleID',$data['articleID'])}}
        {{Form::submit('add to favorites', array('class' => 'btn btn-primary'))}}
@endif
 {{ Form::close() }}
@endif