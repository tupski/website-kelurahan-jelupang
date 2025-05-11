<x-admin-bootstrap-layout>
    <x-slot name="header">
        <h1 class="h3 mb-0">Kelola Statistik</h1>
    </x-slot>

    <div class="row mb-4">
        <div class="col-md-6">
            <h2 class="fs-4">Daftar Statistik</h2>
        </div>
        <div class="col-md-6 text-md-end">
            <a href="{{ route('admin.statistik.create') }}" class="btn btn-primary">
                <i class="bi bi-plus-circle me-1"></i> Tambah Statistik
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
                            <th>Judul</th>
                            <th>Nilai</th>
                            <th>Satuan</th>
                            <th>Kategori</th>
                            <th>Tahun</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($statistik as $index => $item)
                            <tr>
                                <td>{{ $index + $statistik->firstItem() }}</td>
                                <td>{{ $item->judul }}</td>
                                <td>{{ number_format($item->nilai, 0, ',', '.') }}</td>
                                <td>{{ $item->satuan }}</td>
                                <td>{{ $item->kategori->nama ?? 'Tidak ada kategori' }}</td>
                                <td>{{ $item->tahun }}</td>
                                <td>
                                    <div class="btn-group" role="group">
                                        <a href="{{ route('admin.statistik.edit', $item->id) }}" class="btn btn-sm btn-warning">
                                            <i class="bi bi-pencil-square"></i>
                                        </a>
                                        <form action="{{ route('admin.statistik.destroy', $item->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Apakah Anda yakin ingin menghapus statistik ini?')">
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
                                <td colspan="7" class="text-center">Belum ada data statistik</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            
            <div class="d-flex justify-content-center mt-4">
                {{ $statistik->links() }}
            </div>
        </div>
    </div>
</x-admin-bootstrap-layout>
