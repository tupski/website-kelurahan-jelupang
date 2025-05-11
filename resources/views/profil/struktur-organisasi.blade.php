<x-bootstrap-layout>
    @push('styles')
        @include('profil.partials.styles')
    @endpush

    @include('profil.partials.hero', [
        'title' => 'Struktur Organisasi Kelurahan Jelupang',
        'subtitle' => 'Susunan organisasi dan pejabat di Kelurahan Jelupang'
    ])

    <div class="container py-5">
        <div class="row">
            <div class="col-12">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('beranda') }}">Beranda</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('profil') }}">Profil</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Struktur Organisasi</li>
                    </ol>
                </nav>
            </div>
        </div>

        <div class="row g-4">
            <div class="col-lg-3">
                @include('profil.partials.sidebar')
            </div>

            <div class="col-lg-9">
                <div class="card shadow-sm">
                    <div class="card-header bg-primary text-white">
                        <h5 class="card-title mb-0"><i class="bi bi-diagram-3 me-2"></i> Struktur Organisasi</h5>
                    </div>
                    <div class="card-body">
                        @if ($profil && $profil->struktur_organisasi)
                            <div class="row g-4">
                                @foreach(json_decode($profil->struktur_organisasi) as $struktur)
                                <div class="col-md-6">
                                    <div class="card h-100 border-primary border-top-0 border-end-0 border-bottom-0 border-3 shadow-sm">
                                        <div class="card-header bg-primary text-white">
                                            <h5 class="card-title mb-0">{{ $struktur->jabatan }}</h5>
                                        </div>
                                        <div class="card-body d-flex align-items-center">
                                            @if(isset($struktur->foto))
                                            <div class="me-3">
                                                <img src="{{ asset($struktur->foto) }}" alt="{{ $struktur->nama }}" class="rounded-circle shadow-sm" width="80" height="80" onerror="this.src='https://placehold.co/80x80/00A67C/FFFFFF?text={{ substr($struktur->nama, 0, 1) }}'">
                                            </div>
                                            @endif
                                            <p class="card-text fs-5 mb-0">{{ $struktur->nama }}</p>
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
                                        <div class="card mb-4 border-primary border-top-0 border-end-0 border-bottom-0 border-3 shadow-sm">
                                            <div class="card-header bg-primary text-white text-center">
                                                <h5 class="card-title mb-0">Lurah</h5>
                                            </div>
                                            <div class="card-body text-center">
                                                <p class="card-text">Nama Lurah</p>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="card mb-4 border-primary border-top-0 border-end-0 border-bottom-0 border-3 shadow-sm">
                                            <div class="card-header bg-primary text-white text-center">
                                                <h5 class="card-title mb-0">Sekretaris Lurah</h5>
                                            </div>
                                            <div class="card-body text-center">
                                                <p class="card-text">Nama Sekretaris</p>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="card mb-4 border-primary border-top-0 border-end-0 border-bottom-0 border-3 shadow-sm">
                                            <div class="card-header bg-primary text-white text-center">
                                                <h5 class="card-title mb-0">Bendahara</h5>
                                            </div>
                                            <div class="card-body text-center">
                                                <p class="card-text">Nama Bendahara</p>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="card border-primary border-top-0 border-end-0 border-bottom-0 border-3 shadow-sm">
                                            <div class="card-header bg-primary text-white text-center">
                                                <h5 class="card-title mb-0">Kasi Pemerintahan</h5>
                                            </div>
                                            <div class="card-body text-center">
                                                <p class="card-text">Nama Kasi</p>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="card border-primary border-top-0 border-end-0 border-bottom-0 border-3 shadow-sm">
                                            <div class="card-header bg-primary text-white text-center">
                                                <h5 class="card-title mb-0">Kasi Kesra</h5>
                                            </div>
                                            <div class="card-body text-center">
                                                <p class="card-text">Nama Kasi</p>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="card border-primary border-top-0 border-end-0 border-bottom-0 border-3 shadow-sm">
                                            <div class="card-header bg-primary text-white text-center">
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
