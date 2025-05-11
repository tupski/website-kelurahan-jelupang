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
                        <li class="breadcrumb-item active" aria-current="page">Statistik Desa</li>
                    </ol>
                </nav>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="d-flex align-items-center mb-4">
                    <i class="bi bi-bar-chart-line fs-4 me-2 text-primary"></i>
                    <h5 class="mb-0">KATEGORI DATA</h5>
                </div>
                <p>Pilih kategori data untuk melihat statistik desa dalam berbagai aspek</p>
            </div>
        </div>

        <!-- Category Pills -->
        <div class="mb-4">
            <a href="{{ route('statistik') }}" class="btn {{ !request()->route('slug') ? 'btn-primary' : 'btn-outline-primary' }} rounded-pill me-2 mb-2">
                <i class="bi bi-grid-fill me-2"></i> Semua Kategori
            </a>
            @foreach($kategori as $kat)
            <a href="{{ route('statistik.kategori', $kat->slug) }}" class="btn {{ request()->route('slug') == $kat->slug ? 'btn-primary' : 'btn-outline-primary' }} rounded-pill me-2 mb-2">
                <i class="bi bi-bar-chart-line me-2"></i> {{ $kat->nama }}
            </a>
            @endforeach
        </div>

        <!-- Kependudukan Desa Section -->
        <div class="card shadow-sm mb-4">
            <div class="card-header bg-light border-0">
                <h5 class="card-title mb-0"><i class="bi bi-people me-2 text-primary"></i>KEPENDUDUKAN DESA</h5>
            </div>
            <div class="card-body">
                <div class="row g-4">
                    <div class="col-md-4">
                        <div class="d-flex align-items-center">
                            <div class="bg-light rounded-circle p-3 me-3">
                                <i class="bi bi-people fs-3 text-primary"></i>
                            </div>
                            <div>
                                <h6 class="mb-1">Total Penduduk</h6>
                                <h3 class="mb-0 fw-bold">25</h3>
                                <small class="text-muted">Jumlah warga terdaftar di desa</small>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="d-flex align-items-center">
                            <div class="bg-light rounded-circle p-3 me-3">
                                <i class="bi bi-gender-ambiguous fs-3 text-primary"></i>
                            </div>
                            <div>
                                <h6 class="mb-1">Rasio Gender</h6>
                                <h3 class="mb-0 fw-bold">60% : 40%</h3>
                                <small class="text-muted">Perbandingan laki-laki dan perempuan</small>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="d-flex align-items-center">
                            <div class="bg-light rounded-circle p-3 me-3">
                                <i class="bi bi-house-door fs-3 text-primary"></i>
                            </div>
                            <div>
                                <h6 class="mb-1">Kepala Keluarga</h6>
                                <h3 class="mb-0 fw-bold">6</h3>
                                <small class="text-muted">Total KK terdaftar di desa</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Grafik Demografi Section -->
        <div class="card shadow-sm mb-4">
            <div class="card-header bg-light border-0">
                <h5 class="card-title mb-0"><i class="bi bi-pie-chart me-2 text-primary"></i>GRAFIK DEMOGRAFI</h5>
            </div>
            <div class="card-body">
                <div class="row g-4">
                    <div class="col-md-6">
                        <div class="card border-0 shadow-sm h-100">
                            <div class="card-header bg-white border-0">
                                <h6 class="card-title mb-0">Distribusi Jenis Kelamin</h6>
                            </div>
                            <div class="card-body text-center">
                                <div class="position-relative" style="height: 250px; width: 250px; margin: 0 auto;">
                                    <div class="position-absolute top-50 start-50 translate-middle text-center">
                                        <div class="fw-bold">Total</div>
                                        <div class="fs-4">25</div>
                                    </div>
                                    <canvas id="genderChart" width="250" height="250"></canvas>
                                </div>
                                <div class="mt-3 d-flex justify-content-center">
                                    <div class="me-4">
                                        <span class="d-inline-block rounded-circle me-2" style="width: 12px; height: 12px; background-color: #4e73df;"></span>
                                        <span>Laki-laki</span>
                                    </div>
                                    <div>
                                        <span class="d-inline-block rounded-circle me-2" style="width: 12px; height: 12px; background-color: #ff6384;"></span>
                                        <span>Perempuan</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card border-0 shadow-sm h-100">
                            <div class="card-header bg-white border-0">
                                <h6 class="card-title mb-0">Kelompok Umur</h6>
                            </div>
                            <div class="card-body">
                                <canvas id="ageChart" height="250"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Tingkat Pendidikan & Pekerjaan -->
        <div class="row g-4 mb-4">
            <div class="col-md-6">
                <div class="card shadow-sm h-100">
                    <div class="card-header bg-light border-0">
                        <h5 class="card-title mb-0"><i class="bi bi-mortarboard me-2 text-primary"></i>TINGKAT PENDIDIKAN</h5>
                    </div>
                    <div class="card-body text-center">
                        <div class="position-relative" style="height: 250px; width: 250px; margin: 0 auto;">
                            <div class="position-absolute top-50 start-50 translate-middle text-center">
                                <div class="fw-bold">Total</div>
                                <div class="fs-4">20</div>
                            </div>
                            <canvas id="educationChart" width="250" height="250"></canvas>
                        </div>
                        <div class="mt-3 d-flex justify-content-center flex-wrap">
                            <div class="me-3 mb-2">
                                <span class="d-inline-block rounded-circle me-1" style="width: 10px; height: 10px; background-color: #4e73df;"></span>
                                <span>SD</span>
                            </div>
                            <div class="me-3 mb-2">
                                <span class="d-inline-block rounded-circle me-1" style="width: 10px; height: 10px; background-color: #1cc88a;"></span>
                                <span>SMP</span>
                            </div>
                            <div class="me-3 mb-2">
                                <span class="d-inline-block rounded-circle me-1" style="width: 10px; height: 10px; background-color: #36b9cc;"></span>
                                <span>SMA</span>
                            </div>
                            <div class="me-3 mb-2">
                                <span class="d-inline-block rounded-circle me-1" style="width: 10px; height: 10px; background-color: #f6c23e;"></span>
                                <span>D3</span>
                            </div>
                            <div class="mb-2">
                                <span class="d-inline-block rounded-circle me-1" style="width: 10px; height: 10px; background-color: #e74a3b;"></span>
                                <span>S1</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card shadow-sm h-100">
                    <div class="card-header bg-light border-0">
                        <h5 class="card-title mb-0"><i class="bi bi-briefcase me-2 text-primary"></i>PEKERJAAN</h5>
                    </div>
                    <div class="card-body text-center">
                        <div class="position-relative" style="height: 250px; width: 250px; margin: 0 auto;">
                            <div class="position-absolute top-50 start-50 translate-middle text-center">
                                <div class="fw-bold">Total</div>
                                <div class="fs-4">20</div>
                            </div>
                            <canvas id="jobChart" width="250" height="250"></canvas>
                        </div>
                        <div class="mt-3 d-flex justify-content-center flex-wrap">
                            <div class="me-3 mb-2">
                                <span class="d-inline-block rounded-circle me-1" style="width: 10px; height: 10px; background-color: #4e73df;"></span>
                                <span>Petani</span>
                            </div>
                            <div class="me-3 mb-2">
                                <span class="d-inline-block rounded-circle me-1" style="width: 10px; height: 10px; background-color: #1cc88a;"></span>
                                <span>Guru</span>
                            </div>
                            <div class="me-3 mb-2">
                                <span class="d-inline-block rounded-circle me-1" style="width: 10px; height: 10px; background-color: #36b9cc;"></span>
                                <span>PNS</span>
                            </div>
                            <div class="me-3 mb-2">
                                <span class="d-inline-block rounded-circle me-1" style="width: 10px; height: 10px; background-color: #f6c23e;"></span>
                                <span>Karyawan Swasta</span>
                            </div>
                            <div class="mb-2">
                                <span class="d-inline-block rounded-circle me-1" style="width: 10px; height: 10px; background-color: #e74a3b;"></span>
                                <span>Pedagang</span>
                            </div>
                            <div class="mb-2">
                                <span class="d-inline-block rounded-circle me-1" style="width: 10px; height: 10px; background-color: #858796;"></span>
                                <span>Nelayan</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
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
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Gender Chart
            const genderCtx = document.getElementById('genderChart').getContext('2d');
            const genderChart = new Chart(genderCtx, {
                type: 'doughnut',
                data: {
                    labels: {!! json_encode($chartData['gender']['labels']) !!},
                    datasets: [{
                        data: {!! json_encode($chartData['gender']['data']) !!},
                        backgroundColor: ['#4e73df', '#ff6384'],
                        hoverBackgroundColor: ['#2e59d9', '#ff4069'],
                        hoverBorderColor: "rgba(234, 236, 244, 1)",
                    }]
                },
                options: {
                    maintainAspectRatio: false,
                    cutout: '70%',
                    plugins: {
                        legend: {
                            display: false
                        }
                    }
                }
            });

            // Age Chart
            const ageCtx = document.getElementById('ageChart').getContext('2d');
            const ageChart = new Chart(ageCtx, {
                type: 'bar',
                data: {
                    labels: ['Balita 0-5', 'Anak 6-12', 'Remaja 13-17', 'Dewasa Muda 18-30', 'Dewasa 31-50', 'Lansia 51+'],
                    datasets: [{
                        label: 'Jumlah Penduduk',
                        data: [2, 3, 4, 8, 5, 6],
                        backgroundColor: [
                            '#36b9cc', '#f6c23e', '#e74a3b', '#4e73df', '#1cc88a', '#f8a33b'
                        ],
                        borderWidth: 0
                    }]
                },
                options: {
                    maintainAspectRatio: false,
                    scales: {
                        y: {
                            beginAtZero: true,
                            ticks: {
                                precision: 0
                            }
                        }
                    },
                    plugins: {
                        legend: {
                            display: false
                        }
                    }
                }
            });

            // Education Chart
            const educationCtx = document.getElementById('educationChart').getContext('2d');
            const educationChart = new Chart(educationCtx, {
                type: 'doughnut',
                data: {
                    labels: {!! json_encode($chartData['pendidikan']['labels']) !!},
                    datasets: [{
                        data: {!! json_encode($chartData['pendidikan']['data']) !!},
                        backgroundColor: ['#4e73df', '#1cc88a', '#36b9cc', '#f6c23e', '#e74a3b', '#858796'],
                        hoverBackgroundColor: ['#2e59d9', '#17a673', '#2c9faf', '#f4b619', '#e02d1b', '#6e707e'],
                        hoverBorderColor: "rgba(234, 236, 244, 1)",
                    }]
                },
                options: {
                    maintainAspectRatio: false,
                    cutout: '70%',
                    plugins: {
                        legend: {
                            display: false
                        }
                    }
                }
            });

            // Job Chart
            const jobCtx = document.getElementById('jobChart').getContext('2d');
            const jobChart = new Chart(jobCtx, {
                type: 'doughnut',
                data: {
                    labels: ['Petani', 'Guru', 'PNS', 'Karyawan Swasta', 'Pedagang', 'Nelayan'],
                    datasets: [{
                        data: [30, 15, 10, 20, 15, 10],
                        backgroundColor: ['#4e73df', '#1cc88a', '#36b9cc', '#f6c23e', '#e74a3b', '#858796'],
                        hoverBackgroundColor: ['#2e59d9', '#17a673', '#2c9faf', '#f4b619', '#e02d1b', '#6e707e'],
                        hoverBorderColor: "rgba(234, 236, 244, 1)",
                    }]
                },
                options: {
                    maintainAspectRatio: false,
                    cutout: '70%',
                    plugins: {
                        legend: {
                            display: false
                        }
                    }
                }
            });
        });
    </script>
    @endpush
</x-bootstrap-layout>
