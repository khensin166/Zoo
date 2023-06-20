<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name= "viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <link rel = "stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+1" crossorigin="anonymous">

        <title>@yield('Title')</title>
    </head>
    <body>
        <div class ="container">
            <nav class="navbar navbar-dark bg-dark">
                <a class="navbar-brand" href="#">
                    <img src="{{asset('gambar/logo.png')}}" width="30" height="30" class="d-inline-block align-top" alt="">
                    Dealer KitaAja
                </a>
            </nav>
        </div>
        @yield('content')

        <script src="http://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH01sSSs5nCTpuj/zy4c+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
    </body>
</html>
