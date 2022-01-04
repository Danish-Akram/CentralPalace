<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->

    <title>ElectroMart</title>


    <!-- Fonts -->
    <link rel="stylesheet" href="{{asset('css/companyForm.css')}}">
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    <link rel="stylesheet" href="{{ asset('css/fontawesome.css') }}">
    <link rel="stylesheet" href="{{asset('css/navbar.css')}}">
    <link rel="stylesheet" href="{{asset('css/form.css')}}">

<body style="background-color: #EDF1F5">
   <main class="" >
    @yield('content')
        </main>
        <script src="{{asset('js/script.js')}}"></script>
        <script src="{{asset('js/jquery-3.6.0.js')}}"></script>
        <script src="{{asset('js/form_validation.js')}}"></script>
        <script src="{{asset('js/canvasJS/canvasjs.min.js') }}"></script> 

    </body>
</html>
