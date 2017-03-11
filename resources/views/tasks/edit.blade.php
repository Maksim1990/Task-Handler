@extends('layots.app')

@section ('content')

    <div class="col-sm-8 col-sm-offset-2 main">
        <h1>Изменить задачу</h1>
        {!! Form::model($tasks,['method'=>'PATCH','action'=>['TaskController@update',$tasks->id]])!!}
        {{ csrf_field() }}

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
            {{--{!! Form::select('user',$users->lists('first_name','first_name'),null, array('class' => 'form-control'))!!}--}}
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
            {!! Form::submit('Изменить задачу') !!}
        </div>
        {!! Form::close() !!}

        {!! Form::open(['method'=>'DELETE','action'=>['TaskController@destroy',$tasks->id]])!!}
        {{ csrf_field() }}
        {!! Form::submit('Удалить задачу') !!}

        {!! Form::close() !!}
    </div>

    @yield('footer')