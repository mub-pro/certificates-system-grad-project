<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-100">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>digital certificates</title>
    <link rel="stylesheet" href="/css/main.css">
    <style>
        .mg {
            margin-top: 8%;
        }
    </style>
</head>

<body class="d-flex flex-column h-100">

    <header class="navbar navbar-expand-md navbar-dark fixed-top bg-dark shadow text-light d-flex bd-highlight fs-6 p-3">

        <div class="p-2 flex-grow-1 bd-highlight"><a href="{{route('home')}}" class="text-decoration-none text-light">Digital Certificate</a></div>
        @auth
        <div class="p-2 bd-highlight">{{ auth()->user()->first_name }}</div>
        <div class="p-2 bd-highlight">
            <form action="{{route('logout')}}" method="post" class="logout">
                @csrf
                <button type="submit" class="btn text-light">Logout</button>
            </form>
        </div>
        @endauth
    </header>

    <main class="flex-shrink-0 mt-5 mb-5">
        @yield('content')
    </main>



    <footer class="footer mt-auto py-3 bg-info">
        <div class="container text-center">
            <span class="text-light">Copyright 2020-2021.</span>
        </div>
    </footer>

    <!-- <script>
        const button = document.getElementById('button');
        const dropdown = document.getElementById('dropdown');
        window.addEventListener('click', function(event) {
            if (!dropdown.classList.contains('hidden')) {
                if (event.target.matches('#button') || event.target.matches('#svg')) {} else {
                    dropdown.classList.add('hidden');
                }
            }
        });

        function dropTheList() {
            if (dropdown.classList.contains('hidden')) {
                dropdown.classList.remove('hidden');
            } else {
                dropdown.classList.add('hidden');
            }
        }
    </script> -->
</body>

</html>