<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Heiko Greis">
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
                <li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Auftragsabwicklung <span class="caret"></span></a>
                  <ul class="dropdown-menu">
                    <li><a href="/mission/calendar">Kalender</a></li>
                    <li><a href="/mission/new">Auftrag anlegen</a></li>
                    <li><a href="/mission/view">Auftrags-Übersicht</a></li>
                    <li><a href="/mission/viewNoDriver">Fahrer zuweisen</a></li>
                    <li><a href="/mission/viewNoDeliveryNote">Lieferschein eingeben</a></li>
                  </ul>
                </li>
                <li><a href="/menu_invoice">Rechnungswesen</a></li>
                <li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Konfiguration<span class="caret"></span></a>
                  <ul class="dropdown-menu">
                    <li><a href='/drivers'" >Fahrer verwalten</a></li>
                    <li><a href='/customer'" >Kunden verwalten</a></li>
                  </ul>
                </li>
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