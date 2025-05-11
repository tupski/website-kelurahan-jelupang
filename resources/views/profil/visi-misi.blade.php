<x-bootstrap-layout>
    @push('styles')
        @include('profil.partials.styles')
    @endpush

    @include('profil.partials.hero', [
        'title' => 'Visi & Misi Kelurahan Jelupang',
        'subtitle' => 'Tujuan dan langkah strategis untuk membangun Kelurahan Jelupang yang lebih baik'
    ])

    <div class="container py-5">
        <div class="row">
            <div class="col-12">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('beranda') }}">Beranda</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('profil') }}">Profil</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Visi & Misi</li>
                    </ol>
                </nav>
            </div>
        </div>

        <div class="row g-4">
            <div class="col-lg-3">
                @include('profil.partials.sidebar')
            </div>

            <div class="col-lg-9">
                <div class="card shadow-sm mb-4">
                    <div class="card-header bg-primary text-white">
                        <h5 class="card-title mb-0"><i class="bi bi-eye me-2"></i> Visi</h5>
                    </div>
                    <div class="card-body">
                        @if ($profil && $profil->visi)
                            <div class="p-4 bg-light rounded shadow-sm">
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
                                {!! $profil->misi !!}
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
