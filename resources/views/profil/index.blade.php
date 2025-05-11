<x-bootstrap-layout>
    <div class="container py-5">
        <div class="row">
            <div class="col-12">
                <h1 class="display-5 fw-bold mb-4 text-primary">Profil Kelurahan Jelupang</h1>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('beranda') }}">Beranda</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Profil</li>
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
                            <a href="{{ route('profil') }}" class="list-group-item list-group-item-action active">
                                <i class="bi bi-info-circle me-2"></i> Profil Umum
                            </a>
                            <a href="{{ route('profil.sejarah') }}" class="list-group-item list-group-item-action">
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

                @if ($profil && $profil->logo)
                <div class="card shadow-sm text-center">
                    <div class="card-body">
                        <img src="{{ asset($profil->logo) }}" alt="Logo Kelurahan" class="img-fluid" style="max-height: 150px;">
                    </div>
                </div>
                @endif
            </div>

            <div class="col-lg-8">
                <div class="card shadow-sm">
                    <div class="card-header bg-light">
                        <h5 class="card-title mb-0">Informasi Umum</h5>
                    </div>
                    <div class="card-body">
                        @if ($profil)
                            <div class="row g-3 mb-4">
                                <div class="col-md-6">
                                    <div class="border-start border-primary border-3 ps-3">
                                        <h6 class="text-muted">Nama Kelurahan</h6>
                                        <p class="fs-5">{{ $profil->nama_kelurahan ?? 'Kelurahan Jelupang' }}</p>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="border-start border-primary border-3 ps-3">
                                        <h6 class="text-muted">Kecamatan</h6>
                                        <p class="fs-5">{{ $profil->kecamatan ?? '-' }}</p>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="border-start border-primary border-3 ps-3">
                                        <h6 class="text-muted">Kabupaten/Kota</h6>
                                        <p class="fs-5">{{ $profil->kabupaten_kota ?? '-' }}</p>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="border-start border-primary border-3 ps-3">
                                        <h6 class="text-muted">Provinsi</h6>
                                        <p class="fs-5">{{ $profil->provinsi ?? '-' }}</p>
                                    </div>
                                </div>

                                @if ($profil->kode_pos)
                                <div class="col-md-6">
                                    <div class="border-start border-primary border-3 ps-3">
                                        <h6 class="text-muted">Kode Pos</h6>
                                        <p class="fs-5">{{ $profil->kode_pos }}</p>
                                    </div>
                                </div>
                                @endif

                                @if ($profil->alamat)
                                <div class="col-md-6">
                                    <div class="border-start border-primary border-3 ps-3">
                                        <h6 class="text-muted">Alamat</h6>
                                        <p class="fs-5">{{ $profil->alamat }}</p>
                                    </div>
                                </div>
                                @endif
                            </div>

                            <div class="card bg-light mb-4">
                                <div class="card-body">
                                    <h5 class="card-title">Tentang Kelurahan Jelupang</h5>
                                    <p class="card-text">
                                        {{ $profil->sejarah ? Str::limit($profil->sejarah, 300) : 'Informasi belum tersedia.' }}
                                        @if ($profil->sejarah && strlen($profil->sejarah) > 300)
                                            <a href="{{ route('profil.sejarah') }}" class="text-primary">Baca selengkapnya</a>
                                        @endif
                                    </p>
                                </div>
                            </div>
                        @else
                            <div class="alert alert-info">
                                <i class="bi bi-info-circle me-2"></i> Informasi profil belum tersedia.
                            </div>
                        @endif

                        <div class="text-end mt-4">
                            <a href="{{ route('profil.kontak') }}" class="btn btn-primary">
                                <i class="bi bi-envelope me-2"></i> Hubungi Kami
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-bootstrap-layout>
