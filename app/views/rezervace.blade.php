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
    @include('part.jumbotron')
    <hr/>

    <div class="include">
        @include('rezervace.notifications')
        @yield('content')
    </div>

    @include('part.footer')
</div>
<script src="/components/jquery/jquery.min.js"></script>
<script src="/components/bootstrap/dist/js/bootstrap.min.js"></script>
</body>
</html>