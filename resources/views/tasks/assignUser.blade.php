@extends('layots.app')

@section ('content')

    <div class="col-sm-8 col-sm-offset-2 main">
        <h1>Назначить задачу</h1>
        {!! Form::model($users,['method'=>'PATCH','action'=>['UserController@update',$users->id]])!!}
        {{ csrf_field() }}

        {{--<div class="form-group">--}}
            {{--{{ Form::label('task_id', 'Назначить исполнителя') }}--}}
            {{--{!! Form::select('task_id',$users->lists('first_name','id'),null, array('class' => 'form-control'))!!}--}}

        {{--</div>--}}
        {{--<div class="form-group">--}}
            {{--{!! Form::label('middle_name','Фамилия:') !!}--}}
            {{--{!! Form::text('middle_name', null, ['class'=>'form-control']) !!}--}}
        {{--</div>--}}
        {{--<div class="form-group">--}}
            {{--{!! Form::label('last_name','Отчество:') !!}--}}
            {{--{!! Form::text('last_name', null, ['class'=>'form-control']) !!}--}}
        {{--</div>--}}
        <div class="form-group">
            {{ Form::label('task_id', 'Назначить задачу') }}
            {!! Form::select('task_id',$tasks->lists('task','id'),null, array('class' => 'form-control'))!!}

        </div>
        <div class="form-group">
            {!! Form::submit('Назначить пользователя') !!}
        </div>

        {!! Form::close() !!}

    </div>

    @yield('footer')