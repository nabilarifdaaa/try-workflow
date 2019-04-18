<!doctype html>
<html class="no-js" lang="en">

<head>
     <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Internship DOT</title>
    <link href="https://fonts.googleapis.com/css?family=Libre+Franklin:400,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Rubik" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{asset('frontend/css/bootstrap.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('frontend/css/bootstrap-grid.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('frontend/css/style.css')}}">
</head>
<body>  
    <div class="col-sm-12">
         @yield('content')
    </div>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" ></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"></script>
    <script rel="stylesheet" type="text/javascript" src="{{asset('frontend/js/bootstrap.min.js')}}"></script>
@stack("scripts")
</body>
</html>



