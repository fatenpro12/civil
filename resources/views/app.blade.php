<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" style="height: 100%;overflow-y: auto;">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Dubtec</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    <!-- Styles -->
    <link href="{{ asset('react/css/app.css?20210220') }}" rel="stylesheet">

</head>

<body>
    <div id="app">
        <!--style="margin-right: 7px;"-->
    </div>
    <script src="{{ asset('react/main/js/app.js?20210220') }}" defer></script>

    <style>
        body {
            overflow: unset !important;
            padding-right: 0px!important;
        }
    </style>
</body>




</html>
