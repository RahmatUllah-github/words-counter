<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="msapplication-TileColor" content="#b6b4ed" />
    <meta name="msapplication-TileImage" content="{{ asset('images/logos/thewordscounter-logo.png') }}" />

    @yield('meta')

    <meta name="robots" content="index, follow" />

    <link rel="icon" type="image/x-icon" href="{{ asset('images/logos/thewordscounter-logo.png') }}">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="/css/style.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css"
        integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Playfair:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/js/app.js'])

    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

    @yield('css')

    {{-- <script async src="https://www.googletagmanager.com/gtag/js?id=GA_MEASUREMENT_ID"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());
        gtag('config', 'G-XTF11F8N14');
        // Stream Id = 5290357554
    </script> --}}
</head>

<body>
    <div id="app">
        <div style="background-color: #47b2e4; line-height: 0; display: flex;">
            <div class="menu-toggle" id="hamburger">
                <i class="fas fa-bars"></i>
            </div>
            <div class="overlay"></div>
            <div class="nav_width">
                <h1 class="d-md-none" style="font-size: 3rem;">
                    <a style="font-size: 3rem;" href="{{ route('web') }}">
                        <img src="{{ asset('images/logos/thewordscounter-logo.png') }}" height="60" class="img-responsive" alt="The Words Counter" />
                    </a></h1>
                <div class="container">
                    <nav>
                        <h1 style="font-size: 3rem;" class="brand d-md-block d-none">
                            <a style="font-size: 3rem;" href="{{ route('web') }}">
                                <img src="{{ asset('images/logos/thewordscounter-logo.png') }}" height="60" class="img-responsive" alt="The Words Counter" />
                            </a>
                        </h1>
                        <ul>
                            <li><a href="{{ route('web') }}">Home</a></li>
                            <li><a href="{{ route('blogs.index') }}">Blogs</a></li>
                            <li><a href="{{ route('contactus.index') }}">Contact</a></li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>

        <main class="py-4">
            @yield('content')
        </main>


        <footer class="footer">
            <div class="waves">
                <div class="wave" id="wave1"></div>
                <div class="wave" id="wave2"></div>
                <div class="wave" id="wave3"></div>
                <div class="wave" id="wave4"></div>
            </div>
            <ul class="social-icon">
                <li class="social-icon__item"><a class="social-icon__link" href="#">
                        <ion-icon name="logo-facebook"></ion-icon>
                    </a></li>
                <li class="social-icon__item"><a class="social-icon__link" href="#">
                        <ion-icon name="logo-twitter"></ion-icon>
                    </a></li>
                <li class="social-icon__item"><a class="social-icon__link" href="#">
                        <ion-icon name="logo-linkedin"></ion-icon>
                    </a></li>
                <li class="social-icon__item"><a class="social-icon__link" href="#">
                        <ion-icon name="logo-instagram"></ion-icon>
                    </a></li>
            </ul>
            <ul class="menu">
                <li class="menu__item"><a class="menu__link" href="{{ route('web') }}">Home</a></li>
                <li class="menu__item"><a class="menu__link" href="{{ route('blogs.index') }}">Blogs</a></li>
                <li class="menu__item"><a class="menu__link" href="{{ route('contactus.index') }}">contact</a></li>

            </ul>
            <p class="text-center">&copy;{{ date('Y') }} {{ config('app.name') }} | All Rights Reserved</p>
        </footer>
    </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"
    integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"
    integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
</script>
<script>
    $(document).ready(function() {
        var open = $('#hamburger');
        var changeIcon = true;

        open.on("click", function() {
            var overlay = $('.overlay');
            var nav = $('nav');
            var icon = $('.menu-toggle i');

            overlay.toggleClass("menu-open");
            nav.toggleClass("menu-open");

            if (changeIcon) {
                icon.removeClass("fa-bars");
                icon.addClass("fa-times");

                changeIcon = false;
            } else {
                icon.removeClass("fa-times");
                icon.addClass("fa-bars");
                changeIcon = true;
            }
        });
    });
</script>

@yield('script')
</html>
