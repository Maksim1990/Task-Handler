@extends('layots.app')

@section ('content')


    <div class="col-xs-12 col-sm-10 col-sm-offset-1 col-md-10 col-md-offset-1 col-lg-8 col-lg-offset-2 main">
        <h1 class="head">Создать нового пользователя</h1>
        <p style="text-align: center;">Пожалуйста, заполните поля для создания нового пользователя!</p>
        <div class="col-xs-12 col-sm-10 col-sm-offset-1 col-md-10 col-md-offset-1 col-lg-10 col-lg-offset-1 lines">

        {!! Form::open(['method'=>'POST','action'=>'UserController@store'])!!}

        <div class="form-group">
            {!! Form::label('first_name','Имя:') !!}
            {!! Form::text('first_name', null, ['class'=>'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('middle_name','Отчество:') !!}
            {!! Form::text('middle_name', null, ['class'=>'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('last_name','Фамилия:') !!}
            {!! Form::text('last_name', null, ['class'=>'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('profession','Профессия:') !!}
            {!! Form::text('profession', null, ['class'=>'form-control']) !!}
        </div>
        </div>
        {{--<div class="form-group">--}}
            {{--{{ Form::label('task_id', 'Выбрать задачу') }}--}}
           {{--{!! Form::select('task_id',$tasks->lists('task','id'),null, array('class' => 'form-control'))!!}--}}

        {{--</div>--}}
        <div class="form-group">
            {!! Form::submit('Создать пользователя') !!}
        </div>
        {!! Form::close() !!}


        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{$error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
    </div>