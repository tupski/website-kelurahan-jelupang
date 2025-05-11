<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Kelurahan Jelupang') }}</title>

    <!-- Favicon -->
    <link rel="icon" href="{{ asset(App\Models\Pengaturan::get('favicon', 'images/favicon.ico')) }}" type="image/x-icon">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">

    <!-- Custom CSS -->
    <style>
        :root {
            --bs-primary: #198754;
            --bs-primary-rgb: 25, 135, 84;
            --bs-success: #198754;
            --bs-success-rgb: 25, 135, 84;
        }

        body {
            font-family: 'Inter', sans-serif;
            background-color: #f8f9fa;
            color: #212529;
        }

        .navbar-brand img {
            max-height: 40px;
        }

        .navbar {
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.04);
        }

        .footer {
            color: #f8f9fa;
        }

        .hero-section {
            background-color: #198754;
            color: white;
            padding: 3rem 0;
            margin-bottom: 2rem;
        }

        .card {
            border: none;
            box-shadow: 0 0.125rem 0.25rem rgba(0, 0, 0, 0.075);
            transition: all 0.3s ease;
        }

        .card:hover {
            box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.15);
        }

        .mobile-menu {
            position: fixed;
            bottom: 0;
            left: 0;
            right: 0;
            background-color: #fff;
            box-shadow: 0 -2px 10px rgba(0, 0, 0, 0.1);
            z-index: 1000;
            display: none;
        }

        @media (max-width: 768px) {
            .mobile-menu {
                display: flex;
            }

            body {
                padding-bottom: 60px;
            }
        }
    </style>
