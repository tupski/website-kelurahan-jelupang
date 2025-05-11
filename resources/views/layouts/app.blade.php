<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Kelurahan Jelupang') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100">
            @include('layouts.navigation')

            <!-- Page Heading -->
            @isset($header)
                <header class="bg-white shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endisset

            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>

            <!-- Footer -->
            <footer class="bg-green-800 text-white py-8">
                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                        <div>
                            <h3 class="text-lg font-semibold mb-4">Kelurahan Jelupang</h3>
                            <p class="mb-2">Jl. Raya Jelupang No. 123</p>
                            <p class="mb-2">Kecamatan Serpong Utara</p>
                            <p class="mb-2">Kota Tangerang Selatan</p>
                            <p class="mb-2">Banten 15310</p>
                        </div>
                        <div>
                            <h3 class="text-lg font-semibold mb-4">Kontak</h3>
                            <p class="mb-2">Telepon: (021) 1234-5678</p>
                            <p class="mb-2">Email: info@kelurahanjelupang.go.id</p>
                            <p class="mb-2">Jam Kerja: Senin-Jumat, 08.00-16.00 WIB</p>
                        </div>
                        <div>
                            <h3 class="text-lg font-semibold mb-4">Tautan</h3>
                            <ul>
                                <li class="mb-2"><a href="{{ route('beranda') }}" class="hover:text-green-300">Beranda</a></li>
                                <li class="mb-2"><a href="{{ route('profil') }}" class="hover:text-green-300">Profil</a></li>
                                <li class="mb-2"><a href="{{ route('berita') }}" class="hover:text-green-300">Berita</a></li>
                                <li class="mb-2"><a href="{{ route('layanan') }}" class="hover:text-green-300">Layanan</a></li>
                                <li class="mb-2"><a href="{{ route('umkm') }}" class="hover:text-green-300">UMKM</a></li>
                                <li class="mb-2"><a href="{{ route('statistik') }}" class="hover:text-green-300">Statistik</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="border-t border-green-700 mt-8 pt-8 text-center">
                        <p>&copy; {{ date('Y') }} Kelurahan Jelupang. Hak Cipta Dilindungi.</p>
                    </div>
                </div>
            </footer>

            <!-- Mobile Bottom Navigation -->
            <div class="md:hidden fixed bottom-0 left-0 right-0 bg-white shadow-lg z-50">
                <div class="flex justify-around py-2">
                    <a href="{{ route('beranda') }}" class="flex flex-col items-center text-xs text-gray-600 hover:text-green-600">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                        </svg>
                        <span>Beranda</span>
                    </a>
                    <a href="{{ route('berita') }}" class="flex flex-col items-center text-xs text-gray-600 hover:text-green-600">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z" />
                        </svg>
                        <span>Berita</span>
                    </a>
                    <a href="{{ route('layanan') }}" class="flex flex-col items-center text-xs text-gray-600 hover:text-green-600">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
                        </svg>
                        <span>Layanan</span>
                    </a>
                    <a href="{{ route('umkm') }}" class="flex flex-col items-center text-xs text-gray-600 hover:text-green-600">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" />
                        </svg>
                        <span>UMKM</span>
                    </a>
                    <a href="{{ route('profil') }}" class="flex flex-col items-center text-xs text-gray-600 hover:text-green-600">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        <span>Info</span>
                    </a>
                </div>
            </div>
        </div>
    </body>
</html>
