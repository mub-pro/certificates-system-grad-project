<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="/css/main.css">
    <style>
        .mg {
            margin-top: 8%;
        }

        .logout {
            margin-top: 15px;
        }
    </style>
</head>

<body class="d-flex flex-column h-100">

    <header class="navbar navbar-expand-md navbar-dark fixed-top bg-dark shadow text-light d-flex bd-highlight fs-6 p-0">

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

    <div id="wrapper">
        <nav id="sidebarMenu" class="col-md-3 mt-5 col-lg-2 d-md-block bg-light sidebar collapse tab">
            <div class="position-sticky">
                <ul class="nav flex-column">
                    @if (Auth::user()->role->id == 1)
                    <li class="nav-item">
                        <a class="nav-link tablinks {{ Route::is('users.index', 'users.create') ? 
                        'active': '' }}" aria-current="page" href="{{route('users.index')}}">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-home">
                                <path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path>
                                <polyline points="9 22 9 12 15 12 15 22"></polyline>
                            </svg> Users
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link tablinks {{ Route::is('documents.index', 'documents.create') ? 
                        'active': '' }}" href="{{ route('documents.index') }}">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-file">
                                <path d="M13 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V9z"></path>
                                <polyline points="13 2 13 9 20 9"></polyline>
                            </svg>
                            Documents
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link tablinks {{ Route::is('college.index', 'college.create') ? 
                        'active': '' }}" href="{{ route('college.index') }}">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-file">
                                <path d="M13 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V9z"></path>
                                <polyline points="13 2 13 9 20 9"></polyline>
                            </svg>
                            Colleges
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link tablinks {{ Route::is('degree.index', 'degree.create') ? 
                        'active': '' }}" href="{{ route('degree.index') }}">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-file">
                                <path d="M13 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V9z"></path>
                                <polyline points="13 2 13 9 20 9"></polyline>
                            </svg>
                            Degrees
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link tablinks {{ Route::is('type.index', 'type.create') ? 
                        'active': '' }}" href="{{ route('type.index') }}">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-file">
                                <path d="M13 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V9z"></path>
                                <polyline points="13 2 13 9 20 9"></polyline>
                            </svg>
                            Document Types
                        </a>
                    </li>
                    @else
                    <li class="nav-item">
                        <a class="nav-link tablinks {{ request()->routeIs('documents.index') ? 
                        'active': '' }}" href="{{ route('documents.index') }}">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-file">
                                <path d="M13 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V9z"></path>
                                <polyline points="13 2 13 9 20 9"></polyline>
                            </svg>
                            Documents
                        </a>
                    </li>
                    @endif
                    <li class="nav-item">
                        <a class="nav-link tablinks {{ request()->routeIs('account.index') ? 
                        'active': '' }}" href="{{ route('account.index') }}">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-file">
                                <path d="M13 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V9z"></path>
                                <polyline points="13 2 13 9 20 9"></polyline>
                            </svg>
                            Account
                        </a>
                    </li>
                </ul>
            </div>
        </nav>
        <div id="content-wrapper">
            @yield('wrap')
        </div>
    </div>

    <footer class="footer mt-auto py-3 bg-info">
        <div class="container text-center">
            <span class="text-light">Copyright 2020-2021.</span>
        </div>
    </footer>
</body>

</html>