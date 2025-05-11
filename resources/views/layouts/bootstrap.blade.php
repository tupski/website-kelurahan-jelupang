<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Kelurahan Jelupang') }}</title>

    <!-- Favicon -->
    <link rel="icon" href="{{ asset(App\Models\Pengaturan::get('favicon', 'images/favicon.ico')) }}" type="image/x-icon">
    <link rel="shortcut icon" href="{{ asset(App\Models\Pengaturan::get('favicon', 'images/favicon.ico')) }}" type="image/x-icon">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">

    <!-- Custom CSS -->
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f8f9fa;
        }

        .navbar {
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .navbar-brand {
            font-weight: 600;
        }

        .nav-link {
            font-weight: 500;
        }

        .hero-section {
            background-color: #198754;
            color: white;
            padding: 3rem 0;
            position: relative;
        }

        .card {
            border: none;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.05);
            transition: transform 0.3s ease;
            margin-bottom: 1.5rem;
        }

        .card:hover {
            transform: translateY(-5px);
        }

        .card-img-top {
            height: 200px;
            object-fit: cover;
        }

        .section-title {
            position: relative;
            padding-bottom: 15px;
            margin-bottom: 30px;
            text-align: center;
        }

        .section-title:after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 50%;
            transform: translateX(-50%);
            width: 50px;
            height: 3px;
            background-color: #198754;
        }

        footer {
            background-color: #343a40;
            color: white;
            padding: 3rem 0;
        }

        .mobile-bottom-nav {
            position: fixed;
            bottom: 0;
            left: 0;
            right: 0;
            background-color: white;
            box-shadow: 0 -2px 10px rgba(0, 0, 0, 0.1);
            z-index: 1000;
        }

        .mobile-bottom-nav .nav-link {
            display: flex;
            flex-direction: column;
            align-items: center;
            padding: 0.5rem 0;
            color: #6c757d;
            font-size: 0.8rem;
        }

        .mobile-bottom-nav .nav-link.active {
            color: #198754;
        }

        .mobile-bottom-nav .nav-link i {
            font-size: 1.25rem;
            margin-bottom: 0.25rem;
        }

        @media (min-width: 768px) {
            .mobile-bottom-nav {
                display: none;
            }
        }

        .content-wrapper {
            padding-bottom: 70px;
        }

        @media (min-width: 768px) {
            .content-wrapper {
                padding-bottom: 0;
            }
        }
    </style>
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-white">
        <div class="container">
            <a class="navbar-brand" href="{{ route('beranda') }}">
                <img src="{{ asset(App\Models\Pengaturan::get('logo', 'images/logo.png')) }}" alt="Logo Kelurahan Jelupang" height="40" class="me-2">
                Kelurahan Jelupang
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav me-auto">
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('beranda') ? 'active' : '' }}" href="{{ route('beranda') }}">Beranda</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('profil*') ? 'active' : '' }}" href="{{ route('profil') }}">Profil</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('berita*') ? 'active' : '' }}" href="{{ route('berita') }}">Berita</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('umkm*') ? 'active' : '' }}" href="{{ route('umkm') }}">UMKM</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('layanan*') ? 'active' : '' }}" href="{{ route('layanan') }}">Layanan</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('statistik*') ? 'active' : '' }}" href="{{ route('statistik') }}">Statistik</a>
                    </li>
                </ul>
                <div class="d-flex">
                    @auth
                        <div class="dropdown">
                            <button class="btn btn-outline-success dropdown-toggle" type="button" id="userDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                                {{ Auth::user()->nama }}
                            </button>
                            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userDropdown">
                                <li><a class="dropdown-item" href="{{ route('profile.edit') }}">Profil Pengguna</a></li>
                                @if(Auth::user()->is_admin)
                                <li><a class="dropdown-item" href="{{ route('admin.dashboard') }}">Panel Admin</a></li>
                                @endif
                                <li><hr class="dropdown-divider"></li>
                                <li>
                                    <form method="POST" action="{{ route('logout') }}">
                                        @csrf
                                        <button type="submit" class="dropdown-item">Keluar</button>
                                    </form>
                                </li>
                            </ul>
                        </div>
                    @else
                        <a href="{{ route('login') }}" class="btn btn-outline-success me-2">Masuk</a>
                        <a href="{{ route('register') }}" class="btn btn-success">Daftar</a>
                    @endauth
                </div>
            </div>
        </div>
    </nav>

    <!-- Content -->
    <div class="content-wrapper">
        {{ $slot }}
    </div>

    <!-- Mobile Bottom Navigation -->
    <div class="mobile-bottom-nav d-md-none">
        <div class="container">
            <div class="row text-center">
                <div class="col">
                    <a href="{{ route('beranda') }}" class="nav-link {{ request()->routeIs('beranda') ? 'active' : '' }}">
                        <i class="bi bi-house-door"></i>
                        <span>Beranda</span>
                    </a>
                </div>
                <div class="col">
                    <a href="{{ route('berita') }}" class="nav-link {{ request()->routeIs('berita*') ? 'active' : '' }}">
                        <i class="bi bi-newspaper"></i>
                        <span>Berita</span>
                    </a>
                </div>
                <div class="col">
                    <a href="{{ route('umkm') }}" class="nav-link {{ request()->routeIs('umkm*') ? 'active' : '' }}">
                        <i class="bi bi-shop"></i>
                        <span>UMKM</span>
                    </a>
                </div>
                <div class="col">
                    <a href="{{ route('layanan') }}" class="nav-link {{ request()->routeIs('layanan*') ? 'active' : '' }}">
                        <i class="bi bi-file-earmark-text"></i>
                        <span>Layanan</span>
                    </a>
                </div>
                <div class="col">
                    <a href="{{ route('profil') }}" class="nav-link {{ request()->routeIs('profil*') ? 'active' : '' }}">
                        <i class="bi bi-info-circle"></i>
                        <span>Profil</span>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap 5 JS Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
