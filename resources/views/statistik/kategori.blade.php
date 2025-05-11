<x-bootstrap-layout>
    <!-- Header Section -->
    <div class="hero-section" style="background-color: {{ App\Models\Pengaturan::get('warna_utama', '#00A67C') }}; position: relative; overflow: hidden;">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <h1 class="display-5 fw-bold mb-3">{{ App\Models\Pengaturan::get('judul_statistik', 'STATISTIK DESA JELUPANG') }}</h1>
                    <p class="fs-5">{{ App\Models\Pengaturan::get('deskripsi_statistik', 'Data dan perkembangan desa dalam bentuk visualisasi yang informatif') }}</p>
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
                        <li class="breadcrumb-item"><a href="{{ route('statistik') }}">Statistik</a></li>
                        <li class="breadcrumb-item active" aria-current="page">{{ $kategori_data->nama }}</li>
                    </ol>
                </nav>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="d-flex align-items-center mb-4">
                    <i class="bi bi-bar-chart-line fs-4 me-2 text-primary"></i>
                    <h5 class="mb-0">STATISTIK {{ strtoupper($kategori_data->nama) }}</h5>
                </div>
                <p>{{ $kategori_data->deskripsi ?? 'Data statistik kategori '.$kategori_data->nama.' di Desa Kedungwungu' }}</p>
            </div>
        </div>

        <!-- Category Pills -->
        <div class="mb-4">
            <a href="{{ route('statistik') }}" class="btn btn-outline-primary rounded-pill me-2 mb-2">
                <i class="bi bi-grid-fill me-2"></i> Semua Kategori
            </a>
            @foreach($semua_kategori as $kat)
            <a href="{{ route('statistik.kategori', $kat->slug) }}" class="btn {{ $kategori_data->id == $kat->id ? 'btn-primary' : 'btn-outline-primary' }} rounded-pill me-2 mb-2">
                <i class="bi bi-bar-chart-line me-2"></i> {{ $kat->nama }}
            </a>
            @endforeach
        </div>

        <!-- Data Statistik -->
        <div class="card shadow-sm mb-4">
            <div class="card-header bg-light border-0">
                <h5 class="card-title mb-0"><i class="bi bi-table me-2 text-primary"></i>DATA {{ strtoupper($kategori_data->nama) }}</h5>
            </div>
            <div class="card-body">
                @if($statistik->count() > 0)
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead class="table-light">
                                <tr>
                                    <th>Judul</th>
                                    <th>Nilai</th>
                                    <th>Satuan</th>
                                    <th>Tahun</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($statistik as $item)
                                <tr>
                                    <td>{{ $item->judul }}</td>
                                    <td class="fw-bold">{{ number_format($item->nilai, 0, ',', '.') }}</td>
                                    <td>{{ $item->satuan }}</td>
                                    <td>{{ $item->tahun }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    <div class="d-flex justify-content-center mt-4">
                        {{ $statistik->links() }}
                    </div>
                @else
                    <div class="alert alert-info">
                        <i class="bi bi-info-circle me-2"></i> Belum ada data statistik untuk kategori ini.
                    </div>
                @endif
            </div>
        </div>

        <!-- Grafik Statistik -->
        @if($statistik->count() > 0)
        <div class="card shadow-sm mb-4">
            <div class="card-header bg-light border-0">
                <h5 class="card-title mb-0"><i class="bi bi-pie-chart me-2 text-primary"></i>GRAFIK {{ strtoupper($kategori_data->nama) }}</h5>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="card border-0 shadow-sm h-100">
                            <div class="card-header bg-white border-0">
                                <h6 class="card-title mb-0">Perbandingan Data {{ $kategori_data->nama }}</h6>
                            </div>
                            <div class="card-body text-center">
                                <canvas id="categoryChart" height="250"></canvas>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card border-0 shadow-sm h-100">
                            <div class="card-header bg-white border-0">
                                <h6 class="card-title mb-0">Tren {{ $kategori_data->nama }} per Tahun</h6>
                            </div>
                            <div class="card-body text-center">
                                <canvas id="trendChart" height="250"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endif
    </div>

    @push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
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

        .text-primary {
            color: var(--primary-color) !important;
        }

        .bg-primary {
            background-color: var(--primary-color) !important;
        }

        .hero-section {
            background-color: var(--primary-color);
            padding: 3rem 0;
            margin-bottom: 0;
        }
    </style>
    @if($statistik->count() > 0)
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Category Chart
            const categoryCtx = document.getElementById('categoryChart').getContext('2d');
            const categoryChart = new Chart(categoryCtx, {
                type: 'pie',
                data: {
                    labels: [
                        @foreach($statistik->take(5) as $item)
                        '{{ $item->judul }}',
                        @endforeach
                    ],
                    datasets: [{
                        data: [
                            @foreach($statistik->take(5) as $item)
                            {{ $item->nilai }},
                            @endforeach
                        ],
                        backgroundColor: ['#4e73df', '#1cc88a', '#36b9cc', '#f6c23e', '#e74a3b'],
                        hoverBackgroundColor: ['#2e59d9', '#17a673', '#2c9faf', '#f4b619', '#e02d1b'],
                        hoverBorderColor: "rgba(234, 236, 244, 1)",
                    }]
                },
                options: {
                    maintainAspectRatio: false,
                    plugins: {
                        legend: {
                            position: 'bottom'
                        }
                    }
                }
            });

            // Trend Chart
            const trendCtx = document.getElementById('trendChart').getContext('2d');
            const trendChart = new Chart(trendCtx, {
                type: 'line',
                data: {
                    labels: [
                        @foreach($statistik->sortBy('tahun')->take(5) as $item)
                        '{{ $item->tahun }}',
                        @endforeach
                    ],
                    datasets: [{
                        label: '{{ $kategori_data->nama }}',
                        data: [
                            @foreach($statistik->sortBy('tahun')->take(5) as $item)
                            {{ $item->nilai }},
                            @endforeach
                        ],
                        backgroundColor: 'rgba(0, 166, 124, 0.1)',
                        borderColor: '#00A67C',
                        borderWidth: 2,
                        pointBackgroundColor: '#00A67C',
                        tension: 0.3
                    }]
                },
                options: {
                    maintainAspectRatio: false,
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });
        });
    </script>
    @endif
    @endpush
</x-bootstrap-layout>
