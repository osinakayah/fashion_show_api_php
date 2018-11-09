<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Fincash</title>

    <!-- Styles -->
    <style>
        html, body {
            background-color: #fff;
            color: #636b6f;
            font-family: 'Raleway', sans-serif;
            font-weight: 100;
            height: 100vh;
            margin: 0;
        }
    </style>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
</head>
<body>
<div class="container">
    <div class="row" style="text-align: center">
        <div class="col-xs-12 col-sm-6 col-md-4 col-md-offset-4" >
            <img style="text-align: center; height: 120px; width: 120px" class="img-responsive" src="{{URL::asset('logo.png')}}">
        </div>
    </div>
    <div class="row">
        <div class="col-xs-12 col-sm-6 col-md-4 col-md-offset-4" ><strong>Dear {{$emailMessage}},</strong></div>
    </div>
    <div class="row">
        <div class="col-xs-12 col-sm-6 col-md-4 col-md-offset-4">{{$recipientName}}<br><br></div>
    </div>
    <div class="row">
        <div class="col-xs-12 col-sm-6 col-md-4 col-md-offset-4">For more information Contact:
            <br>
            <strong>+2348160831611</strong><br>
            <br><br>
            Regards.<br>
            Monary
        </div>
    </div>
</div>
</body>
</html>
