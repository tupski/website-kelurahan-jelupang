<x-bootstrap-layout>
    <div class="container py-5">
        <div class="row">
            <div class="col-12">
                <h1 class="display-5 fw-bold mb-4 text-primary">Statistik Kelurahan Jelupang</h1>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('beranda') }}">Beranda</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Statistik</li>
                    </ol>
                </nav>
            </div>
        </div>
        
        <div class="row g-4 mt-2">
            <div class="col-lg-3">
                <div class="card shadow-sm mb-4">
                    <div class="card-header bg-primary text-white">
                        <h5 class="card-title mb-0">Kategori Statistik</h5>
                    </div>
                    <div class="card-body">
                        <div class="list-group">
                            <a href="{{ route('statistik') }}" class="list-group-item list-group-item-action active">
                                <i class="bi bi-grid-fill me-2"></i> Semua Kategori
                            </a>
                            @foreach($kategori as $kat)
                            <a href="{{ route('statistik.kategori', $kat->slug) }}" class="list-group-item list-group-item-action">
                                <i class="bi bi-bar-chart-line me-2"></i> {{ $kat->nama }}
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
                            <h5 class="card-title mb-0">Data Statistik</h5>
                            <div class="input-group" style="width: 250px;">
                                <input type="text" class="form-control" placeholder="Cari statistik..." id="searchStatistik">
                                <button class="btn btn-primary" type="button"><i class="bi bi-search"></i></button>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
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
                            
                            <div class="d-flex justify-content-center mt-4">
                                {{ $statistik->links() }}
                            </div>
                            
                            <div class="alert alert-info mt-4">
                                <i class="bi bi-info-circle me-2"></i> Data statistik ini diperbarui secara berkala.
                            </div>
                        @else
                            <div class="alert alert-info">
                                <i class="bi bi-info-circle me-2"></i> Belum ada data statistik yang tersedia.
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-bootstrap-layout>
