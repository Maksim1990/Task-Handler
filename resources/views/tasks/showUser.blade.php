@extends('layots.app')

@section ('content')
    <div class="top" >
        <div class="col-xs-12 col-sm-10 col-sm-offset-1 col-md-10 col-md-offset-1 col-lg-8 col-lg-offset-2 main">

            <h1 class="head"><a href="{{route('tasks.editUser',compact('user'))}}" >{{$user->first_name}}  {{$user->middle_name}}   {{$user->last_name}}</a></h1>
            <div class="buttons-lines">
            <a href="{{route('tasks.assignUser',compact('user') )}}" class="btn btn-success btn-sm">Назначить задачу</a>
            <a href="{{route('tasks.editUser',compact('user') )}}" class="btn btn-warning btn-sm">Изменить/удалить пользователя</a>
            </div>
                <div class="col-xs-12 col-sm-10 col-sm-offset-1 col-md-10 col-md-offset-1 col-lg-10 col-lg-offset-1 lines">
              <div class="line">
                 <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3 st">Фамилия<span class="move">:</span> </div>
                <div class="col-xs-12 col-sm-8 col-sm-offset-1 col-md-8 col-md-offset-1 col-lg-8 col-lg-offset-1 st2">{{$user->last_name}} </div>
              </div>
                <div class="line">
                <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3 st">Имя<span class="move">:</span> </div>
                <div class="col-xs-12 col-sm-8 col-sm-offset-1 col-md-8 col-md-offset-1 col-lg-8 col-lg-offset-1 st2">{{$user->first_name}} </div>
              </div>
                <div class="line">
                 <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3 st">Отчество<span class="move">:</span> </div>
                <div class="col-xs-12 col-sm-8 col-sm-offset-1 col-md-8 col-md-offset-1 col-lg-8 col-lg-offset-1 st2">{{$user->middle_name}} </div>
                </div>
                <div class="line">
                <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3 st">Профессия<span class="move">:</span> </div>
                <div class="col-xs-12 col-sm-8 col-sm-offset-1 col-md-8 col-md-offset-1 col-lg-8 col-lg-offset-1 st2">{{$user->profession}} </div>
                </div>
              </div>

        </div>

    </div>