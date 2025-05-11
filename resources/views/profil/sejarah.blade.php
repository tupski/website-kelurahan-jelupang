<x-bootstrap-layout>
    <div class="container py-5">
        <div class="row">
            <div class="col-12">
                <h1 class="display-5 fw-bold mb-4 text-primary">Sejarah Kelurahan Jelupang</h1>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('beranda') }}">Beranda</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('profil') }}">Profil</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Sejarah</li>
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
                            <a href="{{ route('profil.sejarah') }}" class="list-group-item list-group-item-action active">
                                <i class="bi bi-clock-history me-2"></i> Sejarah
                            </a>
                            <a href="{{ route('profil.visi-misi') }}" class="list-group-item list-group-item-action">
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
                <div class="card shadow-sm">
                    <div class="card-header bg-light">
                        <h5 class="card-title mb-0">Sejarah Kelurahan</h5>
                    </div>
                    <div class="card-body">
                        @if ($profil && $profil->sejarah)
                            <div class="mb-4">
                                <img src="{{ asset('images/sejarah.jpg') }}" alt="Sejarah Kelurahan" class="img-fluid rounded mb-4" onerror="this.style.display='none'">

                                <div class="fs-6">
                                    {!! nl2br(e($profil->sejarah)) !!}
                                </div>
                            </div>
                        @else
                            <div class="alert alert-info">
                                <i class="bi bi-info-circle me-2"></i> Informasi sejarah kelurahan belum tersedia.
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-bootstrap-layout>
