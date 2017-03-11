@extends('layots.app')

@section ('content')

    <div class="col-sm-8 col-sm-offset-2 main">
        <h1>Изменить пользователя</h1>
        {!! Form::model($users,['method'=>'PATCH','action'=>['UserController@update',$users->id]])!!}
        {{ csrf_field() }}

        <div class="form-group">
            {!! Form::label('first_name','Имя:') !!}
            {!! Form::text('first_name', null, ['class'=>'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('middle_name','Фамилия:') !!}
            {!! Form::text('middle_name', null, ['class'=>'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('last_name','Отчество:') !!}
            {!! Form::text('last_name', null, ['class'=>'form-control']) !!}
        </div>
        <div class="form-group">
            {{ Form::label('task_id', 'Назначить задачу') }}
            {!! Form::select('task_id',$tasks->lists('task','id'),null, array('class' => 'form-control'))!!}

        </div>
        <div class="form-group">
            {!! Form::submit('Изменить пользователя') !!}
        </div>

        {!! Form::close() !!}

        {!! Form::open(['method'=>'DELETE','action'=>['UserController@destroy',$users->id]])!!}
        {{ csrf_field() }}
        {!! Form::submit('Удалить пользователя') !!}

        {!! Form::close() !!}
    </div>

    @yield('footer')