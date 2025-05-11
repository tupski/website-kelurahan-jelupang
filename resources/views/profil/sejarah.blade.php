<x-bootstrap-layout>
    @push('styles')
        @include('profil.partials.styles')
    @endpush

    @include('profil.partials.hero', [
        'title' => 'Sejarah Kelurahan Jelupang',
        'subtitle' => 'Perjalanan dan perkembangan Kelurahan Jelupang dari masa ke masa'
    ])

    <div class="container py-5">
        <div class="row">
            <div class="col-12">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('beranda') }}">Beranda</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('profil') }}">Profil</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Sejarah</li>
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
                        <h5 class="card-title mb-0"><i class="bi bi-clock-history me-2"></i> Sejarah Kelurahan</h5>
                    </div>
                    <div class="card-body">
                        @if ($profil && $profil->sejarah)
                            <div class="mb-4">
                                <div class="row">
                                    <div class="col-md-4 mb-4 mb-md-0">
                                        <img src="{{ asset('images/sejarah.jpg') }}" alt="Sejarah Kelurahan" class="img-fluid rounded shadow-sm" onerror="this.src='https://placehold.co/600x400/00A67C/FFFFFF?text=Sejarah+Kelurahan'">
                                    </div>
                                    <div class="col-md-8">
                                        <div class="fs-6">
                                            {!! nl2br(e($profil->sejarah)) !!}
                                        </div>
                                    </div>
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
