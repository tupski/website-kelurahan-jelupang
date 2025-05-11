<div class="card shadow-sm mb-4">
    <div class="card-header bg-primary text-white">
        <h5 class="card-title mb-0"><i class="bi bi-list-ul me-2"></i>Menu Profil</h5>
    </div>
    <div class="card-body p-0">
        <div class="list-group list-group-flush rounded-0">
            <a href="{{ route('profil') }}" class="list-group-item list-group-item-action {{ request()->routeIs('profil') && !request()->routeIs('profil.*') ? 'active' : '' }}">
                <i class="bi bi-info-circle me-2"></i> Profil Umum
            </a>
            <a href="{{ route('profil.sejarah') }}" class="list-group-item list-group-item-action {{ request()->routeIs('profil.sejarah') ? 'active' : '' }}">
                <i class="bi bi-clock-history me-2"></i> Sejarah
            </a>
            <a href="{{ route('profil.visi-misi') }}" class="list-group-item list-group-item-action {{ request()->routeIs('profil.visi-misi') ? 'active' : '' }}">
                <i class="bi bi-bullseye me-2"></i> Visi & Misi
            </a>
            <a href="{{ route('profil.struktur-organisasi') }}" class="list-group-item list-group-item-action {{ request()->routeIs('profil.struktur-organisasi') ? 'active' : '' }}">
                <i class="bi bi-diagram-3 me-2"></i> Struktur Organisasi
            </a>
            <a href="{{ route('profil.kontak') }}" class="list-group-item list-group-item-action {{ request()->routeIs('profil.kontak') ? 'active' : '' }}">
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
        <img src="{{ asset($profil->logo) }}" alt="Logo Kelurahan" class="img-fluid" style="max-height: 150px;" onerror="this.src='https://placehold.co/300x150/00A67C/FFFFFF?text=Logo+Kelurahan'">
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
