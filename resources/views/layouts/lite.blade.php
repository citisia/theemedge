<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>

    <meta name="csrf-token" content="{{ csrf_token() }}"/>
    @hasSection('title')
        <title>@yield('title') - Theem Edge</title>
    @else
        <title>Theem Edge</title>
@endif

<!-- Stylesheets -->
    <link href="/css/all.css" rel="stylesheet"/>
    <link href="/css/app.css" rel="stylesheet"/>
    <style type="text/css">
        .navbar-header {
            float: left;
            padding: 15px;
            text-align: center;
            width: 100%;
        }

        .navbar-brand {
            float: none;
        }

        .footer {
            position: absolute;
            bottom: 0;
            width: 100%;
            /* Set the fixed height of the footer here */
            height: 60px;
            background-color: #f5f5f5;
        }
    </style>
    <!-- CSRF Token -->
    <script>
        window.Laravel = {!! json_encode([
            'csrfToken' => csrf_token(),
        ]) !!};
    </script>

</head>
<body>
<header>
    <nav class="navbar navbar-default">
        <div class="container-fluid">
            <div class="navbar-header">
                <a class="navbar-brand " href="/">
                    Theem Edge
                </a>
            </div>
        </div>
    </nav>
</header>
@yield('content')
<footer class="footer">
    <div class="container">
        <p class="">
            <i class="fa fa-copyright fa-fw"></i> Theem College of Engineering, 2017 - {{ \Carbon\Carbon::now()->year }}
        </p>
    </div>
</footer>
<script src="/js/all.js"></script>
<script src="/js/app.js"></script>
</body>
</html>