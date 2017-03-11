@extends('layots.app')

@section ('content')
    <div class="top" >
        <div class="col-sm-8 col-sm-offset-2 main">
            <h1 class="head"><a href="{{route('tasks.editUser',compact('user'))}}" >{{$user->first_name}}  {{$user->middle_name}}   {{$user->last_name}}</a></h1>
            <a href="{{route('tasks.assignUser',compact('user') )}}" class="btn btn-success btn-sm">Назначить задачу</a>
            <a href="{{route('tasks.editUser',compact('user') )}}" class="btn btn-warning btn-sm">Изменить/удалить пользователя</a>


        </div>

    </div>