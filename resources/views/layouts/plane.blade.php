<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en" class="no-js">
<!--<![endif]-->
<head>
    <meta charset="utf-8"/>
    <title>Go Queer v1.0</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1" name="viewport"/>
    <meta content="" name="description"/>
    <meta content="" name="author"/>
    <link rel="stylesheet" href="{{ URL::asset("css/styles.css") }}" />
    <link rel="stylesheet" href="{{ asset("css/leaflet.css") }}" />
    <link href="https://fonts.googleapis.com/css?family=Archivo+Narrow:400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
    <script type="text/javascript" src="{{ URL::asset('js/home/jquery-3.2.1.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('js/src/leaflet.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('js/src/leaflet.draw.js') }}"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
    <style>
        html, body {
            background-color: #fff;
            color: #000001;
            font-family: 'Archivo', cursive;
            font-weight: 100;
            height: 100vh;
            margin: 0;
        }
    </style>

</head>
<body>
@yield('body')
<style type="text/css">
    h3 p {
        font-family: 'Abril Fatface', cursive;
    }
</style>
</body>
>
</html>
