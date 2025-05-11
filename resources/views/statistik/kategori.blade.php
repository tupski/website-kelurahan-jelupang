<x-bootstrap-layout>
    <!-- Header Section -->
    <div class="hero-section">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <h1 class="display-5 fw-bold mb-3">Statistik Kategori: {{ $kategori_data->nama }}</h1>
                    <p class="fs-5">Data statistik kategori {{ $kategori_data->nama }} di Kelurahan Jelupang</p>
                </div>
            </div>
        </div>
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

        <div class="row g-4">
            <div class="col-lg-3">
                <div class="card shadow-sm mb-4">
                    <div class="card-header bg-primary text-white">
                        <h5 class="card-title mb-0"><i class="bi bi-tags me-2"></i>Kategori Statistik</h5>
                    </div>
                    <div class="card-body p-0">
                        <div class="list-group list-group-flush rounded-0">
                            <a href="{{ route('statistik') }}" class="list-group-item list-group-item-action">
                                <i class="bi bi-grid-fill me-2"></i> Semua Kategori
                            </a>
                            @foreach($semua_kategori as $kat)
                            <a href="{{ route('statistik.kategori', $kat->slug) }}" class="list-group-item list-group-item-action {{ $kategori_data->id == $kat->id ? 'active' : '' }}">
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
                        <h5 class="card-title mb-0"><i class="bi bi-bar-chart me-2"></i>Statistik Kategori: {{ $kategori_data->nama }}</h5>
                    </div>
                    <div class="card-body">
                        @if($kategori_data->deskripsi)
                        <div class="alert alert-info mb-4">
                            <i class="bi bi-info-circle me-2"></i> {{ $kategori_data->deskripsi }}
                        </div>
                        @endif

                        @if($statistik->count() > 0)
                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <thead class="table-primary">
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

                <div class="card shadow-sm">
                    <div class="card-header bg-primary text-white">
                        <h5 class="card-title mb-0"><i class="bi bi-pie-chart me-2"></i>Grafik {{ $kategori_data->nama }}</h5>
                    </div>
                    <div class="card-body">
                        @if($statistik->count() > 0)
                            <div class="text-center py-4">
                                <img src="https://via.placeholder.com/800x400?text=Grafik+{{ urlencode($kategori_data->nama) }}" alt="Grafik {{ $kategori_data->nama }}" class="img-fluid rounded shadow-sm">
                            </div>
                        @else
                            <div class="alert alert-info">
                                <i class="bi bi-info-circle me-2"></i> Belum ada data untuk ditampilkan dalam grafik.
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-bootstrap-layout>
