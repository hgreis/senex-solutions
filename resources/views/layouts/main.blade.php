<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Senex-Solutions</title>
    <link href="{{ asset('/css/app.css') }}" rel="stylesheet">
</head>
 
<body>
 
<nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="/index.php">STRERATH-Transporte</a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
            <ul class="nav navbar-nav">
                <li><a href="/mission">Auftragsabwicklung</a></li>
                <li><a href="/dekra">Transport</a></li>
                <li><a href="/config">Konfiguration</a></li>
            </ul>
        </div><!--/.nav-collapse -->
    </div>
</nav>
 
<div class="container">
 
    @yield('content')
 
</div><!-- /.container -->
 
<script src="/js/app.js"></script>
</body>
</html>