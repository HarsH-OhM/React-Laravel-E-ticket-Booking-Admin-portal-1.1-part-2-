

<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>React with Laravel</title>
    <!-- Styles -->
    <link href="{{ ('app.css') }}" rel="stylesheet">
</head>
<body>
<div class="content">
        <div id="app"  class="title m-b-md">
        </div>
    </div> 

    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>