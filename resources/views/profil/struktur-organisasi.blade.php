<x-bootstrap-layout>
    <div class="container py-5">
        <div class="row">
            <div class="col-12">
                <h1 class="display-5 fw-bold mb-4 text-primary">Struktur Organisasi Kelurahan Jelupang</h1>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('beranda') }}">Beranda</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('profil') }}">Profil</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Struktur Organisasi</li>
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
                            <a href="{{ route('profil.visi-misi') }}" class="list-group-item list-group-item-action">
                                <i class="bi bi-bullseye me-2"></i> Visi & Misi
                            </a>
                            <a href="{{ route('profil.struktur-organisasi') }}" class="list-group-item list-group-item-action active">
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
                    <div class="card-header bg-primary text-white">
                        <h5 class="card-title mb-0"><i class="bi bi-diagram-3 me-2"></i> Struktur Organisasi</h5>
                    </div>
                    <div class="card-body">
                        @if ($profil && $profil->struktur_organisasi)
                            <div class="row g-4">
                                @foreach($profil->struktur_organisasi as $position => $name)
                                <div class="col-md-6">
                                    <div class="card h-100 border-primary">
                                        <div class="card-header bg-primary text-white">
                                            <h5 class="card-title mb-0">{{ $position }}</h5>
                                        </div>
                                        <div class="card-body">
                                            <p class="card-text fs-5">{{ $name }}</p>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        @else
                            <div class="text-center py-4">
                                <p class="text-muted mb-4">Struktur organisasi belum tersedia.</p>

                                <!-- Contoh struktur organisasi default -->
                                <div class="row g-4 justify-content-center">
                                    <div class="col-md-8">
                                        <div class="card mb-4 border-success">
                                            <div class="card-header bg-success text-white text-center">
                                                <h5 class="card-title mb-0">Lurah</h5>
                                            </div>
                                            <div class="card-body text-center">
                                                <p class="card-text">Nama Lurah</p>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="card mb-4 border-info">
                                            <div class="card-header bg-info text-white text-center">
                                                <h5 class="card-title mb-0">Sekretaris Lurah</h5>
                                            </div>
                                            <div class="card-body text-center">
                                                <p class="card-text">Nama Sekretaris</p>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="card mb-4 border-info">
                                            <div class="card-header bg-info text-white text-center">
                                                <h5 class="card-title mb-0">Bendahara</h5>
                                            </div>
                                            <div class="card-body text-center">
                                                <p class="card-text">Nama Bendahara</p>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="card border-warning">
                                            <div class="card-header bg-warning text-dark text-center">
                                                <h5 class="card-title mb-0">Kasi Pemerintahan</h5>
                                            </div>
                                            <div class="card-body text-center">
                                                <p class="card-text">Nama Kasi</p>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="card border-warning">
                                            <div class="card-header bg-warning text-dark text-center">
                                                <h5 class="card-title mb-0">Kasi Kesra</h5>
                                            </div>
                                            <div class="card-body text-center">
                                                <p class="card-text">Nama Kasi</p>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="card border-warning">
                                            <div class="card-header bg-warning text-dark text-center">
                                                <h5 class="card-title mb-0">Kasi Pelayanan</h5>
                                            </div>
                                            <div class="card-body text-center">
                                                <p class="card-text">Nama Kasi</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="alert alert-info mt-4">
                                    <i class="bi bi-info-circle me-2"></i> Struktur organisasi di atas hanya contoh. Data sebenarnya akan ditampilkan setelah diisi oleh admin.
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-bootstrap-layout>
