<x-admin-bootstrap-layout>
    <x-slot name="header">
        <h1 class="h3 mb-0">Detail UMKM</h1>
    </x-slot>

    <div class="row mb-4">
        <div class="col-md-6">
            <h2 class="fs-4">{{ $umkm->nama }}</h2>
        </div>
        <div class="col-md-6 text-md-end">
            <a href="{{ route('admin.umkm.edit', $umkm->id) }}" class="btn btn-warning">
                <i class="bi bi-pencil-square me-1"></i> Edit
            </a>
            <a href="{{ route('admin.umkm.index') }}" class="btn btn-secondary ms-2">
                <i class="bi bi-arrow-left me-1"></i> Kembali
            </a>
        </div>
    </div>

    <div class="row">
        <div class="col-md-8">
            <div class="card mb-4">
                <div class="card-header">
                    <h5 class="card-title mb-0">Informasi UMKM</h5>
                </div>
                <div class="card-body">
                    @if($umkm->gambar)
                        <div class="text-center mb-4">
                            <img src="{{ asset($umkm->gambar) }}" alt="{{ $umkm->nama }}" class="img-fluid rounded" style="max-height: 300px;">
                        </div>
                    @endif
                    
                    <div class="mb-4">
                        <h6 class="fw-bold">Deskripsi</h6>
                        <p>{!! nl2br(e($umkm->deskripsi)) !!}</p>
                    </div>
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
                            @if($umkm->aktif)
                                <span class="badge bg-success">Aktif</span>
                            @else
                                <span class="badge bg-danger">Tidak Aktif</span>
                            @endif
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            <span class="fw-bold">Kategori</span>
                            <span>{{ $umkm->kategori->nama ?? 'Tidak ada kategori' }}</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            <span class="fw-bold">Pemilik</span>
                            <span>{{ $umkm->nama_pemilik }}</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            <span class="fw-bold">Alamat</span>
                            <span>{{ $umkm->alamat }}</span>
                        </li>
                        @if($umkm->telepon)
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            <span class="fw-bold">Telepon</span>
                            <span>{{ $umkm->telepon }}</span>
                        </li>
                        @endif
                        @if($umkm->email)
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            <span class="fw-bold">Email</span>
                            <span>{{ $umkm->email }}</span>
                        </li>
                        @endif
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            <span class="fw-bold">Slug</span>
                            <span>{{ $umkm->slug }}</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            <span class="fw-bold">Dibuat pada</span>
                            <span>{{ $umkm->created_at->format('d M Y H:i') }}</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            <span class="fw-bold">Diperbarui pada</span>
                            <span>{{ $umkm->updated_at->format('d M Y H:i') }}</span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</x-admin-bootstrap-layout>