</head>
<body>
    <!-- Header -->
    <header>
        <nav class="navbar navbar-expand-lg navbar-light bg-white">
            <div class="container">
                <a class="navbar-brand" href="{{ route('beranda') }}">
                    <img src="{{ asset(App\Models\Pengaturan::get('logo', 'images/logo.png')) }}" alt="Logo Kelurahan Jelupang">
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item">
                            <a class="nav-link {{ request()->routeIs('beranda') ? 'active fw-bold' : '' }}" href="{{ route('beranda') }}">Beranda</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ request()->routeIs('profil*') ? 'active fw-bold' : '' }}" href="{{ route('profil') }}">Profil</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ request()->routeIs('berita*') ? 'active fw-bold' : '' }}" href="{{ route('berita') }}">Berita</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ request()->routeIs('umkm*') ? 'active fw-bold' : '' }}" href="{{ route('umkm') }}">UMKM</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ request()->routeIs('layanan*') ? 'active fw-bold' : '' }}" href="{{ route('layanan') }}">Layanan</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ request()->routeIs('statistik*') ? 'active fw-bold' : '' }}" href="{{ route('statistik') }}">Statistik</a>
                        </li>
                        @auth
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    {{ Auth::user()->name }}
                                </a>
                                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <li><a class="dropdown-item" href="{{ route('profile.edit') }}">Profil</a></li>
                                    <li><hr class="dropdown-divider"></li>
                                    <li>
                                        <form method="POST" action="{{ route('logout') }}">
                                            @csrf
                                            <button type="submit" class="dropdown-item">Logout</button>
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        @else
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">Login</a>
                            </li>
                        @endauth
                    </ul>
                </div>
            </div>
        </nav>
    </header>

    <!-- Main Content -->
    <main>
        {{ $slot }}
    </main>

    <!-- Footer -->
    <footer class="footer mt-5 bg-success text-white">
        <div class="container py-5">
            <div class="row">
                <div class="col-md-4 mb-4 mb-md-0">
                    <h5 class="fw-bold mb-3">Kelurahan Jelupang</h5>
                    <p class="mb-1"><i class="bi bi-geo-alt me-2"></i> Jl. Raya Jelupang No. 123, Serpong Utara, Tangerang Selatan</p>
                    <p class="mb-1"><i class="bi bi-telephone me-2"></i> (021) 1234-5678</p>
                    <p class="mb-1"><i class="bi bi-envelope me-2"></i> info@kelurahanjelupang.go.id</p>
                    <div class="mt-4">
                        <a href="#" class="text-white me-2 fs-5"><i class="bi bi-facebook"></i></a>
                        <a href="#" class="text-white me-2 fs-5"><i class="bi bi-twitter"></i></a>
                        <a href="#" class="text-white me-2 fs-5"><i class="bi bi-instagram"></i></a>
                        <a href="#" class="text-white fs-5"><i class="bi bi-youtube"></i></a>
                    </div>
                </div>
                <div class="col-md-4 mb-4 mb-md-0">
                    <h5 class="fw-bold mb-3">Menu Utama</h5>
                    <ul class="list-unstyled">
                        <li class="mb-2"><a href="{{ route('beranda') }}" class="text-white text-decoration-none"><i class="bi bi-house-door me-2"></i>Beranda</a></li>
                        <li class="mb-2"><a href="{{ route('profil') }}" class="text-white text-decoration-none"><i class="bi bi-info-circle me-2"></i>Profil</a></li>
                        <li class="mb-2"><a href="{{ route('berita') }}" class="text-white text-decoration-none"><i class="bi bi-newspaper me-2"></i>Berita</a></li>
                        <li class="mb-2"><a href="{{ route('umkm') }}" class="text-white text-decoration-none"><i class="bi bi-shop me-2"></i>UMKM</a></li>
                        <li class="mb-2"><a href="{{ route('layanan') }}" class="text-white text-decoration-none"><i class="bi bi-file-earmark-text me-2"></i>Layanan</a></li>
                        <li class="mb-2"><a href="{{ route('statistik') }}" class="text-white text-decoration-none"><i class="bi bi-bar-chart me-2"></i>Statistik</a></li>
                    </ul>
                </div>
                <div class="col-md-4">
                    <h5 class="fw-bold mb-3">Link Terkait</h5>
                    <ul class="list-unstyled">
                        <li class="mb-2"><a href="#" class="text-white text-decoration-none"><i class="bi bi-link-45deg me-2"></i>Pemerintah Kota Tangerang Selatan</a></li>
                        <li class="mb-2"><a href="#" class="text-white text-decoration-none"><i class="bi bi-link-45deg me-2"></i>Kecamatan Serpong Utara</a></li>
                        <li class="mb-2"><a href="#" class="text-white text-decoration-none"><i class="bi bi-link-45deg me-2"></i>Portal Layanan Publik</a></li>
                    </ul>
                    <h5 class="fw-bold mb-3 mt-4">Jam Operasional</h5>
                    <p class="mb-1">Senin - Jumat: 08.00 - 16.00 WIB</p>
                    <p>Sabtu, Minggu & Hari Libur: Tutup</p>
                </div>
            </div>
        </div>
        <div class="bg-dark py-3">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 text-center text-md-start">
                        <p class="mb-0">&copy; {{ date('Y') }} Kelurahan Jelupang. Hak Cipta Dilindungi.</p>
                    </div>
                    <div class="col-md-6 text-center text-md-end">
                        <p class="mb-0">Dibuat dengan <i class="bi bi-heart-fill text-danger"></i> oleh Tim IT Kelurahan Jelupang</p>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <!-- Mobile Menu -->
    <div class="mobile-menu py-2">
        <div class="container">
            <div class="row text-center">
                <div class="col">
                    <a href="{{ route('beranda') }}" class="text-decoration-none {{ request()->routeIs('beranda') ? 'text-primary' : 'text-dark' }}">
                        <i class="bi bi-house-door fs-4 d-block"></i>
                        <span class="small">Beranda</span>
                    </a>
                </div>
                <div class="col">
                    <a href="{{ route('berita') }}" class="text-decoration-none {{ request()->routeIs('berita*') ? 'text-primary' : 'text-dark' }}">
                        <i class="bi bi-newspaper fs-4 d-block"></i>
                        <span class="small">Berita</span>
                    </a>
                </div>
                <div class="col">
                    <a href="{{ route('layanan') }}" class="text-decoration-none {{ request()->routeIs('layanan*') ? 'text-primary' : 'text-dark' }}">
                        <i class="bi bi-file-earmark-text fs-4 d-block"></i>
                        <span class="small">Layanan</span>
                    </a>
                </div>
                <div class="col">
                    <a href="{{ route('umkm') }}" class="text-decoration-none {{ request()->routeIs('umkm*') ? 'text-primary' : 'text-dark' }}">
                        <i class="bi bi-shop fs-4 d-block"></i>
                        <span class="small">UMKM</span>
                    </a>
                </div>
                <div class="col">
                    <a href="{{ route('profil') }}" class="text-decoration-none {{ request()->routeIs('profil*') ? 'text-primary' : 'text-dark' }}">
                        <i class="bi bi-info-circle fs-4 d-block"></i>
                        <span class="small">Profil</span>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Custom JS -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Initialize tooltips
            var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
            var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
                return new bootstrap.Tooltip(tooltipTriggerEl)
            });
        });
    </script>

    @stack('scripts')
</body>
</html>
