<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
</head>

<body class="text-center text-bg-dark d-flex flex-column h-75">

    <div class="container d-flex p-3 mx-auto flex-column">
        <header class="mb-auto">
            <div>
                <h3 class="float-md-start">{{ config('app.name', 'Laravel') }}</h3>
                <nav class="nav nav-masthead justify-content-center float-md-end">
                    <a class="nav-link fw-bold" href="{{ route('ShareFile.create') }}">Home</a>
                </nav>
            </div>
        </header>
        <main class="px-3 mt-5 d-flex justify-content-around">
            <div class="card w-100 mt-5 p-4">
                <div class="card-header">
                    <strong>@yield('card_title')</strong>
                </div>
                <div class="card-body mt-2">

                    @yield('content')
                </div>

            </div>
        </main>

        <footer class="fixed-bottom">
            <p>Mohammed Ryad Mostafa <a href="https://github.com/MohammedRMostafa" class="text-white">GitHub</a></p>
        </footer>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous">
    </script>
    @yield('js')
</body>

</html>
