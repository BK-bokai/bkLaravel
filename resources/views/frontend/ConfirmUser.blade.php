<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield("title")</title>

    <meta name="csrf-token" content="{{ csrf_token() }}" />



    <!-- Compiled and minified CSS -->
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css"> -->
    <link rel="stylesheet" href="{{ asset('css/materialize.min.css') }}">


    <!-- materializecss icons -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">


    <!-- jqury CDN -->
    <!-- <script src="{{ asset('js/jquery-3.4.1.min.js') }}" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script> -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>

    <!-- Compiled and minified JavaScript -->
    <script src="{{ asset('js/materialize.min.js') }}"></script>

    <!-- font-awesom -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.9.0/css/all.css">

    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <![endif]-->


    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-sweetalert/1.0.1/sweetalert.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-sweetalert/1.0.1/sweetalert.css">

    <!--css樣式-->

    <!-- <link rel="stylesheet" href="{{ asset('css/style.css') }}" charset="utf-8"> -->

    <!-- <link rel="Shortcut Icon" type="image/x-icon" href="img/PBLAP_logo_small_c.png"> -->
    <!-- @yield('js') -->

</head>

<body>
    <!-- @include("frontend.layouts.menu") -->
    <!-- <main> -->
    <!-- @yield("content") -->
    <!-- </main> -->
    <!-- @include("frontend.layouts.footer") -->
    <div class="row container">
        <div class="col s12 center">
            <h1 class="">註冊完成</h1>
        </div>
    </div>
    <div class="col s12 center">
    <a href="{{route('login')}}" class="waves-effect waves-light btn center">請進登入頁面</a>
    </div>
    </div>

</body>

</html>