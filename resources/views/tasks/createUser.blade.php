@extends('layots.app')

@section ('content')


    <div class="col-sm-8 col-sm-offset-2  main" >
        <div class="top" >


            <p>Пожалуйста, заполните поля для создания нового пользователя!</p>
        </div>
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