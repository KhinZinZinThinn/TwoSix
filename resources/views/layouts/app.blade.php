<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <style>
        html , main{
            background: #3f9ae5;
        }
    </style>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!--title>{{ config('app.name', 'Laravel') }}</title>--


    <!-- Scripts -->
    <!--script src="{{ asset('js/app.js') }}" defer></script>--

    <!-- Fonts -->
    <title>@yield('title')</title>
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <!--link href="{{ asset('css/app.css') }}" rel="stylesheet"-->
    <link href="{{URL::to('bootstrap/css/bootstrap.css')}}" rel="stylesheet">
    <link href="{{URL::to('fontawesome/css/all.css')}}" rel="stylesheet">
    <link href="{{URL::to('css/dataTables.css')}}" rel="stylesheet">

</head>
<body>
    <div id="app">
        @include('layouts.nav_bar')

        <main>
            @yield('content')

        </main>
    </div>
<script src="{{asset('bootstrap/js/jquery.js')}}"></script>
<script src="{{asset('bootstrap/js/bootstrap.js')}}"></script>
<script src="{{asset('js/dataTables.js')}}"></script>
<script src="{{asset('js/bstdataTb.js')}}"></script>
<script>
    $(function () {
        $("#dataTb").dataTable();
    })
</script>
</body>
</html>
