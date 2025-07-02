<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel Bootstrap</title>


    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>

<body class="bg-light text-dark">
    <div class="container-fluid min-vh-100 d-flex flex-column justify-content-center align-items-center bg-light">

        @if (Route::has('login'))
            <div class="position-absolute top-0 end-0 p-3">
                @auth
                    <a href="{{ route('home') }}" class="btn btn-outline-dark me-2">Home</a>
                @else
                    <a href="{{ route('login') }}" class="btn btn-outline-dark me-2">Log in</a>
                    @if (Route::has('register'))
                        <a href="{{ route('register') }}" class="btn btn-outline-dark">Register</a>
                    @endif
                @endauth
            </div>
        @endif

    </div>

    <!-- Bootstrap JS Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
