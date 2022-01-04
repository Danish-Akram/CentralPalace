<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="{{asset('css/navbar.css')}}">


    <title>Central Palace</title>

   <body>
       <nav class="">
            @yield('navbar')
        </nav>
    <script src="{{asset('js/jquery-3.6.0.js')}}"></script>


    </body>
</html>

