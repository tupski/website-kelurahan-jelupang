<x-admin-bootstrap-layout>
    <x-slot name="header">
        <h1 class="h3 mb-0">Detail Layanan</h1>
    </x-slot>

    <div class="row mb-4">
        <div class="col-md-6">
            <h2 class="fs-4">{{ $layanan->nama }}</h2>
        </div>
        <div class="col-md-6 text-md-end">
            <a href="{{ route('admin.layanan.edit', $layanan->id) }}" class="btn btn-warning">
                <i class="bi bi-pencil-square me-1"></i> Edit
            </a>
            <a href="{{ route('admin.layanan.index') }}" class="btn btn-secondary ms-2">
                <i class="bi bi-arrow-left me-1"></i> Kembali
            </a>
        </div>
    </div>

    <div class="row">
        <div class="col-md-8">
            <div class="card mb-4">
                <div class="card-header">
                    <h5 class="card-title mb-0">Informasi Layanan</h5>
                </div>
                <div class="card-body">
                    <div class="mb-4">
                        <h6 class="fw-bold">Deskripsi</h6>
                        <p>{!! nl2br(e($layanan->deskripsi)) !!}</p>
                    </div>
                    
                    @if($layanan->persyaratan)
                    <div class="mb-4">
                        <h6 class="fw-bold">Persyaratan</h6>
                        <p>{!! nl2br(e($layanan->persyaratan)) !!}</p>
                    </div>
                    @endif
                </div>
            </div>
        </div>
        
        <div class="col-md-4">
            <div class="card mb-4">
                <div class="card-header">
                    <h5 class="card-title mb-0">Detail</h5>
                </div>
                <div class="card-body">
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            <span class="fw-bold">Status</span>
                            @if($layanan->aktif)
                                <span class="badge bg-success">Aktif</span>
                            @else
                                <span class="badge bg-danger">Tidak Aktif</span>
                            @endif
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            <span class="fw-bold">Kategori</span>
                            <span>{{ $layanan->kategori->nama ?? 'Tidak ada kategori' }}</span>
                        </li>
                        @if($layanan->jam_layanan)
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            <span class="fw-bold">Jam Layanan</span>
                            <span>{{ $layanan->jam_layanan }}</span>
                        </li>
                        @endif
                        @if($layanan->lokasi)
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            <span class="fw-bold">Lokasi</span>
                            <span>{{ $layanan->lokasi }}</span>
                        </li>
                        @endif
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            <span class="fw-bold">Ikon</span>
                            <span><i class="bi {{ $layanan->ikon ?: 'bi-file-earmark-text' }} fs-4"></i></span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            <span class="fw-bold">Slug</span>
                            <span>{{ $layanan->slug }}</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            <span class="fw-bold">Dibuat pada</span>
                            <span>{{ $layanan->created_at->format('d M Y H:i') }}</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            <span class="fw-bold">Diperbarui pada</span>
                            <span>{{ $layanan->updated_at->format('d M Y H:i') }}</span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</x-admin-bootstrap-layout>
