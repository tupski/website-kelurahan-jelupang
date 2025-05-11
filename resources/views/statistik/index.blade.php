<x-bootstrap-layout>
    <div class="container py-5">
        <div class="row">
            <div class="col-12">
                <h1 class="display-5 fw-bold mb-4 text-primary">Statistik Kelurahan Jelupang</h1>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('beranda') }}">Beranda</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Statistik</li>
                    </ol>
                </nav>
            </div>
        </div>

        <div class="row g-4">
            <div class="col-lg-3">
                <div class="card shadow-sm mb-4">
                    <div class="card-header bg-primary text-white">
                        <h5 class="card-title mb-0"><i class="bi bi-tags me-2"></i>Kategori Statistik</h5>
                    </div>
                    <div class="card-body p-0">
                        <div class="list-group list-group-flush rounded-0">
                            <a href="{{ route('statistik') }}" class="list-group-item list-group-item-action {{ !request()->route('slug') ? 'active' : '' }}">
                                <i class="bi bi-grid-fill me-2"></i> Semua Kategori
                            </a>
                            @foreach($kategori as $kat)
                            <a href="{{ route('statistik.kategori', $kat->slug) }}" class="list-group-item list-group-item-action {{ request()->route('slug') == $kat->slug ? 'active' : '' }}">
                                <i class="bi bi-bar-chart-line me-2"></i> {{ $kat->nama }}
                            </a>
                            @endforeach
                        </div>
                    </div>
                </div>

                <div class="card shadow-sm mb-4">
                    <div class="card-header bg-primary text-white">
                        <h5 class="card-title mb-0"><i class="bi bi-search me-2"></i>Cari Statistik</h5>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('statistik') }}" method="GET">
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="Kata kunci..." name="search" value="{{ request('search') }}">
                                <button class="btn btn-primary" type="submit"><i class="bi bi-search"></i></button>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="card shadow-sm d-none d-lg-block">
                    <div class="card-header bg-primary text-white">
                        <h5 class="card-title mb-0"><i class="bi bi-info-circle me-2"></i>Informasi</h5>
                    </div>
                    <div class="card-body">
                        <p class="card-text">Data statistik Kelurahan Jelupang diperbarui secara berkala. Data ini bersumber dari hasil pendataan dan sensus yang dilakukan oleh petugas kelurahan.</p>
                        <p class="card-text mb-0">Untuk informasi lebih lanjut, silakan hubungi kantor kelurahan.</p>
                    </div>
                </div>
            </div>

            <div class="col-lg-9">
                <div class="card shadow-sm mb-4">
                    <div class="card-header bg-primary text-white">
                        <h5 class="card-title mb-0"><i class="bi bi-bar-chart me-2"></i>Data Statistik</h5>
                    </div>
                    <div class="card-body">
                        <div class="row mb-4">
                            <div class="col-md-4">
                                <div class="card bg-primary bg-opacity-10 border-0">
                                    <div class="card-body text-center">
                                        <h6 class="text-primary">Jumlah Penduduk</h6>
                                        <h2 class="display-6 fw-bold">12.345</h2>
                                        <p class="small text-muted mb-0">Jiwa</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="card bg-success bg-opacity-10 border-0">
                                    <div class="card-body text-center">
                                        <h6 class="text-success">Luas Wilayah</h6>
                                        <h2 class="display-6 fw-bold">5.67</h2>
                                        <p class="small text-muted mb-0">km²</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="card bg-info bg-opacity-10 border-0">
                                    <div class="card-body text-center">
                                        <h6 class="text-info">Jumlah RT/RW</h6>
                                        <h2 class="display-6 fw-bold">45/9</h2>
                                        <p class="small text-muted mb-0">RT/RW</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        @if($statistik->count() > 0)
                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <thead class="table-primary">
                                        <tr>
                                            <th>Judul</th>
                                            <th>Nilai</th>
                                            <th>Satuan</th>
                                            <th>Tahun</th>
                                            <th>Kategori</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($statistik as $item)
                                        <tr>
                                            <td>{{ $item->judul }}</td>
                                            <td class="fw-bold">{{ number_format($item->nilai, 0, ',', '.') }}</td>
                                            <td>{{ $item->satuan }}</td>
                                            <td>{{ $item->tahun }}</td>
                                            <td>
                                                <span class="badge bg-primary">
                                                    {{ $item->kategori->nama ?? 'Umum' }}
                                                </span>
                                            </td>
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
                                <i class="bi bi-info-circle me-2"></i> Belum ada data statistik yang tersedia.
                            </div>
                        @endif
                    </div>
                </div>

                <div class="card shadow-sm">
                    <div class="card-header bg-primary text-white">
                        <h5 class="card-title mb-0"><i class="bi bi-pie-chart me-2"></i>Grafik Statistik</h5>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="card border-0 shadow-sm mb-4">
                                    <div class="card-header bg-light">
                                        <h6 class="card-title mb-0">Penduduk Berdasarkan Jenis Kelamin</h6>
                                    </div>
                                    <div class="card-body">
                                        <div class="text-center">
                                            <img src="https://via.placeholder.com/400x300?text=Grafik+Penduduk" alt="Grafik Penduduk" class="img-fluid">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="card border-0 shadow-sm mb-4">
                                    <div class="card-header bg-light">
                                        <h6 class="card-title mb-0">Penduduk Berdasarkan Usia</h6>
                                    </div>
                                    <div class="card-body">
                                        <div class="text-center">
                                            <img src="https://via.placeholder.com/400x300?text=Grafik+Usia" alt="Grafik Usia" class="img-fluid">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-bootstrap-layout>
