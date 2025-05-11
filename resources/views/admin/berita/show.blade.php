<x-admin-bootstrap-layout>
    <x-slot name="header">
        <h1 class="h3 mb-0">Detail Berita</h1>
    </x-slot>

    <div class="row mb-4">
        <div class="col-md-6">
            <a href="{{ route('admin.berita.index') }}" class="btn btn-secondary">
                <i class="bi bi-arrow-left me-1"></i> Kembali
            </a>
        </div>
        <div class="col-md-6 text-md-end">
            <div class="btn-group" role="group">
                <a href="{{ route('admin.berita.edit', $berita->id) }}" class="btn btn-warning">
                    <i class="bi bi-pencil-square me-1"></i> Edit
                </a>
                <form action="{{ route('admin.berita.destroy', $berita->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Apakah Anda yakin ingin menghapus berita ini?')">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">
                        <i class="bi bi-trash me-1"></i> Hapus
                    </button>
                </form>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-8">
            <div class="card mb-4">
                <div class="card-body">
                    <h2 class="card-title fs-3 fw-bold mb-3">{{ $berita->judul }}</h2>

                    <div class="d-flex align-items-center text-muted mb-4">
                        <span><i class="bi bi-calendar me-1"></i> {{ $berita->created_at->format('d M Y, H:i') }}</span>
                        <span class="mx-2">•</span>
                        <span><i class="bi bi-person me-1"></i> {{ $berita->admin->name }}</span>
                        <span class="mx-2">•</span>
                        <span>
                            @if($berita->dipublikasikan)
                                <span class="badge bg-success">Dipublikasikan</span>
                            @else
                                <span class="badge bg-secondary">Draft</span>
                            @endif
                        </span>
                    </div>

                    @if($berita->gambar)
                        <div class="mb-4">
                            <img src="{{ asset($berita->gambar) }}" alt="{{ $berita->judul }}" class="img-fluid rounded">
                        </div>
                    @endif

                    <div class="mb-4">
                        {!! $berita->konten !!}
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card mb-4">
                <div class="card-header">
                    <h5 class="card-title mb-0">Informasi Berita</h5>
                </div>
                <div class="card-body">
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            <span class="fw-bold">Status</span>
                            @if($berita->dipublikasikan)
                                <span class="badge bg-success">Dipublikasikan</span>
                            @else
                                <span class="badge bg-secondary">Draft</span>
                            @endif
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            <span class="fw-bold">Tanggal Publikasi</span>
                            <span>{{ $berita->created_at->format('d M Y H:i') }}</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            <span class="fw-bold">Terakhir Diperbarui</span>
                            <span>{{ $berita->updated_at->format('d M Y H:i') }}</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            <span class="fw-bold">Penulis</span>
                            <span>{{ $berita->admin->name }}</span>
                        </li>
                        <li class="list-group-item">
                            <span class="fw-bold">URL Publik</span>
                            <div class="mt-2">
                                <a href="{{ route('berita.detail', $berita->slug) }}" target="_blank" class="btn btn-sm btn-outline-primary w-100">
                                    <i class="bi bi-box-arrow-up-right me-1"></i> Lihat di Website
                                </a>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</x-admin-bootstrap-layout>
