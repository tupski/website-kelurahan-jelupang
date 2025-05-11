<x-admin-bootstrap-layout>
    <x-slot name="header">
        <h1 class="h3 mb-0">Kelola UMKM</h1>
    </x-slot>

    <div class="row mb-4">
        <div class="col-md-6">
            <h2 class="fs-4">Daftar UMKM</h2>
        </div>
        <div class="col-md-6 text-md-end">
            <a href="{{ route('admin.umkm.create') }}" class="btn btn-primary">
                <i class="bi bi-plus-circle me-1"></i> Tambah UMKM
            </a>
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Pemilik</th>
                            <th>Kategori</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($umkm as $index => $item)
                            <tr>
                                <td>{{ $index + $umkm->firstItem() }}</td>
                                <td>{{ $item->nama }}</td>
                                <td>{{ $item->nama_pemilik }}</td>
                                <td>{{ $item->kategori->nama ?? 'Tidak ada kategori' }}</td>
                                <td>
                                    @if($item->aktif)
                                        <span class="badge bg-success">Aktif</span>
                                    @else
                                        <span class="badge bg-danger">Tidak Aktif</span>
                                    @endif
                                </td>
                                <td>
                                    <div class="btn-group" role="group">
                                        <a href="{{ route('admin.umkm.show', $item->id) }}" class="btn btn-sm btn-info">
                                            <i class="bi bi-eye"></i>
                                        </a>
                                        <a href="{{ route('admin.umkm.edit', $item->id) }}" class="btn btn-sm btn-warning">
                                            <i class="bi bi-pencil-square"></i>
                                        </a>
                                        <form action="{{ route('admin.umkm.destroy', $item->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Apakah Anda yakin ingin menghapus UMKM ini?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger">
                                                <i class="bi bi-trash"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="text-center">Belum ada data UMKM</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            
            <div class="d-flex justify-content-center mt-4">
                {{ $umkm->links() }}
            </div>
        </div>
    </div>
</x-admin-bootstrap-layout>
