<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel demo</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <!-- Style -->
    <style>
        .input-box { position: relative; }
        .unit { position: absolute; display: block; left: 5px; top: 10px; z-index: 9; }
        .fixedTxtInput { display: block; border: 1px solid #d7d6d6; background: #fff; padding: 10px 10px 10px 30px; width: 100%; }
    </style>
    </head>
    <body>
    @yield('content')
    </body>
</html>
