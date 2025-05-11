<x-bootstrap-layout>
    <div class="container py-5">
        <div class="row">
            <div class="col-12">
                <h1 class="display-5 fw-bold mb-4 text-primary">UMKM Kelurahan Jelupang</h1>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('beranda') }}">Beranda</a></li>
                        <li class="breadcrumb-item active" aria-current="page">UMKM</li>
                    </ol>
                </nav>
            </div>
        </div>
        
        <div class="row g-4 mt-2">
            <div class="col-lg-3">
                <div class="card shadow-sm mb-4">
                    <div class="card-header bg-primary text-white">
                        <h5 class="card-title mb-0">Kategori UMKM</h5>
                    </div>
                    <div class="card-body">
                        <div class="list-group">
                            <a href="{{ route('umkm') }}" class="list-group-item list-group-item-action active">
                                <i class="bi bi-grid-fill me-2"></i> Semua Kategori
                            </a>
                            @foreach($kategori as $kat)
                            <a href="{{ route('umkm.kategori', $kat->slug) }}" class="list-group-item list-group-item-action">
                                <i class="bi {{ $kat->ikon ?? 'bi-tag' }} me-2"></i> {{ $kat->nama }}
                            </a>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-9">
                <div class="card shadow-sm">
                    <div class="card-header bg-light">
                        <div class="d-flex justify-content-between align-items-center">
                            <h5 class="card-title mb-0">Daftar UMKM</h5>
                            <div class="input-group" style="width: 250px;">
                                <input type="text" class="form-control" placeholder="Cari UMKM..." id="searchUMKM">
                                <button class="btn btn-primary" type="button"><i class="bi bi-search"></i></button>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        @if($umkm->count() > 0)
                            <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
                                @foreach($umkm as $item)
                                <div class="col">
                                    <div class="card h-100 border-0 shadow-sm">
                                        @if($item->gambar)
                                        <img src="{{ asset($item->gambar) }}" class="card-img-top" alt="{{ $item->nama }}" style="height: 180px; object-fit: cover;">
                                        @else
                                        <div class="bg-light text-center py-5">
                                            <i class="bi bi-shop fs-1 text-muted"></i>
                                        </div>
                                        @endif
                                        <div class="card-body">
                                            <h5 class="card-title">{{ $item->nama }}</h5>
                                            <p class="card-text text-muted small">
                                                <i class="bi bi-tag me-1"></i> {{ $item->kategori->nama ?? 'Umum' }}
                                            </p>
                                            <p class="card-text">{{ Str::limit($item->deskripsi, 100) }}</p>
                                        </div>
                                        <div class="card-footer bg-white border-0">
                                            <a href="{{ route('umkm.detail', $item->slug) }}" class="btn btn-sm btn-primary">
                                                <i class="bi bi-info-circle me-1"></i> Detail
                                            </a>
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
</x-bootstrap-layout>
