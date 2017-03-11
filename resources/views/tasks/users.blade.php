@extends('layots.app')

@section ('content')


        <div class="col-sm-8 col-sm-offset-2 main">
            <div class="top" >  </div>
<ol>
        @foreach($users as $user)
            <li><a href="{{route('tasks.showUser',compact('user') )}}">{{$user->first_name}}  {{$user->middle_name}}   {{$user->last_name}}</a></li></br>
        @endforeach
</ol>
            <h6><a href="{{route('tasks.createUser')}}" >Create New User</a></h6>

    </div>
