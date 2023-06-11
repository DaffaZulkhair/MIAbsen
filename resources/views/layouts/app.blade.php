<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>MIAbsen</title>

    <!-- FontAwesome JS-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <!-- Favicon -->
    <link rel="shortcut icon" href="{{ asset('DATUM/assets/images/favicon.ico') }}" />

    <link rel="stylesheet" href="{{ asset('DATUM/assets/css/backend-plugin.min.css') }}">
    <link rel="stylesheet" href="{{ asset('DATUM/assets/css/backend.css?v=1.0.0') }}">

    @yield('css_after')
</head>

<body>
    <!-- loader Start -->
    <div id="loading">
        <div id="loading-center">
        </div>
    </div>
    <!-- loader END -->
    <!-- Wrapper Start -->
    <div class="wrapper">
        {{-- Sidebar --}}
        @include('layouts.sidebar')
        {{-- End Sidebar --}}

        {{-- Navbar --}}
        <div class="iq-top-navbar">
            <div class="iq-navbar-custom">
                <nav class="navbar navbar-expand-lg navbar-light p-0">
                    <div class="side-menu-bt-sidebar">
                        <svg xmlns="http://www.w3.org/2000/svg" class="text-secondary wrapper-menu" width="30"
                            fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4 6h16M4 12h16M4 18h16" />
                        </svg>
                    </div>
                    <div class="d-flex align-items-center">
                        <button class="navbar-toggler" type="button" data-toggle="collapse"
                            data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                            aria-label="Toggle navigation">
                            <svg xmlns="http://www.w3.org/2000/svg" class="text-secondary" width="30" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M4 6h16M4 12h16m-7 6h7" />
                            </svg>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <ul class="navbar-nav ml-auto navbar-list align-items-center">
                                <li class="nav-item nav-icon dropdown">
                                    <a href="#" class="nav-item nav-icon dropdown-toggle pr-0 search-toggle"
                                        id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true"
                                        aria-expanded="false">
                                        <img src="assets/images/1.jpg" class="img-fluid avatar-rounded" alt="user">
                                        <span class="mb-0 ml-2 user-name">{{ Auth::user()->name }}</span>
                                    </a>
                                    <ul class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton">
                                        <li class="dropdown-item d-flex svg-icon">
                                            <svg class="svg-icon mr-0 text-secondary" id="h-01-p" width="20"
                                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M5.121 17.804A13.937 13.937 0 0112 16c2.5 0 4.847.655 6.879 1.804M15 10a3 3 0 11-6 0 3 3 0 016 0zm6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                            </svg>
                                            <a href="app/user-profile.html">Profil Saya</a>
                                        </li>
                                        <li class="dropdown-item  d-flex svg-icon border-top">
                                            <svg class="svg-icon mr-0 text-secondary" id="h-05-p" width="20"
                                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                                            </svg>
                                            <a href="{{ route('logout') }} "
                                                onclick="event.preventDefault();
                                            document.getElementById('logout-form').submit();">Keluar</a>
                                            <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                                class="d-none">
                                                @csrf
                                            </form>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                    </div>
                </nav>
            </div>
        </div>
        {{-- End Navbar --}}

        {{-- Content --}}
        <div class="content-page">
            <div class="container-fluid">
                @yield('content')
                <!-- Page end  -->
            </div>
        </div>
        {{-- End Content --}}
    </div>
    <!-- Wrapper End-->
    {{-- <footer class="iq-footer">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-6">
                    <ul class="list-inline mb-0">
                        <li class="list-inline-item"><a href="backend/privacy-policy.html">Privacy Policy</a>
                        </li>
                        <li class="list-inline-item"><a href="backend/terms-of-service.html">Terms of Use</a>
                        </li>
                    </ul>
                </div>
                <div class="col-lg-6 text-right">
                    <span class="mr-1">
                        Copyright
                        <script>
                            document.write(new Date().getFullYear())
                        </script>© <a href="#" class="">Datum</a>
                        All Rights Reserved.
                    </span>
                </div>
            </div>
        </div>
    </footer> --}}

    <!-- Backend Bundle JavaScript -->
    <script src="{{ asset('DATUM/assets/js/backend-bundle.min.js') }}"></script>
    <!-- Chart Custom JavaScript -->
    <script src="{{ asset('DATUM/assets/js/customizer.js') }}"></script>

    <script src="{{ asset('DATUM/assets/js/sidebar.js') }}"></script>

    <!-- Flextree Javascript-->
    <script src="{{ asset('DATUM/assets/js/flex-tree.min.js') }}"></script>
    <script src="{{ asset('DATUM/assets/js/tree.js') }}"></script>

    <!-- Table Treeview JavaScript -->
    <script src="{{ asset('DATUM/assets/js/table-treeview.js') }}"></script>

    <!-- SweetAlert JavaScript -->
    <script src="{{ asset('DATUM/assets/js/sweetalert.js') }}"></script>

    <!-- Vectoe Map JavaScript -->
    <script src="{{ asset('DATUM/assets/js/vector-map-custom.js') }}"></script>

    <!-- Chart Custom JavaScript -->
    <script src="{{ asset('DATUM/assets/js/chart-custom.js') }}"></script>
    <script src="{{ asset('DATUM/assets/js/charts/01.js') }}"></script>
    <script src="{{ asset('DATUM/assets/js/charts/02.js') }}"></script>

    <!-- slider JavaScript -->
    <script src="{{ asset('DATUM/assets/js/slider.js') }}"></script>

    <!-- Emoji picker -->
    <script src="{{ asset('DATUM/assets/vendor/emoji-picker-element/index.js') }}" type="module"></script>

    <!-- app JavaScript -->
    <script src="{{ asset('DATUM/assets/js/app.js') }}"></script>

    @yield('js_after')

    @include('sweetalert::alert')
</body>

</html>
