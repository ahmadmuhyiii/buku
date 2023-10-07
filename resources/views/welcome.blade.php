<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel</title>

    <!-- Add Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body class="antialiased">
    <div class="container-fluid bg-light py-5">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <h1 class="display-4">Teknikal Test Programmer Laravel Fanatech @AhmadMuhyi</h1>
                    <p class="lead">Welcome to our Laravel application. Get started by logging in or registering.</p>
                    @if (Route::has('login'))
                        <div class="mt-4">
                            @auth
                                <a href="{{ url('/home') }}" class="btn btn-primary">Home</a>
                            @else
                                <a href="{{ route('login') }}" class="btn btn-success">Log in</a>
                                @if (Route::has('register'))
                                    <a href="{{ route('register') }}" class="btn btn-outline-secondary ml-2">Register</a>
                                @endif
                            @endauth
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <!-- Add Bootstrap JavaScript and jQuery (optional) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
        integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous">
    </script>
</body>

</html>
