@if($layanan->count() > 0)
    @foreach($layanan as $item)
    <div class="col-md-6 col-lg-4">
        <div class="card h-100 shadow-sm hover-card">
            <div class="card-body">
                <div class="d-flex align-items-center mb-3">
                    <div class="bg-primary bg-opacity-10 p-3 rounded-circle text-primary me-3">
                        <i class="bi {{ $item->ikon ?? 'bi-file-earmark-text' }} fs-4"></i>
                    </div>
                    <div>
                        <h5 class="card-title mb-0">{{ $item->nama }}</h5>
                        <span class="badge bg-primary mt-1">{{ $item->kategori->nama ?? 'Umum' }}</span>
                    </div>
                </div>

                <p class="card-text">{{ Str::limit($item->deskripsi, 100) }}</p>
                
                <div class="mt-3">
                    <div class="d-flex align-items-center text-muted small mb-2">
                        <i class="bi bi-clock me-2"></i>
                        <span>Setiap hari: {{ $item->jam_layanan ?? '08:00-16:00' }}</span>
                    </div>
                </div>
            </div>
            <div class="card-footer bg-white border-top-0">
                <div class="d-flex justify-content-between">
                    <a href="{{ route('layanan.detail', $item->slug) }}" class="btn btn-primary">
                        <i class="bi bi-info-circle me-1"></i> Detail Layanan
                    </a>
                    <a href="#" class="btn btn-outline-success">
                        <i class="bi bi-whatsapp me-1"></i> Hubungi
                    </a>
                </div>
            </div>
        </div>
    </div>
    @endforeach
@else
    <div class="col-12">
        <div class="alert alert-info">
            <i class="bi bi-info-circle me-2"></i> Belum ada data layanan yang tersedia.
        </div>
    </div>
@endif
