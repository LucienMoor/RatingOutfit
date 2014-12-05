@extends('viewTemplate')

@section('head')
  {{$header or '<title>Rating Outfit</title>'}}
@stop

@section('body')
    {{ $view or 'Error : no view' }}
@stop
