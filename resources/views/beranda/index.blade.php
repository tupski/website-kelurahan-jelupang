<x-bootstrap-layout>
    <!-- Hero Section -->
    <div class="hero-section">
        <div class="container py-5">
            <div class="row">
                <div class="col-md-8">
                    <h1 class="display-4 fw-bold mb-3">
                        {{ $profil->nama_kelurahan ?? 'Kelurahan Jelupang' }}
                    </h1>
                    <p class="fs-5 mb-4">
                        {{ $profil->kecamatan ?? 'Kecamatan Serpong Utara' }},
                        {{ $profil->kabupaten_kota ?? 'Kota Tangerang Selatan' }},
                        {{ $profil->provinsi ?? 'Banten' }}
                    </p>
                    <div class="d-flex flex-wrap gap-2">
                        <a href="{{ route('profil') }}" class="btn btn-light btn-lg">
                            Profil Kelurahan
                        </a>
                        <a href="{{ route('layanan') }}" class="btn btn-success btn-lg">
                            Layanan Kami
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Berita Terbaru Section -->
    <section class="py-5 bg-light">
        <div class="container">
            <div class="text-center mb-5">
                <h2 class="section-title">Berita Terbaru</h2>
                <p class="text-muted">Informasi terkini seputar kegiatan dan pengumuman di Kelurahan Jelupang</p>
            </div>

            <div class="row">
                @forelse($berita as $item)
                    <div class="col-md-4 mb-4">
                        <div class="card h-100">
                            @if($item->gambar)
                                <img src="{{ asset($item->gambar) }}" alt="{{ $item->judul }}" class="card-img-top">
                            @else
                                <div class="bg-light d-flex align-items-center justify-content-center" style="height: 200px;">
                                    <i class="bi bi-newspaper text-secondary" style="font-size: 3rem;"></i>
                                </div>
                            @endif
                            <div class="card-body">
                                <div class="small text-muted mb-2">{{ $item->created_at->format('d M Y') }}</div>
                                <h5 class="card-title">
                                    <a href="{{ route('berita.detail', $item->slug) }}" class="text-decoration-none text-dark">
                                        {{ $item->judul }}
                                    </a>
                                </h5>
                                <p class="card-text">{{ Str::limit(strip_tags($item->konten), 100) }}</p>
                            </div>
                            <div class="card-footer bg-transparent border-top-0">
                                <a href="{{ route('berita.detail', $item->slug) }}" class="btn btn-sm btn-outline-success">
                                    Baca selengkapnya <i class="bi bi-arrow-right ms-1"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-12 text-center py-5">
                        <i class="bi bi-newspaper text-secondary mb-4" style="font-size: 4rem;"></i>
                        <h4 class="fw-bold mb-3">Belum Ada Berita</h4>
                        <p class="text-muted">Berita akan ditampilkan di sini setelah ditambahkan.</p>
                    </div>
                @endforelse
            </div>

            <div class="text-center mt-4">
                <a href="{{ route('berita') }}" class="btn btn-success">
                    Lihat Semua Berita
                </a>
            </div>
        </div>
    </section>

    <!-- Layanan Section -->
    <section class="py-5 bg-white">
        <div class="container">
            <div class="text-center mb-5">
                <h2 class="section-title">Layanan Kelurahan</h2>
                <p class="text-muted">Berbagai layanan administrasi dan informasi untuk warga Kelurahan Jelupang</p>
            </div>

            <div class="row">
                @forelse($layanan as $item)
                    <div class="col-md-4 mb-4">
                        <div class="card h-100 border-0 shadow-sm">
                            <div class="card-body text-center p-4">
                                <div class="rounded-circle bg-primary bg-opacity-10 p-3 d-inline-flex mb-3">
                                    @if($item->ikon)
                                        <img src="{{ asset($item->ikon) }}" alt="{{ $item->nama }}" height="32">
                                    @else
                                        <i class="bi bi-file-earmark-text text-primary" style="font-size: 2rem;"></i>
                                    @endif
                                </div>
                                <h5 class="card-title">{{ $item->nama }}</h5>
                                <p class="card-text text-muted">{{ Str::limit(strip_tags($item->deskripsi), 100) }}</p>
                                <a href="{{ route('layanan.detail', $item->slug) }}" class="btn btn-outline-primary mt-3">
                                    Detail Layanan <i class="bi bi-arrow-right ms-1"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-12 text-center py-5">
                        <i class="bi bi-file-earmark-text text-secondary mb-4" style="font-size: 4rem;"></i>
                        <h4 class="fw-bold mb-3">Belum Ada Layanan</h4>
                        <p class="text-muted">Layanan akan ditampilkan di sini setelah ditambahkan.</p>
                    </div>
                @endforelse
            </div>

            <div class="text-center mt-4">
                <a href="{{ route('layanan') }}" class="btn btn-primary">
                    Lihat Semua Layanan
                </a>
            </div>
        </div>
    </section>

    <!-- UMKM Section -->
    <section class="py-5 bg-light">
        <div class="container">
            <div class="text-center mb-5">
                <h2 class="section-title">UMKM Kelurahan</h2>
                <p class="text-muted">Daftar UMKM yang ada di Kelurahan Jelupang untuk mendukung ekonomi lokal</p>
            </div>

            <div class="row">
                @forelse($umkm as $item)
                    <div class="col-md-4 mb-4">
                        <div class="card h-100">
                            @if($item->gambar)
                                <img src="{{ asset($item->gambar) }}" alt="{{ $item->nama }}" class="card-img-top">
                            @else
                                <div class="bg-light d-flex align-items-center justify-content-center" style="height: 200px;">
                                    <i class="bi bi-shop text-secondary" style="font-size: 3rem;"></i>
                                </div>
                            @endif
                            <div class="card-body">
                                <div class="mb-2">
                                    <span class="badge bg-warning text-dark">{{ $item->kategori->nama ?? 'Umum' }}</span>
                                </div>
                                <h5 class="card-title">
                                    <a href="{{ route('umkm.detail', $item->slug) }}" class="text-decoration-none text-dark">
                                        {{ $item->nama }}
                                    </a>
                                </h5>
                                <p class="card-text small text-muted mb-2">Pemilik: {{ $item->nama_pemilik }}</p>
                                <p class="card-text">{{ Str::limit(strip_tags($item->deskripsi), 80) }}</p>
                            </div>
                            <div class="card-footer bg-transparent border-top-0">
                                <a href="{{ route('umkm.detail', $item->slug) }}" class="btn btn-sm btn-outline-warning">
                                    Lihat Detail <i class="bi bi-arrow-right ms-1"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-12 text-center py-5">
                        <i class="bi bi-shop text-secondary mb-4" style="font-size: 4rem;"></i>
                        <h4 class="fw-bold mb-3">Belum Ada UMKM</h4>
                        <p class="text-muted">UMKM akan ditampilkan di sini setelah ditambahkan.</p>
                    </div>
                @endforelse
            </div>

            <div class="text-center mt-4">
                <a href="{{ route('umkm') }}" class="btn btn-warning text-dark">
                    Lihat Semua UMKM
                </a>
            </div>
        </div>
    </section>

    <!-- Kontak Section -->
    <section class="py-5 bg-white">
        <div class="container">
            <div class="card border-0 shadow-sm overflow-hidden">
                <div class="row g-0">
                    <div class="col-md-6 p-4 p-md-5">
                        <h2 class="section-title text-start">Hubungi Kami</h2>
                        <p class="text-muted mb-4">Jika Anda memiliki pertanyaan atau membutuhkan informasi lebih lanjut, silakan hubungi kami.</p>

                        <div class="mb-4">
                            <div class="d-flex mb-3">
                                <div class="bg-success bg-opacity-10 p-2 rounded-circle me-3">
                                    <i class="bi bi-geo-alt text-success"></i>
                                </div>
                                <div>
                                    <h5 class="fw-bold">Alamat</h5>
                                    <p class="text-muted">{{ $profil->alamat ?? 'Jl. Raya Jelupang No. 123, Serpong Utara, Tangerang Selatan, Banten 15310' }}</p>
                                </div>
                            </div>

                            <div class="d-flex mb-3">
                                <div class="bg-success bg-opacity-10 p-2 rounded-circle me-3">
                                    <i class="bi bi-telephone text-success"></i>
                                </div>
                                <div>
                                    <h5 class="fw-bold">Telepon</h5>
                                    <p class="text-muted">{{ $profil->telepon ?? '(021) 1234-5678' }}</p>
                                </div>
                            </div>

                            <div class="d-flex">
                                <div class="bg-success bg-opacity-10 p-2 rounded-circle me-3">
                                    <i class="bi bi-envelope text-success"></i>
                                </div>
                                <div>
                                    <h5 class="fw-bold">Email</h5>
                                    <p class="text-muted">{{ $profil->email ?? 'info@kelurahanjelupang.go.id' }}</p>
                                </div>
                            </div>
                        </div>

                        <a href="{{ route('profil.kontak') }}" class="btn btn-success">
                            Informasi Kontak Lengkap
                        </a>
                    </div>

                    <div class="col-md-6 p-0">
                        <div class="ratio ratio-1x1" style="min-height: 400px;">
                            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3965.7331455606383!2d106.6735!3d-6.2935!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2zNsKwMTcnMzYuNiJTIDEwNsKwNDAnMjQuNiJF!5e0!3m2!1sid!2sid!4v1620000000000!5m2!1sid!2sid"
                                style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</x-bootstrap-layout>
