<!DOCTYPE html>
<html>
    <head>
        <title>Task Handler</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.4.8/angular.min.js"></script>
        <link href="{!! asset('css/font-awesome.min.css') !!}" media="all" rel="stylesheet" type="text/css" />
        <link href="{!! asset('css/fonts.css') !!}" media="all" rel="stylesheet" type="text/css" />
        <link href="{!! asset('css/set1.css') !!}" media="all" rel="stylesheet" type="text/css" />
        <link href="{!! asset('css/style.css') !!}" media="all" rel="stylesheet" type="text/css" />
        <link rel="shortcut icon" href="{!! asset('favicon.ico') !!}">
        <script>
            function printTime(){
                var d = new Date();
                var hours=d.getHours();
                hours = ("0" + hours).slice(-2);
                var mins= d.getMinutes();
                mins = ("0" + mins).slice(-2);
                var secs=d.getSeconds();
                secs = ("0" + secs).slice(-2);
                var time=document.getElementById("time");
                time.style.color = "gray";
                time.style.fontSize = "25px";
                time.style.marginTop = "4px";
                time.style.fontFamily = "Track";
                time.innerHTML=hours+":"+mins+":"+secs;

            }
            setInterval(printTime, 1000);
        </script>
    </head>
    <body>
        <div class="col-xs-12 col-sm-10 col-sm-offset-1 col-md-10 col-md-offset-1 col-lg-10 col-lg-offset-1  main1" >
            <div class="col-sm-9"><a data-toggle="modal" data-target="#myModal3"><i class="fa fa-question-circle" aria-hidden="true"></i></a></div>

            <div class="modal fade" id="myModal3" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title" id="myModalLabel">О приложении Task Handler</h4>
                        </div>
                        <div class="modal-body">

                        </div>
                        <div class="modal-footer">

                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-3" id="time"></div>
            <div class="col-xs-10 col-xs-offset-1 col-sm-4 col-sm-offset-1  col-md-4 col-md-offset-1 col-lg-4 col-lg-offset-1 " >
                    <div class="grid">
                        <figure class="effect-layla">
                            <img src="{!! asset('img/2.jpg') !!}"/>
                            <figcaption>
                                <h2>Список <span>задач</span></h2>
                                <p>When Layla appears, she brings an eternal summer along.</p>
                                <a href="{{route('tasks.index')}}" >View more</a>
                            </figcaption>
                        </figure>

                    </div>
                </div>
            <div class="col-xs-10 col-xs-offset-1 col-sm-4 col-sm-offset-1  col-md-4 col-md-offset-1 col-lg-4 col-lg-offset-1 " >
                    <div class="grid">
                        <figure class="effect-layla">
                            <img src="{!! asset('img/1.jpg') !!}"/>
                            <figcaption class="two">
                                <h2>Список <span>пользователей</span></h2>
                                <p>When Layla appears, she brings an eternal summer along.</p>
                                <a href="{{route('tasks.users')}}" >View more</a>
                            </figcaption>
                        </figure>

                    </div>
                </div>
            <marquee style="color: gray; font-size: 33px; font-weight: bolder; line-height: 150%; text-shadow: #000000 0px 1px 1px;">
               Эффективное приложение для управления задачами, отслеживания статутса и планирования рабочего процесса.
            </marquee>
        </div>
        <script>
            // For Demo purposes only (show hover effect on mobile devices)
            [].slice.call( document.querySelectorAll('a[href="#"') ).forEach( function(el) {
                el.addEventListener( 'click', function(ev) { ev.preventDefault(); } );
            } );
        </script>
        <script>
            $(document).ready(function(){
                $('[data-toggle="tooltip"]').tooltip();
            });
        </script>
    </body>

</html>




