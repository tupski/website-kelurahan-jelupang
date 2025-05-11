<x-bootstrap-layout>
    <!-- Header Section -->
    <div class="hero-section">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <h1 class="display-5 fw-bold mb-3">UMKM Kelurahan Jelupang</h1>
                    <p class="fs-5">Usaha Mikro, Kecil, dan Menengah yang ada di wilayah Kelurahan Jelupang</p>
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
                        <li class="breadcrumb-item active" aria-current="page">UMKM</li>
                    </ol>
                </nav>
            </div>
        </div>

        <div class="row g-4">
            <div class="col-lg-3">
                <div class="card shadow-sm mb-4">
                    <div class="card-header bg-primary text-white">
                        <h5 class="card-title mb-0"><i class="bi bi-tags me-2"></i>Kategori UMKM</h5>
                    </div>
                    <div class="card-body p-0">
                        <div class="list-group list-group-flush rounded-0">
                            <a href="{{ route('umkm') }}" class="list-group-item list-group-item-action {{ !request()->route('slug') ? 'active' : '' }}">
                                <i class="bi bi-grid-fill me-2"></i> Semua Kategori
                            </a>
                            @foreach($kategori as $kat)
                            <a href="{{ route('umkm.kategori', $kat->slug) }}" class="list-group-item list-group-item-action {{ request()->route('slug') == $kat->slug ? 'active' : '' }}">
                                <i class="bi {{ $kat->ikon ?? 'bi-tag' }} me-2"></i> {{ $kat->nama }}
                            </a>
                            @endforeach
                        </div>
                    </div>
                </div>

                <div class="card shadow-sm mb-4">
                    <div class="card-header bg-primary text-white">
                        <h5 class="card-title mb-0"><i class="bi bi-search me-2"></i>Cari UMKM</h5>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('umkm') }}" method="GET">
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="Nama UMKM..." name="search" value="{{ request('search') }}">
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
                        <p class="card-text">UMKM (Usaha Mikro, Kecil, dan Menengah) di Kelurahan Jelupang merupakan penggerak ekonomi lokal yang penting bagi masyarakat.</p>
                        <p class="card-text mb-0">Untuk mendaftarkan UMKM Anda, silakan hubungi kantor Kelurahan Jelupang.</p>
                    </div>
                </div>
            </div>

            <div class="col-lg-9">
                <div class="card shadow-sm mb-4">
                    <div class="card-header bg-primary text-white">
                        <h5 class="card-title mb-0"><i class="bi bi-shop me-2"></i>Daftar UMKM</h5>
                    </div>
                    <div class="card-body">
                        @if($umkm->count() > 0)
                            <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
                                @foreach($umkm as $item)
                                <div class="col">
                                    <div class="card h-100 border-0 shadow-sm hover-card">
                                        <div class="position-relative">
                                            @if($item->gambar)
                                            <img src="{{ asset($item->gambar) }}" class="card-img-top" alt="{{ $item->nama }}" style="height: 180px; object-fit: cover;">
                                            @else
                                            <img src="https://placehold.co/600x400/00A67C/FFFFFF?text=UMKM+Jelupang" class="card-img-top" alt="{{ $item->nama }}" style="height: 180px; object-fit: cover;">
                                            @endif
                                            <div class="position-absolute top-0 start-0 m-2">
                                                <span class="badge bg-primary">
                                                    {{ $item->kategori->nama ?? 'Umum' }}
                                                </span>
                                            </div>
                                        </div>
                                        <div class="card-body">
                                            <h5 class="card-title">{{ $item->nama }}</h5>
                                            <p class="card-text text-muted small mb-2">
                                                <i class="bi bi-geo-alt me-1"></i> {{ $item->alamat ?? 'Kelurahan Jelupang' }}
                                            </p>
                                            <p class="card-text">{{ Str::limit($item->deskripsi, 100) }}</p>
                                        </div>
                                        <div class="card-footer bg-white border-0">
                                            <a href="{{ route('umkm.detail', $item->slug) }}" class="btn btn-sm btn-primary">
                                                <i class="bi bi-info-circle me-1"></i> Detail
                                            </a>
                                            @if($item->telepon)
                                            <a href="tel:{{ $item->telepon }}" class="btn btn-sm btn-outline-success">
                                                <i class="bi bi-telephone me-1"></i> Hubungi
                                            </a>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>

                            <div class="d-flex justify-content-center mt-4">
                                {{ $umkm->links() }}
                            </div>
                        @else
                            <div class="alert alert-info">
                                <i class="bi bi-info-circle me-2"></i> Belum ada data UMKM yang tersedia.
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
