<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <!-- Font Awesome for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <!-- Bootstrap CSS (dari CDN) -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    
    <!-- Optional: Add inline styles if needed -->
    <style>
        /* Custom styling */
        body {
            background-color: #f8f9fa;
            font-family: 'Nunito', sans-serif;
            overflow-x: hidden;
        }

        /* Navbar Styling */
        .navbar {
            padding: 0.8rem 1rem;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            z-index: 1030;
            position: sticky;
            background-color: #3490dc;
            position: sticky;
            top: 0;
            transition: all 0.3s ease;
        }

        .navbar-brand, .nav-link {
            color: white !important;
        }

        .navbar-nav .nav-item .nav-link:hover {
            color: #d1e7ff !important;
        }

        .dropdown-menu {
            background-color: #fff;
            box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.15);
            border: none;
        }

        .dropdown-item {
            color: #212529;
        }

        .dropdown-item:hover {
            background-color: #e9ecef;
        }

        /* Sidebar Styling */
        #sidebar-wrapper {
            min-height: calc(100vh - 56px);
            width: 250px;
            background: #2c3e50;
            color: #fff;
            transition: all 0.3s;
            position: fixed;
            z-index: 999;
            left: 0;
            box-shadow: 3px 0 10px rgba(0, 0, 0, 0.1);
        }

        #sidebar-wrapper.collapsed {
            margin-left: -250px;
        }

        .sidebar-heading {
            padding: 1rem 1.5rem;
            font-size: 1.2rem;
            font-weight: bold;
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
            text-align: center;
        }

        .list-group {
            padding: 0.5rem 0;
        }

        .list-group-item {
            background: transparent;
            color: #ddd;
            border: none;
            padding: 0.75rem 1.5rem;
            transition: all 0.3s;
            display: flex;
            align-items: center;
        }

        .list-group-item i {
            margin-right: 10px;
            width: 20px;
            text-align: center;
        }

        .list-group-item:hover {
            background: rgba(255, 255, 255, 0.1);
            color: #fff;
        }

        .list-group-item.active {
            background-color: #3490dc;
            border-color: #3490dc;
        }

        /* Content area */
        #page-content-wrapper {
            width: 100%;
            padding-left: 250px;
            transition: all 0.3s;
        }

        #page-content-wrapper.expanded {
            padding-left: 0;
        }

        /* For mobile view */
        @media (max-width: 768px) {
            #sidebar-wrapper {
                margin-left: -250px;
            }
            
            #sidebar-wrapper.active {
                margin-left: 0;
            }
            
            #page-content-wrapper {
                padding-left: 0;
            }
            
            #sidebarToggle {
                display: block;
            }
        }

        /* Page content styling */
        .content-header {
            padding: 1.5rem 0;
            border-bottom: 1px solid #dee2e6;
            margin-bottom: 2rem;
        }

        .content-header h1 {
            margin-bottom: 0;
            font-size: 1.8rem;
            font-weight: 600;
            color: #333;
        }

        /* Dashboard cards */
        .dashboard-card {
            border-radius: 10px;
            box-shadow: 0 0.125rem 0.25rem rgba(0, 0, 0, 0.075);
            transition: transform 0.3s, box-shadow 0.3s;
            margin-bottom: 1.5rem;
            overflow: hidden;
        }

        .dashboard-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.15);
        }

        .card-icon {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 60px;
            height: 60px;
            border-radius: 50%;
            margin-bottom: 1rem;
            font-size: 1.5rem;
        }

        /* Toggle button */
        #sidebarToggle {
            background-color: transparent;
            border: none;
            color: white;
            font-size: 1.2rem;
            cursor: pointer;
            padding: 0.25rem 0.75rem;
        }
    </style>
    @stack('styles')
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light shadow-sm">
            <div class="container-fluid">
                <button class="me-2" id="sidebarToggle">
                    <i class="fas fa-bars text-white"></i>
                </button>
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'SIMBK') }}
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto"></ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                <i class="fas fa-user-circle me-1"></i> {{ Auth::user()->name }}
                            </a>

                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-user me-2"></i> Profile
                                </a>
                        
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    <i class="fas fa-sign-out-alt me-2"></i> {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <div class="d-flex" id="wrapper">
            <!-- Sidebar -->
            <div id="sidebar-wrapper">
                <div class="sidebar-heading">
                    <img src="{{ asset('img/logo.jpg') }}" alt="Logo" class="img-fluid" style="max-height: 60px;">
                    <div>Sistem BK</div>
                </div>
                
                <div class="list-group">
                    @can('dashboard')
                        <a href="{{route('dashboard')}}" class="list-group-item list-group-item-action {{ request()->routeIs('dashboard') ? 'active':''}}">
                            <i class="fas fa-tachometer-alt"></i> Dashboard
                        </a>
                    @endcan
                    @can('user-list')
                        <a href="{{route('siswa.index')}}" class="list-group-item list-group-item-action {{ request()->routeIs('siswa.index') ? 'active':''}}">
                            <i class="fas fa-users"></i> Siswa
                        </a>
                        <a href="{{route('guru.index')}}" class="list-group-item list-group-item-action {{ request()->routeIs('guru.index') ? 'active':''}}">
                            <i class="fas fa-user-tie"></i> Guru BK
                        </a>
                    @endcan
                  
                    @if (Auth::user()->hasRole('Siswa'))
                        <a href="{{ route('minat-bakat.create') }}" class="list-group-item list-group-item-action {{ request()->routeIs('minat-bakat.create') ? 'active':'' }}">
                            <i class="fas fa-clipboard-list"></i> Formulir Tes
                        </a>
                         <a href="{{route('schedule.index')}}" class="list-group-item list-group-item-action {{ request()->routeIs('schedule.index') ? 'active':''}}">
                            <i class="fas fa-comments"></i> Jadwal Konseling
                        </a>
                    @else
                        <a href="#" class="list-group-item list-group-item-action">
                            <i class="fas fa-user-tie"></i> Hasil Tes
                        </a>
                        <a href="{{route('schedule.index')}}" class="list-group-item list-group-item-action {{ request()->routeIs('schedule.index') ? 'active':''}}">
                            <i class="fas fa-comments"></i>Data Konseling
                        </a>
                        <a href="#" class="list-group-item list-group-item-action">
                            <i class="fas fa-clipboard-list"></i> Laporan
                        </a>
                    @endif
                </div>
            </div>

            <!-- Page Content -->
            <div id="page-content-wrapper">
                <main class="py-4">
                    @yield('content')
                   
                </main>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS (dari CDN) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    
    <!-- Custom JS -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Toggle sidebar
            document.getElementById('sidebarToggle').addEventListener('click', function() {
                document.getElementById('sidebar-wrapper').classList.toggle('collapsed');
                document.getElementById('page-content-wrapper').classList.toggle('expanded');
            });

            // Handle mobile view
            if (window.innerWidth < 768) {
                document.getElementById('sidebar-wrapper').classList.add('collapsed');
                document.getElementById('page-content-wrapper').classList.add('expanded');
            }

            // Resize handling
            window.addEventListener('resize', function() {
                if (window.innerWidth < 768) {
                    document.getElementById('sidebar-wrapper').classList.add('collapsed');
                    document.getElementById('page-content-wrapper').classList.add('expanded');
                } else {
                    document.getElementById('sidebar-wrapper').classList.remove('collapsed');
                    document.getElementById('page-content-wrapper').classList.remove('expanded');
                }
            });
        });
    </script>
    @stack('scripts')
</body>
</html> 

