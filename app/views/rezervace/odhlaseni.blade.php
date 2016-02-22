@extends('rezervace')

@section('content')
    {{ Form::open(['route' => 'root','class' => 'form-horizontal', "method"=> "GET", 'role' => 'form']) }}
    <div class="form-group">
        <div class="text-center">
            {{ Form::submit("Zrušit rezervaci",['class'=> 'btn btn-lg btn-success']) }}
        </div>
    </div>
    {{ Form::close() }}
@stop

