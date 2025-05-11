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
        
        <div class="row g-4 mt-2">
            <div class="col-lg-3">
                <div class="card shadow-sm mb-4">
                    <div class="card-header bg-primary text-white">
                        <h5 class="card-title mb-0">Kategori Layanan</h5>
                    </div>
                    <div class="card-body">
                        <div class="list-group">
                            <a href="{{ route('layanan') }}" class="list-group-item list-group-item-action active">
                                <i class="bi bi-grid-fill me-2"></i> Semua Kategori
                            </a>
                            @foreach($kategori as $kat)
                            <a href="{{ route('layanan.kategori', $kat->slug) }}" class="list-group-item list-group-item-action">
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
                            <h5 class="card-title mb-0">Daftar Layanan</h5>
                            <div class="input-group" style="width: 250px;">
                                <input type="text" class="form-control" placeholder="Cari layanan..." id="searchLayanan">
                                <button class="btn btn-primary" type="button"><i class="bi bi-search"></i></button>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        @if($layanan->count() > 0)
                            <div class="row row-cols-1 row-cols-md-2 g-4">
                                @foreach($layanan as $item)
                                <div class="col">
                                    <div class="card h-100 border-0 shadow-sm">
                                        <div class="card-body">
                                            <div class="d-flex align-items-center mb-3">
                                                <div class="bg-primary bg-opacity-10 p-3 rounded-circle text-primary me-3">
                                                    <i class="bi {{ $item->ikon ?? 'bi-file-earmark-text' }} fs-4"></i>
                                                </div>
                                                <h5 class="card-title mb-0">{{ $item->nama }}</h5>
                                            </div>
                                            <p class="card-text text-muted small">
                                                <i class="bi bi-tag me-1"></i> {{ $item->kategori->nama ?? 'Umum' }}
                                            </p>
                                            <p class="card-text">{{ Str::limit($item->deskripsi, 100) }}</p>
                                        </div>
                                        <div class="card-footer bg-white border-0">
                                            <a href="{{ route('layanan.detail', $item->slug) }}" class="btn btn-sm btn-primary">
                                                <i class="bi bi-info-circle me-1"></i> Detail Layanan
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
</x-bootstrap-layout>
