@extends('layots.app')

@section ('content')
    <div class="col-sm-8 col-sm-offset-2 main">


        <p>Пожалуйста, заполните поля для создания новой задачи</p>
    </div>
    <div class="col-sm-8 col-sm-offset-2  main" >
        {!! Form::open(['method'=>'POST','action'=>'TaskController@store'])!!}

        <div class="form-group">
            {!! Form::label('task','Название задачи:') !!}
            {!! Form::text('task', null, ['class'=>'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('task_value','Объём работы:') !!}
            {!! Form::text('task_value', null, ['class'=>'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('status','Статус:') !!}
            {!! Form::select('status', ['Не начата'=>'Не начата','В процессе'=>'В процессе',
            'Завершена'=>'Завершена','Отложена'=>'Отложена'
            ], 'Не начата') !!}
        </div>
        {{--<div class="form-group">--}}
            {{--{!! Form::label('user','Назначить исполнителя:') !!}--}}
            {{--{!! Form::select('user',$users->lists('first_name'),null, array('class' => 'form-control'))!!}--}}
        {{--</div>--}}
        <div class="form-group">
            {!! Form::label('start_date','Дата начала:') !!}
            {!! Form::date('start_date', \Carbon\Carbon::now()) !!}
        </div>
        <div class="form-group">
            {!! Form::label('finish_date','Дата окончания:') !!}
            {!! Form::date('finish_date', \Carbon\Carbon::now()) !!}
        </div>
        <div class="form-group">
            {!! Form::submit('Создать задачу') !!}
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