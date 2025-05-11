<x-bootstrap-layout>
    <div class="container py-5">
        <div class="row">
            <div class="col-12">
                <h1 class="display-5 fw-bold mb-4 text-primary">Visi & Misi Kelurahan Jelupang</h1>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('beranda') }}">Beranda</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('profil') }}">Profil</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Visi & Misi</li>
                    </ol>
                </nav>
            </div>
        </div>

        <div class="row g-4 mt-2">
            <div class="col-lg-4">
                <div class="card shadow-sm mb-4">
                    <div class="card-header bg-primary text-white">
                        <h5 class="card-title mb-0">Menu Profil</h5>
                    </div>
                    <div class="card-body">
                        <div class="list-group">
                            <a href="{{ route('profil') }}" class="list-group-item list-group-item-action">
                                <i class="bi bi-info-circle me-2"></i> Profil Umum
                            </a>
                            <a href="{{ route('profil.sejarah') }}" class="list-group-item list-group-item-action">
                                <i class="bi bi-clock-history me-2"></i> Sejarah
                            </a>
                            <a href="{{ route('profil.visi-misi') }}" class="list-group-item list-group-item-action active">
                                <i class="bi bi-bullseye me-2"></i> Visi & Misi
                            </a>
                            <a href="{{ route('profil.struktur-organisasi') }}" class="list-group-item list-group-item-action">
                                <i class="bi bi-diagram-3 me-2"></i> Struktur Organisasi
                            </a>
                            <a href="{{ route('profil.kontak') }}" class="list-group-item list-group-item-action">
                                <i class="bi bi-envelope me-2"></i> Kontak
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-8">
                <div class="card shadow-sm mb-4">
                    <div class="card-header bg-primary text-white">
                        <h5 class="card-title mb-0"><i class="bi bi-eye me-2"></i> Visi</h5>
                    </div>
                    <div class="card-body">
                        @if ($profil && $profil->visi)
                            <div class="p-3 bg-light rounded">
                                <blockquote class="blockquote text-center">
                                    <p class="mb-0 fs-5 fst-italic">{!! nl2br(e($profil->visi)) !!}</p>
                                </blockquote>
                            </div>
                        @else
                            <div class="alert alert-info">
                                <i class="bi bi-info-circle me-2"></i> Informasi visi kelurahan belum tersedia.
                            </div>
                        @endif
                    </div>
                </div>

                <div class="card shadow-sm">
                    <div class="card-header bg-primary text-white">
                        <h5 class="card-title mb-0"><i class="bi bi-list-check me-2"></i> Misi</h5>
                    </div>
                    <div class="card-body">
                        @if ($profil && $profil->misi)
                            <div class="fs-6">
                                {!! nl2br(e($profil->misi)) !!}
                            </div>
                        @else
                            <div class="alert alert-info">
                                <i class="bi bi-info-circle me-2"></i> Informasi misi kelurahan belum tersedia.
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-bootstrap-layout>
