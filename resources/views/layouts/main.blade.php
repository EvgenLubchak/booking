<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Booking</title>
    <script type="text/javascript" src="{{ url('/js/jquery321.min.js') }}" /></script>
    <script type="text/javascript" src="{{ url('/js/momentjs2181.min.js') }}" /></script>
    <script type="text/javascript" src="{{ url('/js/daterangepicker310.min.js') }}" /></script>
    <link rel="stylesheet" type="text/css" href="{{ url('/css/daterangepicker310.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ url('/css/bootstrap520.css') }}" />
</head>
<body >
<main>
    <div class="container py-4 d-flex flex-column min-vh-100">
        <header class="border-bottom">
            <a href="/" class="d-flex align-items-center text-dark text-decoration-none">
                <span class="fs-4">Booking</span>
            </a>
        </header>
        @yield('content')
        <footer class="pt-3 mt-2 text-muted border-top mt-auto">
            John © 2022
        </footer>
    </div>
</main>
</body>
</html>
