<x-admin-bootstrap-layout>
    <x-slot name="header">
        <h1 class="h3 mb-0">Kelola Berita</h1>
    </x-slot>

    <div class="row mb-4">
        <div class="col-md-6">
            <h2 class="fs-4">Daftar Berita</h2>
        </div>
        <div class="col-md-6 text-md-end">
            <a href="{{ route('admin.berita.create') }}" class="btn btn-primary">
                <i class="bi bi-plus-circle me-1"></i> Tambah Berita
            </a>
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            @if($berita->count() > 0)
                <div class="table-responsive">
                    <table class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Judul</th>
                                <th>Tanggal</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($berita as $index => $item)
                                <tr>
                                    <td>{{ $index + $berita->firstItem() }}</td>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            @if($item->gambar)
                                                <img src="{{ asset($item->gambar) }}" alt="{{ $item->judul }}" class="rounded me-3" style="width: 50px; height: 50px; object-fit: cover;">
                                            @endif
                                            <div>
                                                <h6 class="mb-0">{{ $item->judul }}</h6>
                                                <small class="text-muted">{{ Str::limit(strip_tags($item->konten), 50) }}</small>
                                            </div>
                                        </div>
                                    </td>
                                    <td>{{ $item->created_at->format('d M Y') }}</td>
                                    <td>
                                        @if($item->dipublikasikan)
                                            <span class="badge bg-success">Dipublikasikan</span>
                                        @else
                                            <span class="badge bg-secondary">Draft</span>
                                        @endif
                                    </td>
                                    <td>
                                        <div class="btn-group" role="group">
                                            <a href="{{ route('admin.berita.show', $item->id) }}" class="btn btn-sm btn-info">
                                                <i class="bi bi-eye"></i>
                                            </a>
                                            <a href="{{ route('admin.berita.edit', $item->id) }}" class="btn btn-sm btn-warning">
                                                <i class="bi bi-pencil-square"></i>
                                            </a>
                                            <form action="{{ route('admin.berita.destroy', $item->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Apakah Anda yakin ingin menghapus berita ini?')">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger">
                                                    <i class="bi bi-trash"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <div class="d-flex justify-content-center mt-4">
                    {{ $berita->links() }}
                </div>
            @else
                <div class="text-center py-5">
                    <i class="bi bi-newspaper text-muted" style="font-size: 3rem;"></i>
                    <h4 class="mt-3">Belum Ada Berita</h4>
                    <p class="text-muted">Mulai tambahkan berita untuk ditampilkan di website.</p>
                    <a href="{{ route('admin.berita.create') }}" class="btn btn-primary mt-3">
                        <i class="bi bi-plus-circle me-1"></i> Tambah Berita Pertama
                    </a>
                </div>
            @endif
        </div>
    </div>
</x-admin-bootstrap-layout>
