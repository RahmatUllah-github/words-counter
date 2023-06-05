<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <meta name="keywords"
        content="words counter, character counter, sentence counter, text case converter, online tool, free tool" />
    <meta name="description"
        content="The Words Counter is a free online tool that helps you count words, characters, and sentences in your text. It also offers a convenient text case converter, allowing you to easily change the case of your text to uppercase, lowercase, title case, camel case, toggle case, pascal case, snake case, kebab case. Try our Words Counter tool today and efficiently analyze and modify your text." />
    <meta name="robots" content="index, follow" />
    <meta name="msapplication-TileColor" content="#b6b4ed" />
    <meta name="msapplication-TileImage" content="{{ asset('images/logos/logo.png') }}" />
    <meta property="og:title" content="The Words Counter" />
    <meta property="og:description" content="Free online word, character, and sentence counter tool." />
    <meta property="og:url" content="https://www.thewordscounter.com" />
    <meta property="og:image" content="{{ asset('images/logos/logo.png') }}" />
    <link rel="canonical" href="https://www.thewordscounter.com" />

    <title>The Words Counter - Free Online Word, Character, and Sentence Counter and Text Case Converter</title>
    <link rel="icon" type="image/x-icon" href="{{ asset('images/logos/favicon-32x32.png') }}">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css"
        integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])

    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

    @yield('css')

    <script async src="https://www.googletagmanager.com/gtag/js?id=GA_MEASUREMENT_ID"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());
        gtag('config', 'G-XTF11F8N14');
        // Stream Id = 5290357554
    </script>
</head>

<body>
    <div id="app">
        <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
            <div class="container-fluid px-3">
                <a href="/" class="navbar-brand">
                    <img src="{{ asset('images/logos/logo.png') }}" height="50" alt="TheWordsCounter">
                </a>
                <button type="button" class="navbar-toggler" data-bs-toggle="collapse"
                    data-bs-target="#navbarCollapse">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarCollapse">
                    <div class="navbar-nav">
                        <a href="/" class="nav-item nav-link active">Home</a>
                        {{-- <a href="/" class="nav-item nav-link">Blogs</a> --}}
                        <a href="{{ route('contactus.index') }}" class="nav-item nav-link">Contact</a>
                    </div>
                </div>
            </div>
        </nav>

        <main class="py-4" @auth style="margin-left: 20%; width: 80%" @endauth>
            @yield('content')
        </main>
    </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"
    integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"
    integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js"
    integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous">
</script>
@yield('script')

</html>
