<x-bootstrap-layout>
    <div class="container py-5">
        <div class="row">
            <div class="col-12">
                <h1 class="display-5 fw-bold mb-4 text-primary">Layanan Kelurahan Jelupang</h1>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('beranda') }}">Beranda</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Layanan</li>
                    </ol>
                </nav>
            </div>
        </div>

        <div class="row g-4">
            <div class="col-lg-3">
                <div class="card shadow-sm mb-4">
                    <div class="card-header bg-primary text-white">
                        <h5 class="card-title mb-0"><i class="bi bi-tags me-2"></i>Kategori Layanan</h5>
                    </div>
                    <div class="card-body p-0">
                        <div class="list-group list-group-flush rounded-0">
                            <a href="{{ route('layanan') }}" class="list-group-item list-group-item-action {{ !request()->route('slug') ? 'active' : '' }}">
                                <i class="bi bi-grid-fill me-2"></i> Semua Kategori
                            </a>
                            @foreach($kategori as $kat)
                            <a href="{{ route('layanan.kategori', $kat->slug) }}" class="list-group-item list-group-item-action {{ request()->route('slug') == $kat->slug ? 'active' : '' }}">
                                <i class="bi {{ $kat->ikon ?? 'bi-tag' }} me-2"></i> {{ $kat->nama }}
                            </a>
                            @endforeach
                        </div>
                    </div>
                </div>

                <div class="card shadow-sm mb-4">
                    <div class="card-header bg-primary text-white">
                        <h5 class="card-title mb-0"><i class="bi bi-search me-2"></i>Cari Layanan</h5>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('layanan') }}" method="GET">
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="Nama layanan..." name="search" value="{{ request('search') }}">
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
                        <p class="card-text">Layanan Kelurahan Jelupang tersedia untuk seluruh warga. Silakan datang ke kantor kelurahan dengan membawa persyaratan yang diperlukan.</p>
                        <p class="card-text mb-0">Jam Pelayanan:<br>Senin - Jumat: 08.00 - 16.00 WIB</p>
                    </div>
                </div>
            </div>

            <div class="col-lg-9">
                <div class="card shadow-sm mb-4">
                    <div class="card-header bg-primary text-white">
                        <h5 class="card-title mb-0"><i class="bi bi-file-earmark-text me-2"></i>Daftar Layanan</h5>
                    </div>
                    <div class="card-body">
                        @if($layanan->count() > 0)
                            <div class="row row-cols-1 row-cols-md-2 g-4">
                                @foreach($layanan as $item)
                                <div class="col">
                                    <div class="card h-100 border-0 shadow-sm hover-card">
                                        <div class="card-body">
                                            <div class="d-flex align-items-center mb-3">
                                                <div class="bg-primary bg-opacity-10 p-3 rounded-circle text-primary me-3">
                                                    <i class="bi {{ $item->ikon ?? 'bi-file-earmark-text' }} fs-4"></i>
                                                </div>
                                                <div>
                                                    <h5 class="card-title mb-0">{{ $item->nama }}</h5>
                                                    <span class="badge bg-primary mt-1">{{ $item->kategori->nama ?? 'Umum' }}</span>
                                                </div>
                                            </div>

                                            <div class="mb-3">
                                                <div class="d-flex align-items-center text-muted small mb-2">
                                                    <i class="bi bi-clock me-2"></i>
                                                    <span>Waktu Proses: {{ $item->waktu ?? '1-3 hari' }}</span>
                                                </div>
                                                <div class="d-flex align-items-center text-muted small">
                                                    <i class="bi bi-cash-coin me-2"></i>
                                                    <span>Biaya: {{ $item->biaya ?? 'Gratis' }}</span>
                                                </div>
                                            </div>

                                            <p class="card-text">{{ Str::limit($item->deskripsi, 100) }}</p>
                                        </div>
                                        <div class="card-footer bg-white border-0">
                                            <a href="{{ route('layanan.detail', $item->slug) }}" class="btn btn-sm btn-primary">
                                                <i class="bi bi-info-circle me-1"></i> Detail Layanan
                                            </a>
                                            <a href="#" class="btn btn-sm btn-outline-secondary">
                                                <i class="bi bi-download me-1"></i> Formulir
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>

                            <div class="d-flex justify-content-center mt-4">
                                {{ $layanan->links() }}
                            </div>
                        @else
                            <div class="alert alert-info">
                                <i class="bi bi-info-circle me-2"></i> Belum ada data layanan yang tersedia.
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

    @push('scripts')
    <style>
        .hover-card {
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .hover-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0,0,0,0.1) !important;
        }
    </style>
    @endpush
</x-bootstrap-layout>
