@if (Contact::ifExist( $data['userID'],$data['contactID']))
    {{ Form::open(array('url' => 'contact/' . Contact::findID($data['userID'],$data['contactID']), 'class' => 'pull-right')) }}
        {{ Form::hidden('_method', 'DELETE') }}
        {{Form::submit('delet contact', array('class' => 'btn btn-primary'))}}
@else
    {{ Form::open(array('url' => 'contact')) }}
        {{Form::hidden('userID', $data['userID'])}}
        {{Form::hidden('contactID',$data['contactID'])}}
        {{Form::submit('add to contact', array('class' => 'btn btn-primary'))}}
@endif
 {{ Form::close() }}