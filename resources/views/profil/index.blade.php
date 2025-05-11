<x-bootstrap-layout>
    @push('styles')
        @include('profil.partials.styles')
    @endpush

    @include('profil.partials.hero', [
        'title' => 'Profil Kelurahan Jelupang',
        'subtitle' => 'Informasi umum dan sejarah Kelurahan Jelupang'
    ])

    <div class="container py-5">
        <div class="row">
            <div class="col-12">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('beranda') }}">Beranda</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Profil</li>
                    </ol>
                </nav>
            </div>
        </div>

        <div class="row g-4">
            <div class="col-lg-3">
                <div class="card shadow-sm mb-4">
                    <div class="card-header bg-primary text-white">
                        <h5 class="card-title mb-0"><i class="bi bi-list-ul me-2"></i>Menu Profil</h5>
                    </div>
                    <div class="card-body p-0">
                        <div class="list-group list-group-flush rounded-0">
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
                <div class="card shadow-sm mb-4 text-center">
                    <div class="card-header bg-primary text-white">
                        <h5 class="card-title mb-0"><i class="bi bi-building me-2"></i>Logo Kelurahan</h5>
                    </div>
                    <div class="card-body">
                        <img src="{{ asset($profil->logo) }}" alt="Logo Kelurahan" class="img-fluid" style="max-height: 150px;">
                    </div>
                </div>
                @endif

                <div class="card shadow-sm d-none d-lg-block">
                    <div class="card-header bg-primary text-white">
                        <h5 class="card-title mb-0"><i class="bi bi-info-circle me-2"></i>Informasi</h5>
                    </div>
                    <div class="card-body">
                        <p class="card-text">Kelurahan Jelupang merupakan salah satu kelurahan di Kecamatan Serpong Utara, Kota Tangerang Selatan, Provinsi Banten.</p>
                        <p class="card-text mb-0">Untuk informasi lebih lanjut, silakan hubungi kantor kelurahan.</p>
                    </div>
                </div>
            </div>

            <div class="col-lg-9">
                <div class="card shadow-sm mb-4">
                    <div class="card-header bg-primary text-white">
                        <h5 class="card-title mb-0"><i class="bi bi-info-circle me-2"></i>Informasi Umum</h5>
                    </div>
                    <div class="card-body">
                        @if ($profil)
                            <div class="row g-4 mb-4">
                                <div class="col-md-6">
                                    <div class="card h-100 border-primary border-top-0 border-end-0 border-bottom-0 border-3 shadow-sm">
                                        <div class="card-body">
                                            <h6 class="text-primary fw-bold">Nama Kelurahan</h6>
                                            <p class="fs-5 mb-0">{{ $profil->nama_kelurahan ?? 'Kelurahan Jelupang' }}</p>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="card h-100 border-primary border-top-0 border-end-0 border-bottom-0 border-3 shadow-sm">
                                        <div class="card-body">
                                            <h6 class="text-primary fw-bold">Kecamatan</h6>
                                            <p class="fs-5 mb-0">{{ $profil->kecamatan ?? 'Serpong Utara' }}</p>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="card h-100 border-primary border-top-0 border-end-0 border-bottom-0 border-3 shadow-sm">
                                        <div class="card-body">
                                            <h6 class="text-primary fw-bold">Kabupaten/Kota</h6>
                                            <p class="fs-5 mb-0">{{ $profil->kabupaten_kota ?? 'Kota Tangerang Selatan' }}</p>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="card h-100 border-primary border-top-0 border-end-0 border-bottom-0 border-3 shadow-sm">
                                        <div class="card-body">
                                            <h6 class="text-primary fw-bold">Provinsi</h6>
                                            <p class="fs-5 mb-0">{{ $profil->provinsi ?? 'Banten' }}</p>
                                        </div>
                                    </div>
                                </div>

                                @if ($profil->kode_pos)
                                <div class="col-md-6">
                                    <div class="card h-100 border-primary border-top-0 border-end-0 border-bottom-0 border-3 shadow-sm">
                                        <div class="card-body">
                                            <h6 class="text-primary fw-bold">Kode Pos</h6>
                                            <p class="fs-5 mb-0">{{ $profil->kode_pos }}</p>
                                        </div>
                                    </div>
                                </div>
                                @endif

                                @if ($profil->alamat)
                                <div class="col-md-6">
                                    <div class="card h-100 border-primary border-top-0 border-end-0 border-bottom-0 border-3 shadow-sm">
                                        <div class="card-body">
                                            <h6 class="text-primary fw-bold">Alamat</h6>
                                            <p class="fs-5 mb-0">{{ $profil->alamat }}</p>
                                        </div>
                                    </div>
                                </div>
                                @endif
                            </div>
                        @else
                            <div class="alert alert-info">
                                <i class="bi bi-info-circle me-2"></i> Informasi profil belum tersedia.
                            </div>
                        @endif
                    </div>
                </div>

                <div class="card shadow-sm mb-4">
                    <div class="card-header bg-primary text-white">
                        <h5 class="card-title mb-0"><i class="bi bi-file-text me-2"></i>Tentang Kelurahan Jelupang</h5>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-4 mb-4 mb-md-0">
                                <img src="{{ asset('images/kelurahan.jpg') }}" alt="Kelurahan Jelupang" class="img-fluid rounded shadow-sm" onerror="this.src='https://placehold.co/600x400/00A67C/FFFFFF?text=Kelurahan+Jelupang'">
                            </div>
                            <div class="col-md-8">
                                <p class="card-text">
                                    @if ($profil && $profil->sejarah)
                                        {{ Str::limit($profil->sejarah, 500) }}
                                    @else
                                        Kelurahan Jelupang merupakan salah satu kelurahan yang berada di Kecamatan Serpong Utara, Kota Tangerang Selatan, Provinsi Banten. Kelurahan ini memiliki luas wilayah sekitar 5,67 km² dengan jumlah penduduk sekitar 12.345 jiwa. Kelurahan Jelupang terdiri dari 9 RW dan 45 RT.
                                    @endif
                                </p>
                                <p class="card-text">
                                    Kelurahan Jelupang memiliki berbagai potensi, baik dari segi sumber daya alam maupun sumber daya manusia. Berbagai UMKM tumbuh dan berkembang di wilayah ini, menjadikan Kelurahan Jelupang sebagai salah satu pusat ekonomi mikro di Kota Tangerang Selatan.
                                </p>
                                @if ($profil && $profil->sejarah && strlen($profil->sejarah) > 500)
                                    <a href="{{ route('profil.sejarah') }}" class="btn btn-primary mt-3">
                                        <i class="bi bi-book me-2"></i> Baca Selengkapnya
                                    </a>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card shadow-sm">
                    <div class="card-header bg-primary text-white">
                        <h5 class="card-title mb-0"><i class="bi bi-geo-alt me-2"></i>Lokasi</h5>
                    </div>
                    <div class="card-body">
                        <div class="ratio ratio-16x9 mb-4">
                            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3965.7331455606383!2d106.6735!3d-6.2935!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2zNsKwMTcnMzYuNiJTIDEwNsKwNDAnMjQuNiJF!5e0!3m2!1sid!2sid!4v1620000000000!5m2!1sid!2sid"
                                style="border:0;" allowfullscreen="" loading="lazy" class="rounded shadow-sm"></iframe>
                        </div>

                        <div class="text-end">
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
