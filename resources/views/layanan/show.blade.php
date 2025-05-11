<x-bootstrap-layout>
    <!-- Header Section -->
    <div class="hero-section">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <h1 class="display-5 fw-bold mb-3">{{ $layanan->nama }}</h1>
                    <p class="fs-5">Informasi lengkap tentang layanan {{ $layanan->nama }}</p>
                </div>
            </div>
        </div>
    </div>

    <div class="container py-5">
        <div class="row">
            <div class="col-12">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('beranda') }}">Beranda</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('layanan') }}">Layanan</a></li>
                        <li class="breadcrumb-item active" aria-current="page">{{ $layanan->nama }}</li>
                    </ol>
                </nav>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-8">
                <div class="card shadow-sm mb-4">
                    <div class="card-header bg-white border-0">
                        <div class="d-flex align-items-center">
                            <div class="bg-primary bg-opacity-10 p-3 rounded-circle text-primary me-3">
                                <i class="bi {{ $layanan->ikon ?? 'bi-file-earmark-text' }} fs-4"></i>
                            </div>
                            <div>
                                <h4 class="card-title mb-0">{{ $layanan->nama }}</h4>
                                <span class="badge bg-primary">{{ $layanan->kategori->nama ?? 'Umum' }}</span>
                                <span class="badge bg-success ms-1">Gratis</span>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <p class="text-muted small mb-3">Diperbarui: {{ $layanan->updated_at->format('d M Y') }}</p>
                        
                        <div class="mb-4">
                            <p>{{ $layanan->deskripsi }}</p>
                        </div>

                        <div class="row mb-4">
                            <div class="col-md-4 mb-3">
                                <div class="d-flex align-items-center">
                                    <div class="bg-success bg-opacity-10 p-2 rounded-circle text-success me-3">
                                        <i class="bi bi-geo-alt"></i>
                                    </div>
                                    <div>
                                        <h6 class="mb-1">Lokasi Layanan</h6>
                                        <p class="mb-0 text-muted">{{ $layanan->lokasi ?? 'Kelurahan Jelupang' }}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 mb-3">
                                <div class="d-flex align-items-center">
                                    <div class="bg-primary bg-opacity-10 p-2 rounded-circle text-primary me-3">
                                        <i class="bi bi-clock"></i>
                                    </div>
                                    <div>
                                        <h6 class="mb-1">Jadwal Pelayanan</h6>
                                        <p class="mb-0 text-muted">{{ $layanan->jam_layanan ?? 'Senin-Jumat: 08:00-16:00' }}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 mb-3">
                                <div class="d-flex align-items-center">
                                    <div class="bg-info bg-opacity-10 p-2 rounded-circle text-info me-3">
                                        <i class="bi bi-telephone"></i>
                                    </div>
                                    <div>
                                        <h6 class="mb-1">Kontak Layanan</h6>
                                        <p class="mb-0 text-muted">(021) 7456 7827 (Pak Budi)</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="mb-4">
                            <h5 class="border-bottom pb-2 mb-3">Persyaratan</h5>
                            <div class="persyaratan">
                                @if($layanan->persyaratan)
                                    {!! $layanan->persyaratan !!}
                                @else
                                    <ul class="mb-0">
                                        <li class="mb-2">
                                            <div class="d-flex align-items-center">
                                                <i class="bi bi-check-circle-fill text-success me-2"></i>
                                                <span>Kartu Tanda Penduduk (KTP)</span>
                                            </div>
                                            <small class="text-muted ms-4">Asli dan fotokopi</small>
                                        </li>
                                        <li class="mb-2">
                                            <div class="d-flex align-items-center">
                                                <i class="bi bi-check-circle-fill text-success me-2"></i>
                                                <span>Kartu Keluarga (KK)</span>
                                            </div>
                                            <small class="text-muted ms-4">Asli dan fotokopi</small>
                                        </li>
                                        <li class="mb-2">
                                            <div class="d-flex align-items-center">
                                                <i class="bi bi-check-circle-fill text-success me-2"></i>
                                                <span>Surat Pengantar RT/RW</span>
                                            </div>
                                            <small class="text-muted ms-4">Asli</small>
                                        </li>
                                        <li class="mb-2">
                                            <div class="d-flex align-items-center">
                                                <i class="bi bi-check-circle-fill text-success me-2"></i>
                                                <span>Materai 10.000</span>
                                            </div>
                                            <small class="text-muted ms-4">Untuk surat pernyataan</small>
                                        </li>
                                        <li>
                                            <div class="d-flex align-items-center">
                                                <i class="bi bi-check-circle-fill text-success me-2"></i>
                                                <span>Pas Foto 3x4</span>
                                            </div>
                                            <small class="text-muted ms-4">2 lembar (latar belakang merah)</small>
                                        </li>
                                    </ul>
                                @endif
                            </div>
                        </div>

                        <div class="d-flex justify-content-between">
                            <a href="{{ route('layanan') }}" class="btn btn-outline-secondary">
                                <i class="bi bi-arrow-left me-1"></i> Kembali
                            </a>
                            <div>
                                <button class="btn btn-primary me-2" id="btnPengajuan">
                                    <i class="bi bi-file-earmark-text me-1"></i> Pengajuan
                                </button>
                                <button class="btn btn-outline-primary" id="btnProsedur">
                                    <i class="bi bi-info-circle me-1"></i> Prosedur
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-4">
                <div class="card shadow-sm mb-4">
                    <div class="card-header bg-primary text-white">
                        <h5 class="card-title mb-0"><i class="bi bi-list-check me-2"></i>Layanan Terkait</h5>
                    </div>
                    <div class="card-body p-0">
                        <div class="list-group list-group-flush">
                            @foreach($layanan_terkait as $terkait)
                            <a href="{{ route('layanan.detail', $terkait->slug) }}" class="list-group-item list-group-item-action">
                                <div class="d-flex align-items-center">
                                    <div class="bg-primary bg-opacity-10 p-2 rounded-circle text-primary me-3">
                                        <i class="bi {{ $terkait->ikon ?? 'bi-file-earmark-text' }}"></i>
                                    </div>
                                    <div>
                                        <h6 class="mb-0">{{ $terkait->nama }}</h6>
                                        <small class="text-muted">{{ $terkait->kategori->nama ?? 'Umum' }}</small>
                                    </div>
                                </div>
                            </a>
                            @endforeach
                        </div>
                    </div>
                </div>

                <div class="card shadow-sm">
                    <div class="card-header bg-primary text-white">
                        <h5 class="card-title mb-0"><i class="bi bi-info-circle me-2"></i>Informasi Tambahan</h5>
                    </div>
                    <div class="card-body">
                        <p>Untuk informasi lebih lanjut mengenai layanan ini, silakan hubungi kantor Kelurahan Jelupang pada jam kerja.</p>
                        <p class="mb-0"><i class="bi bi-telephone me-2"></i> (021) 7456 7827</p>
                        <p class="mb-0"><i class="bi bi-envelope me-2"></i> info@kelurahanjelupang.go.id</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Tombol Pengajuan
            document.getElementById('btnPengajuan').addEventListener('click', function() {
                alert('Fitur pengajuan online akan segera tersedia. Silakan datang langsung ke kantor kelurahan untuk mengajukan layanan ini.');
            });

            // Tombol Prosedur
            document.getElementById('btnProsedur').addEventListener('click', function() {
                alert('Prosedur layanan: 1) Siapkan dokumen persyaratan, 2) Datang ke kantor kelurahan, 3) Isi formulir pengajuan, 4) Tunggu proses verifikasi, 5) Ambil dokumen yang sudah jadi.');
            });
        });
    </script>
    @endpush
</x-bootstrap-layout>
