<x-bootstrap-layout>
    <!-- Header Section -->
    <div class="hero-section">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <h1 class="display-5 fw-bold mb-3">Berita Terbaru</h1>
                    <p class="fs-5">Informasi terkini seputar kegiatan dan pengumuman di Kelurahan Jelupang</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Berita Section -->
    <div class="py-5">
        <div class="container">
            @if($berita->count() > 0)
                <div class="row">
                    @foreach($berita as $item)
                        <div class="col-md-6 col-lg-4">
                            <div class="card h-100">
                                @if($item->gambar)
                                    <img src="{{ asset($item->gambar) }}" alt="{{ $item->judul }}" class="card-img-top">
                                @else
                                    <img src="https://placehold.co/600x400/00A67C/FFFFFF?text=Berita+Kelurahan" alt="{{ $item->judul }}" class="card-img-top">
                                @endif

                                <div class="card-body">
                                    <div class="small text-muted mb-2">{{ $item->created_at->format('d M Y') }}</div>
                                    <h5 class="card-title">
                                        <a href="{{ route('berita.detail', $item->slug) }}" class="text-decoration-none text-dark">
                                            {{ $item->judul }}
                                        </a>
                                    </h5>

                                    @if(isset($item->pengguna))
                                    <div class="small text-muted mb-3">
                                        <span>Oleh: {{ $item->pengguna->nama ?? 'Admin' }}</span>
                                    </div>
                                    @endif

                                    <p class="card-text">
                                        {{ Str::limit(strip_tags($item->konten), 100) }}
                                    </p>
                                </div>
                                <div class="card-footer bg-transparent border-top-0">
                                    <a href="{{ route('berita.detail', $item->slug) }}" class="btn btn-sm btn-outline-success">
                                        Baca selengkapnya <i class="bi bi-arrow-right ms-1"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

                <div class="mt-4 d-flex justify-content-center">
                    {{ $berita->links() }}
                </div>
            @else
                <div class="card shadow-sm p-5 text-center">
                    <div class="py-5">
                        <i class="bi bi-newspaper text-secondary mb-4" style="font-size: 4rem;"></i>
                        <h4 class="fw-bold mb-3">Belum Ada Berita</h4>
                        <p class="text-muted">Berita akan ditampilkan di sini setelah ditambahkan.</p>
                    </div>
                </div>
            @endif
        </div>
    </div>
</x-bootstrap-layout>
