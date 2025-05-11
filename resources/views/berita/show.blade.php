<x-bootstrap-layout>
    <div class="container py-5">
        <div class="row">
            <div class="col-12">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('beranda') }}">Beranda</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('berita') }}">Berita</a></li>
                        <li class="breadcrumb-item active" aria-current="page">{{ $berita->judul }}</li>
                    </ol>
                </nav>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-8">
                <div class="card shadow-sm mb-4">
                    <div class="card-body">
                        <article>
                            <h1 class="display-5 fw-bold mb-3">{{ $berita->judul }}</h1>

                            <div class="d-flex align-items-center text-muted mb-4">
                                <div class="d-flex align-items-center me-3">
                                    <i class="bi bi-calendar3 me-2"></i>
                                    <span>{{ $berita->created_at->format('d M Y') }}</span>
                                </div>
                                <div class="d-flex align-items-center">
                                    <i class="bi bi-person me-2"></i>
                                    <span>{{ $berita->admin->nama ?? 'Admin' }}</span>
                                </div>
                            </div>

                            @if($berita->gambar)
                                <div class="mb-4">
                                    <img src="{{ asset($berita->gambar) }}" alt="{{ $berita->judul }}" class="img-fluid rounded">
                                </div>
                            @endif

                            <div class="berita-content mb-4">
                                {!! $berita->konten !!}
                            </div>

                            <div class="d-flex align-items-center justify-content-between border-top pt-4 mt-4">
                                <div class="d-flex align-items-center">
                                    <span class="text-muted me-3">Bagikan:</span>
                                    <a href="https://twitter.com/intent/tweet?url={{ urlencode(url()->current()) }}&text={{ urlencode($berita->judul) }}" target="_blank" class="btn btn-sm btn-outline-primary me-2">
                                        <i class="bi bi-twitter"></i>
                                    </a>
                                    <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(url()->current()) }}" target="_blank" class="btn btn-sm btn-outline-primary me-2">
                                        <i class="bi bi-facebook"></i>
                                    </a>
                                    <a href="https://api.whatsapp.com/send?text={{ urlencode($berita->judul . ' ' . url()->current()) }}" target="_blank" class="btn btn-sm btn-outline-success">
                                        <i class="bi bi-whatsapp"></i>
                                    </a>
                                </div>
                            </div>
                        </article>
                    </div>
                </div>
            </div>

            <div class="col-lg-4">
                <div class="card shadow-sm mb-4">
                    <div class="card-header bg-primary text-white">
                        <h5 class="card-title mb-0">Berita Terbaru</h5>
                    </div>
                    <div class="card-body">
                        @if($beritaTerkait->count() > 0)
                            <div class="list-group list-group-flush">
                                @foreach($beritaTerkait as $item)
                                    <a href="{{ route('berita.detail', $item->slug) }}" class="list-group-item list-group-item-action d-flex gap-3 py-3">
                                        @if($item->gambar)
                                            <img src="{{ asset($item->gambar) }}" alt="{{ $item->judul }}" width="80" height="60" class="rounded flex-shrink-0 object-fit-cover">
                                        @else
                                            <div class="bg-light rounded flex-shrink-0 d-flex align-items-center justify-content-center" style="width: 80px; height: 60px;">
                                                <i class="bi bi-newspaper text-muted fs-4"></i>
                                            </div>
                                        @endif
                                        <div class="d-flex gap-2 w-100 justify-content-between">
                                            <div>
                                                <h6 class="mb-0">{{ Str::limit($item->judul, 50) }}</h6>
                                                <p class="mb-0 opacity-75 small">{{ $item->created_at->format('d M Y') }}</p>
                                            </div>
                                        </div>
                                    </a>
                                @endforeach
                            </div>
                        @else
                            <div class="alert alert-info mb-0">
                                <i class="bi bi-info-circle me-2"></i> Belum ada berita terkait.
                            </div>
                        @endif
                    </div>
                </div>

                <div class="card shadow-sm">
                    <div class="card-header bg-primary text-white">
                        <h5 class="card-title mb-0">Kategori</h5>
                    </div>
                    <div class="card-body">
                        <div class="list-group list-group-flush">
                            <a href="#" class="list-group-item list-group-item-action d-flex justify-content-between align-items-center">
                                Pengumuman
                                <span class="badge bg-primary rounded-pill">12</span>
                            </a>
                            <a href="#" class="list-group-item list-group-item-action d-flex justify-content-between align-items-center">
                                Kegiatan
                                <span class="badge bg-primary rounded-pill">8</span>
                            </a>
                            <a href="#" class="list-group-item list-group-item-action d-flex justify-content-between align-items-center">
                                Informasi
                                <span class="badge bg-primary rounded-pill">5</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @push('scripts')
    <style>
        .berita-content {
            line-height: 1.7;
        }

        .berita-content h1 {
            font-size: 2rem;
            margin-bottom: 1rem;
            font-weight: 600;
        }

        .berita-content h2 {
            font-size: 1.75rem;
            margin-bottom: 0.75rem;
            font-weight: 600;
        }

        .berita-content h3 {
            font-size: 1.5rem;
            margin-bottom: 0.75rem;
            font-weight: 600;
        }

        .berita-content p {
            margin-bottom: 1rem;
        }

        .berita-content ul,
        .berita-content ol {
            margin-bottom: 1rem;
            padding-left: 2rem;
        }

        .berita-content img {
            max-width: 100%;
            height: auto;
            margin: 1rem 0;
            border-radius: 0.375rem;
        }

        .berita-content blockquote {
            border-left: 4px solid #0d6efd;
            padding-left: 1rem;
            font-style: italic;
            margin: 1rem 0;
            color: #6c757d;
        }

        .berita-content a {
            color: #0d6efd;
            text-decoration: none;
        }

        .berita-content a:hover {
            text-decoration: underline;
        }

        .berita-content table {
            width: 100%;
            margin-bottom: 1rem;
            border-collapse: collapse;
        }

        .berita-content table th,
        .berita-content table td {
            padding: 0.5rem;
            border: 1px solid #dee2e6;
        }

        .berita-content table th {
            background-color: #f8f9fa;
        }
    </style>
    @endpush
</x-bootstrap-layout>
