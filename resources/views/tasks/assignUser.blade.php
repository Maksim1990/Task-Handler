@extends('layots.app')

@section ('content')

    <div class="col-xs-12 col-sm-10 col-sm-offset-1 col-md-10 col-md-offset-1 col-lg-8 col-lg-offset-2 main">
        <h1 class="head">Назначить задачу</h1>
        <div class="col-xs-12 col-sm-10 col-sm-offset-1 col-md-10 col-md-offset-1 col-lg-10 col-lg-offset-1 lines">
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
        </div>
        <div class="form-group">
            {!! Form::submit('Назначить пользователя') !!}
        </div>

        {!! Form::close() !!}

    </div>

    @yield('footer')