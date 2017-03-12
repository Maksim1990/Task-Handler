@extends('layots.app')

@section ('content')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.4.8/angular.min.js"></script>
    <div class="col-xs-12 col-sm-10 col-sm-offset-1 col-md-10 col-md-offset-1 col-lg-10 col-lg-offset-1 main" ng-app="myApp" ng-controller="namesCtrl">
        <h1 class="head">Список задач</h1>

{{--Adding searching function basesd on Angular $scope--}}
        <p><input type="text" ng-model="test" placeholder="Искать...">

        Название задачи:<span ng-bind="test" class="test"></span></p>

        <div class="col-xs-12 col-sm-9"></div>
        <div class="col-xs-12col-sm-3" id="time"></div>
        <div class=" lines2">
            <table style="width:100%">
                @if(!$tasks->isEmpty())
                <tr>
                    <th>№ Номер</th>
                    <th>Идентификатор задачи</th>
                    <th >Название<span data-html="true" data-placement="left" data-toggle="tooltip" title="Кликните на название задачи для изменения названия, описания, статуса, а также даты начала и окончания"><i class='fa fa-exclamation-circle' aria-hidden='true'></i></span></th>
                    <th>Объём работы</th>
                    <th>Дата начала</th>
                    <th>Дата окончания</th>
                    <th>Статус</th>
                    <th>Исполнитель</th>
                </tr>
                <?php $i=1; ?>

                @foreach($tasks as $task)
                    {{--Loop through Angular $scope and bind Angular data to HTML. Searching is based on ng-bind data--}}
                <tr  ng-repeat="x in names | filter:test" ng-if="'{{$task->task}}' == x.task">

                    <td><?= $i;?></td>
                    <?php $i++;?>
                    <td ng-bind="x.id"></td>
                    <td>
                        <a href="{{route('tasks.edit',compact('task') )}}" ng-bind="x.task" ></a>
                    </td>
                    <td ng-bind="x.taskValue"></td>
                    <td>{{$task->start_date}}</td>
                    <td>{{$task->finish_date}}</td>
                    <?php
                    $notStarted = str_contains($task->status, 'Не начата');
                    $inProcess = str_contains($task->status, 'В процессе');
                    $finished = str_contains($task->status, 'Завершена');
                    $postponed = str_contains($task->status, 'Отложена');
                    $fa="<i class='fa fa-info-circle' aria-hidden='true'></i>";
                    $info="<p class='info'>
                                <span><i class='fa fa-circle' aria-hidden='true' style='color:blue;'></i>Не начата</span></br>
                                <span><i class='fa fa-circle' aria-hidden='true' style='color:yellow;'></i>В процессе</span></br>
                                <span><i class='fa fa-circle' aria-hidden='true' style='color:green;'></i>Завершена</span></br>
                                <span><i class='fa fa-circle' aria-hidden='true' style='color:red;'></i>Отложена</span></br>
                                </p>";
                    ?>
                    @if($notStarted)
                            <td   style="background-color: blue;"><a href="#" data-html="true" data-placement="left" data-toggle="tooltip" title="<?= $info;?>"><?= $fa;?></a></td>
                     @elseif($inProcess)
                        <td  style="background-color: yellow;"><a href="#" data-html="true" data-placement="left" data-toggle="tooltip" title="<?= $info;?>"><?= $fa;?></a></td>
                    @elseif($finished)
                        <td style="background-color: green;"><a href="#" data-html="true" data-placement="left" data-toggle="tooltip" title="<?= $info;?>"><?= $fa;?></a></td>
                    @else  <td  style="background-color: red;"><a href="#" data-html="true" data-placement="left" data-toggle="tooltip" title="<?= $info;?>"><?= $fa;?></a></td>
                    @endif

                    <td>
                        {{--Check for user existance--}}
                        @if(!$task->users->isEmpty())
                            <ol >
        @foreach($task->users as $user)
                      <li ><a  data-html="true" data-placement="left" data-toggle="tooltip" title="{{$user->profession}}" href="{{route('tasks.showUser',compact('user') )}}" >{{$user->first_name}}  {{$user->middle_name}}   {{$user->last_name}}</a></li></br>
        @endforeach
                            </ol>
                            <button type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#myModal2">
                                Назначить ещё
                            </button>

                            <div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                            <h4 class="modal-title" id="myModalLabel">Выбрать исполнителя</h4>
                                        </div>
                                        <div class="modal-body" >
                                            @foreach($users as $user)
                                                <a style="margin-bottom: 5px;" href="{{route('tasks.assignUser',compact('user') )}}" class="btn btn-success btn-sm">{{$user->first_name}}  {{$user->middle_name}}   {{$user->last_name}}<br><span style="color:yellow;">{{$user->profession}}</span></a>
                                            @endforeach
                                        </div>
                                        <div class="modal-footer">

                                        </div>
                                    </div>
                                </div>
                            </div>
                        @else <p class="warning">Исполнитель ещё не назначен!</p>

                        <button type="button" class="btn btn-danger btn-md" data-toggle="modal" data-target="#myModal1">
                            Назначить
                        </button>

                        <div class="modal fade" id="myModal1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                        <h4 class="modal-title" id="myModalLabel">Выбрать исполнителя</h4>
                                    </div>
                                    <div class="modal-body">
                                        @foreach($users as $user)
                     <a style="margin-bottom: 5px;" href="{{route('tasks.assignUser',compact('user') )}}" class="btn btn-success btn-sm">{{$user->first_name}}  {{$user->middle_name}}   {{$user->last_name}}<br><span style="color:yellow;">{{$user->profession}}</span></a>
                                        @endforeach
                                    </div>
                                    <div class="modal-footer">

                                    </div>
                                </div>
                            </div>
                        </div>
                        @endif
                    </td>
                    @endforeach
                </tr>
  @else <p class="warning" style="margin-top: 10px;">К сожалению, ни одной задачи ещё не создано!
   <a href="{{route('tasks.create')}}" class="btn btn-warning btn-sm">Создать задачу</a></p>
   @endif



            </table>


    <h6><a href="{{route('tasks.create')}}" class="btn btn-success btn-sm">Создать новую задачу</a></h6>
    <h6><a href="{{route('tasks.createUser')}}" class="btn btn-success btn-sm">Создать нового пользователя</a></h6>
   <h6><a href="{{route('tasks.users')}}" class="btn btn-success btn-sm">Перейти к списку пользователей</a></h6>
        <script>
            var app=angular.module('myApp', []);
            app.controller('namesCtrl', function($scope) {
                $scope.names = [
                    @foreach($tasks as $task)
                    { task:'{{$task->task}}',taskValue:'{{$task->task_value}}',id:'{{$task->id}}'},
                    @endforeach

                ];

            });

        </script>

    </div>
    </div>
    <script>
        $(document).ready(function(){
            $('[data-toggle="tooltip"]').tooltip();
        });
    </script>
