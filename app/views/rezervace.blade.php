<!DOCTYPE html>
<html lang="cs">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="Radek Horáček">
    <title>Společenský večer v hotelu Hilton</title>
    <link href="/components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="/css/style.css" rel="stylesheet">
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body>

<div class="container">
    <div class="header clearfix">
        <nav>
            <ul class="nav nav-pills pull-right">
                <li><a href="/email/navstevnik">V</a></li>
                <li><a href="/email/nahradnik">N</a></li>
            </ul>
        </nav>
        <h3 class="text-muted">Společenský večer v hotelu Hilton – registrace</h3>
    </div>

    <div class="jumbotron">

        <p>Vážená kolegyně, vážený kolego,<br/>
            vítáme vás na registrační stránce na <strong>Společenský večer</strong>, který se bude konat <strong>v sobotu 19. března 2016</strong> v pražském hotelu Hilton.
            Registrace je pro pozvané zaměstnance otevřena od 23. února do 1. března 2016 (nebo do vyčerpání kapacity). Vstupenky v ceně 300 Kč za jeden kus bude možné nakupovat od 26. 2. 2016.
        </p>
        <p><strong>Svůj závazný zájem, prosím, potvrďte v e-mailu, který bude doručen do vaší služební e-mailové schránky.</strong></p>

        <p><i>Odborové organizace Prahy a Středočeského kraje</i></p>
    </div>

    <hr/>

    <div class="include">
        @include('rezervace.notifications')
        @yield('content')
    </div>

    <footer class="footer">
        @if ($is_visitor === true)
            <p>Do vyprodání zbývá ještě <strong>{{ $volne_vstupenky }}</strong> lístků. Poté se bude možné přihlásit jen jako náhradník.</p>
        @else
            <p>Vstupenky jsou vyčerpány, ale můžete se přihlásit jako <strong>{{ abs($volne_vstupenky) }}</strong>. náhradník.</p>
        @endif
    </footer>
</div>
<script src="/components/jquery/jquery.min.js"></script>
<script src="/components/bootstrap/dist/js/bootstrap.min.js"></script>
</body>
</html>