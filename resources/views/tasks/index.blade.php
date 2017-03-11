@extends('layots.app')

@section ('content')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.4.8/angular.min.js"></script>
    <div class="col-sm-10 col-sm-offset-1  main" ng-app="myApp" ng-controller="namesCtrl" >


        <p><input type="text" ng-model="test" placeholder="Искать...">

        Название задачи:<span ng-bind="test" class="test"></span></p>

        <div class="col-sm-9"></div>
        <div class="col-sm-3" id="time"></div>
            <table style="width:100%">

                <tr>
                    <th>№ Номер</th>
                    <th>Идентификатор задачи</th>
                    <th>Название</th>
                    <th>Объём работы</th>
                    <th>Дата начала</th>
                    <th>Дата окончания</th>
                    <th>Статус</th>
                    <th>Исполнитель</th>
                </tr>
                <?php $i=1; ?>
                @foreach($tasks as $task)

                <tr  ng-repeat="x in names | filter:test" ng-if="'{{$task->task}}' == x.task">

                    <td><?= $i;?></td>
                    <?php $i++;?>
                    <td ng-bind="x.id"></td>
                    <td>
                        <a href="{{route('tasks.edit',compact('task') )}}" ng-bind="x.task"></a>
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
                        @if(!$task->users->isEmpty())
                            <ol >
        @foreach($task->users as $user)
                      <li ><a href="{{route('tasks.showUser',compact('user') )}}" >{{$user->first_name}}  {{$user->middle_name}}   {{$user->last_name}}</a></li></br>
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
                                                <a href="{{route('tasks.assignUser',compact('user') )}}" class="btn btn-success btn-sm">{{$user->first_name}}  {{$user->middle_name}}   {{$user->last_name}}</a>
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
                     <a href="{{route('tasks.assignUser',compact('user') )}}" class="btn btn-success btn-sm">{{$user->first_name}}  {{$user->middle_name}}   {{$user->last_name}}</a>
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

            </table>


    <h6><a href="{{route('tasks.create')}}" >Создать новую задачу</a></h6>
    <h6><a href="{{route('tasks.createUser')}}" >Создать нового пользователя</a></h6>

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
    <script>
        $(document).ready(function(){
            $('[data-toggle="tooltip"]').tooltip();
        });
    </script>
