@extends('layots.app')

@section ('content')
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.4.8/angular.min.js"></script>

    <div class="top" >
        <div class="col-xs-12 col-sm-10 col-sm-offset-1 col-md-10 col-md-offset-1 col-lg-8 col-lg-offset-2 main" ng-app="myApp" ng-controller="userCtrl">
            <p ><h1 class="head green">Список пользователей</h1></p>
            <p><input type="text" ng-model="test" placeholder="Искать...">
            <div class="col-xs-12 col-sm-10 col-sm-offset-1 col-md-10 col-md-offset-1 col-lg-10 col-lg-offset-1 lines">
            <ol>
        @foreach($users as $user)
            <li class="st" ng-repeat="x in names | filter:test" ng-if="'{{$user->first_name}}  {{$user->middle_name}}   {{$user->last_name}}' == x"><a href="{{route('tasks.showUser',compact('user') )}}" ng-bind="x" class="st"></a>
            ---- <span>{{$user->profession}}</span>
            </li></br>
        @endforeach
</ol>
                </div>
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 ">
            <h6><a href="{{route('tasks.createUser')}}" class="btn btn-success btn-sm">Создать пользователя</a></h6>
            <h6><a href="{{route('tasks.index')}}" class="btn btn-warning btn-sm">Перейти к списку задач</a></h6>
            </div>
        </div>
    </div>
    <script>
        var app=angular.module('myApp', []);
        app.controller('userCtrl', function($scope) {
            $scope.names = [
                    @foreach($users as $user)
               '{{$user->first_name}}  {{$user->middle_name}}   {{$user->last_name}}',
                @endforeach

            ];

        });

    </script>