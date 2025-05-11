<x-bootstrap-layout>
    <!-- Header Section -->
    <div class="hero-section" style="background-color: {{ App\Models\Pengaturan::get('warna_utama', '#00A67C') }}; position: relative; overflow: hidden;">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <h1 class="display-5 fw-bold mb-3">{{ App\Models\Pengaturan::get('judul_layanan', 'PELAYANAN KELURAHAN JELUPANG') }}</h1>
                    <p class="fs-5">{{ App\Models\Pengaturan::get('deskripsi_layanan', 'Informasi lengkap tentang layanan administrasi dan fasilitas yang tersedia untuk warga desa') }}</p>
                </div>
            </div>
        </div>
        <div style="position: absolute; bottom: -5px; left: 0; right: 0; height: 50px; background-color: #fff; border-radius: 100% 100% 0 0;"></div>
    </div>

    <div class="container py-5">
        <div class="row">
            <div class="col-12">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('beranda') }}">Beranda</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Layanan Desa</li>
                    </ol>
                </nav>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="d-flex align-items-center mb-4">
                    <i class="bi bi-file-earmark-text fs-4 me-2 text-primary"></i>
                    <h5 class="mb-0">LAYANAN DESA</h5>
                </div>
                <p>Pilih kategori untuk melihat layanan desa sesuai dengan kebutuhan Anda</p>
            </div>
        </div>

        <!-- Search Form -->
        <div class="mb-4">
            <form id="searchForm" action="{{ route('layanan') }}" method="GET">
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Cari layanan..." name="search" value="{{ request('search') }}">
                    <button class="btn btn-primary" type="submit"><i class="bi bi-search me-1"></i> Cari</button>
                </div>
            </form>
        </div>

        <!-- Category Pills -->
        <div class="mb-4" id="kategoriFilter">
            <a href="{{ route('layanan') }}" class="btn {{ !request()->route('slug') ? 'btn-primary' : 'btn-outline-primary' }} rounded-pill me-2 mb-2 kategori-btn" data-url="{{ route('layanan') }}">
                <i class="bi bi-grid-fill me-2"></i> Semua Kategori
            </a>
            @foreach($kategori as $kat)
            <a href="{{ route('layanan.kategori', $kat->slug) }}" class="btn {{ request()->route('slug') == $kat->slug ? 'btn-primary' : 'btn-outline-primary' }} rounded-pill me-2 mb-2 kategori-btn" data-url="{{ route('layanan.kategori', $kat->slug) }}">
                <i class="bi {{ $kat->ikon ?? 'bi-tag' }} me-2"></i> {{ $kat->nama }}
            </a>
            @endforeach
        </div>

        <!-- Services Grid -->
        <div class="row g-4" id="layananContainer">
            @include('layanan.partials.layanan-list')
        </div>

        <!-- Pagination -->
        <div id="paginationContainer">
            @include('layanan.partials.pagination')
        </div>

        <!-- Loading Indicator -->
        <div id="loadingIndicator" class="text-center py-4 d-none">
            <div class="spinner-border text-primary" role="status">
                <span class="visually-hidden">Loading...</span>
            </div>
            <p class="mt-2">Memuat data...</p>
        </div>
    </div>

    @push('scripts')
    <style>
        :root {
            --primary-color: {{ App\Models\Pengaturan::get('warna_utama', '#00A67C') }};
            --secondary-color: {{ App\Models\Pengaturan::get('warna_sekunder', '#008F6B') }};
        }

        .btn-primary {
            background-color: var(--primary-color);
            border-color: var(--primary-color);
        }

        .btn-primary:hover {
            background-color: var(--secondary-color);
            border-color: var(--secondary-color);
        }

        .btn-outline-primary {
            color: var(--primary-color);
            border-color: var(--primary-color);
        }

        .btn-outline-primary:hover {
            background-color: var(--primary-color);
            border-color: var(--primary-color);
        }

        .text-primary {
            color: var(--primary-color) !important;
        }

        .bg-primary {
            background-color: var(--primary-color) !important;
        }

        .hover-card {
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .hover-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0,0,0,0.1) !important;
        }

        .hero-section {
            background-color: var(--primary-color);
            padding: 3rem 0;
            margin-bottom: 0;
        }
    </style>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // AJAX untuk form pencarian
            const searchForm = document.getElementById('searchForm');
            const layananContainer = document.getElementById('layananContainer');
            const paginationContainer = document.getElementById('paginationContainer');
            const loadingIndicator = document.getElementById('loadingIndicator');
            let currentUrl = window.location.href;

            // Handle form submit
            searchForm.addEventListener('submit', function(e) {
                e.preventDefault();
                const formData = new FormData(searchForm);
                const searchParams = new URLSearchParams(formData);
                fetchLayanan(currentUrl, searchParams);
            });

            // Handle kategori filter
            document.querySelectorAll('.kategori-btn').forEach(btn => {
                btn.addEventListener('click', function(e) {
                    e.preventDefault();

                    // Update active button
                    document.querySelectorAll('.kategori-btn').forEach(b => {
                        b.classList.remove('btn-primary');
                        b.classList.add('btn-outline-secondary');
                    });
                    this.classList.remove('btn-outline-secondary');
                    this.classList.add('btn-primary');

                    // Get search params if any
                    const formData = new FormData(searchForm);
                    const searchParams = new URLSearchParams(formData);

                    // Update current URL
                    currentUrl = this.getAttribute('data-url');

                    // Fetch data
                    fetchLayanan(currentUrl, searchParams);
                });
            });

            // Handle pagination clicks
            document.addEventListener('click', function(e) {
                const target = e.target;

                // Check if clicked element is a pagination link
                if (target.tagName === 'A' && target.closest('.pagination')) {
                    e.preventDefault();
                    const url = target.getAttribute('href');
                    if (url) {
                        fetchLayanan(url);
                    }
                }
            });

            // Function to fetch layanan data
            function fetchLayanan(url, params = null) {
                // Show loading indicator
                loadingIndicator.classList.remove('d-none');
                layananContainer.classList.add('opacity-50');

                // Build URL with params if provided
                let fetchUrl = url;
                if (params) {
                    fetchUrl = url + (url.includes('?') ? '&' : '?') + params.toString();
                }

                // Add AJAX header
                fetchUrl = fetchUrl + (fetchUrl.includes('?') ? '&' : '?') + 'ajax=1';

                // Fetch data
                fetch(fetchUrl, {
                    headers: {
                        'X-Requested-With': 'XMLHttpRequest'
                    }
                })
                .then(response => response.json())
                .then(data => {
                    // Update content
                    layananContainer.innerHTML = data.html;
                    paginationContainer.innerHTML = data.pagination;

                    // Hide loading indicator
                    loadingIndicator.classList.add('d-none');
                    layananContainer.classList.remove('opacity-50');

                    // Update URL without reloading page
                    window.history.pushState({}, '', fetchUrl.replace('&ajax=1', '').replace('?ajax=1', ''));
                })
                .catch(error => {
                    console.error('Error fetching data:', error);
                    loadingIndicator.classList.add('d-none');
                    layananContainer.classList.remove('opacity-50');
                    alert('Terjadi kesalahan saat memuat data. Silakan coba lagi.');
                });
            }
        });
    </script>
    @endpush
</x-bootstrap-layout>
