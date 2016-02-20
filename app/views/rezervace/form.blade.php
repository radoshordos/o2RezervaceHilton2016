@extends('rezervace')


@section('content')
    {{ Form::open(['route' => 'root','class' => 'form-horizontal', "method"=> "GET", 'role' => 'form']) }}
    <div class="form-group">
        {{ Form::label("fullname","Celé jméno",['class'=> 'col-sm-3 control-label']) }}
        <div class="col-sm-9">
            {{ Form::input('text','fullname',null,['required' => 'required', 'maxlength' => '128', 'class'=> 'form-control', 'id'=> 'fullname']) }}
        </div>
    </div>
    <div class="form-group">
        {{ Form::label("telefon","Kontaktní telefon",['class'=> 'col-sm-3 control-label']) }}
        <div class="col-sm-9">
            {{ Form::input('tel','telefon',null,['required' => 'required', 'maxlength' => '16', 'class'=> 'form-control', 'id'=> 'telefon']) }}
        </div>
    </div>

    <div class="form-group">
        {{ Form::label("email","Firemní email",['class'=> 'col-sm-3 control-label']) }}
        <div class="col-sm-9">
            {{ Form::input('email','email',null,['required' => 'required', 'maxlength' => '128', 'class'=> 'form-control', 'id'=> 'email']) }}
        </div>
    </div>

    <div class="form-group">
        {{ Form::label("tikets","Zakoupit lístků",['class'=> 'col-sm-3 control-label']) }}
        <div class="col-sm-9">
            {{ Form::select('tikets',["1" => "Mám závazný zájem o 1 vstupenku za cenu 300Kč", "2" => "Mám závazný zájem o 2 vstupenky za cenu 600Kč"], null, ['required' => 'required', 'class'=> 'form-control', 'id'=> 'tikets']) }}
        </div>
    </div>

    <div class="form-group">
        <div class="col-sm-offset-3 col-sm-9">
            @if ($volne_vstupenky > 0)
                {{ Form::submit("Závazně rezervovat",['class'=> 'btn btn-lg btn-success']) }}
            @else
                {{ Form::submit("Přihlásit se jako náhradník",['class'=> 'btn btn-lg btn-success']) }}
            @endif
        </div>
    </div>
    {{ Form::close() }}
@stop