@if($statistik->count() > 0)
    <div class="table-responsive">
        <table class="table table-hover">
            <thead class="table-light">
                <tr>
                    <th>Judul</th>
                    <th>Nilai</th>
                    <th>Satuan</th>
                    <th>Tahun</th>
                    <th>Kategori</th>
                </tr>
            </thead>
            <tbody>
                @foreach($statistik as $item)
                <tr>
                    <td>{{ $item->judul }}</td>
                    <td class="fw-bold">{{ number_format($item->nilai, 0, ',', '.') }}</td>
                    <td>{{ $item->satuan }}</td>
                    <td>{{ $item->tahun }}</td>
                    <td>
                        <span class="badge bg-primary">
                            {{ $item->kategori->nama ?? 'Umum' }}
                        </span>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@else
    <div class="alert alert-info">
        <i class="bi bi-info-circle me-2"></i> Belum ada data statistik yang tersedia.
    </div>
@endif
