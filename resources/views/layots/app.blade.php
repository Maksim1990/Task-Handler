<!DOCTYPE html>
<html>
<head>
    <title>Task Handler</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.4.8/angular.min.js"></script>
    <link href="{!! asset('css/font-awesome.min.css') !!}" media="all" rel="stylesheet" type="text/css" />
    <link href="{!! asset('css/fonts.css') !!}" media="all" rel="stylesheet" type="text/css" />
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

            @yield('contact')
        </div>
    </div>
    <div class="col-sm-10 col-sm-offset-1">
        <div class="col-sm-2 col-sm-offset-4">
            <a href="{{url()->previous()}}">   <img id="back" src="{!! asset('img/back.png') !!}"></a>
        </div>

        <div class="col-sm-5 col-sm-offset-1 ">
            <a href="{{URL::to('/')}}">    <img id="home" src="{!! asset('img/home.png') !!}"></a>
        </div>
    </div>
    </div>
</div>

@yield('footer')
<script>
    $(function() {
        $("#home").mouseover(function(){
            $(this)[0].src="{!! asset('img/home1.png') !!}";
        });
        $("#home").mouseout(function(){
            $(this)[0].src="{!! asset('img/home.png') !!}";
        });

    });
    $(function() {
        $("#back").mouseover(function(){
            $(this)[0].src="{!! asset('img/back1.png') !!}";
        });
        $("#back").mouseout(function(){
            $(this)[0].src="{!! asset('img/back.png') !!}";
        });

    });
</script>

</body>
</html>