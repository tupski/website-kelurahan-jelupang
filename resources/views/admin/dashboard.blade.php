<x-admin-bootstrap-layout>
    <x-slot name="header">
        <h1 class="h3 mb-0">Dashboard Admin</h1>
    </x-slot>

    <div class="row">
        <div class="col-12 mb-4">
            <div class="card">
                <div class="card-body">
                    <h2 class="card-title fs-3 mb-4">Selamat Datang di Panel Admin Kelurahan Jelupang</h2>

                    <div class="row g-4">
                        <div class="col-md-6 col-lg-4">
                            <div class="card h-100 border-0 shadow-sm" style="background-color: #e6f2ff;">
                                <div class="card-body">
                                    <div class="d-flex align-items-center mb-3">
                                        <i class="bi bi-newspaper fs-1 text-primary me-3"></i>
                                        <h3 class="card-title fs-4 mb-0 text-primary">Kelola Berita</h3>
                                    </div>
                                    <p class="card-text mb-4">Tambah, edit, dan hapus berita kelurahan.</p>
                                    <a href="{{ route('admin.berita.index') }}" class="btn btn-primary">Kelola Berita</a>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6 col-lg-4">
                            <div class="card h-100 border-0 shadow-sm" style="background-color: #e6fff2;">
                                <div class="card-body">
                                    <div class="d-flex align-items-center mb-3">
                                        <i class="bi bi-shop fs-1 text-success me-3"></i>
                                        <h3 class="card-title fs-4 mb-0 text-success">Kelola UMKM</h3>
                                    </div>
                                    <p class="card-text mb-4">Kelola data UMKM di kelurahan.</p>
                                    <a href="{{ route('admin.umkm.index') }}" class="btn btn-success">Kelola UMKM</a>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6 col-lg-4">
                            <div class="card h-100 border-0 shadow-sm" style="background-color: #fff9e6;">
                                <div class="card-body">
                                    <div class="d-flex align-items-center mb-3">
                                        <i class="bi bi-file-earmark-text fs-1 text-warning me-3"></i>
                                        <h3 class="card-title fs-4 mb-0 text-warning">Kelola Layanan</h3>
                                    </div>
                                    <p class="card-text mb-4">Kelola informasi layanan kelurahan.</p>
                                    <a href="{{ route('admin.layanan.index') }}" class="btn btn-warning text-dark">Kelola Layanan</a>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6 col-lg-4">
                            <div class="card h-100 border-0 shadow-sm" style="background-color: #f2e6ff;">
                                <div class="card-body">
                                    <div class="d-flex align-items-center mb-3">
                                        <i class="bi bi-bar-chart fs-1 text-purple me-3" style="color: #6f42c1;"></i>
                                        <h3 class="card-title fs-4 mb-0" style="color: #6f42c1;">Kelola Statistik</h3>
                                    </div>
                                    <p class="card-text mb-4">Kelola data statistik kelurahan.</p>
                                    <a href="{{ route('admin.statistik.index') }}" class="btn btn-primary" style="background-color: #6f42c1; border-color: #6f42c1;">Kelola Statistik</a>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6 col-lg-4">
                            <div class="card h-100 border-0 shadow-sm" style="background-color: #ffe6e6;">
                                <div class="card-body">
                                    <div class="d-flex align-items-center mb-3">
                                        <i class="bi bi-building fs-1 text-danger me-3"></i>
                                        <h3 class="card-title fs-4 mb-0 text-danger">Kelola Profil</h3>
                                    </div>
                                    <p class="card-text mb-4">Edit informasi profil kelurahan.</p>
                                    <a href="{{ route('admin.profil.edit') }}" class="btn btn-danger">Edit Profil</a>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6 col-lg-4">
                            <div class="card h-100 border-0 shadow-sm" style="background-color: #e6e6ff;">
                                <div class="card-body">
                                    <div class="d-flex align-items-center mb-3">
                                        <i class="bi bi-gear fs-1 text-indigo me-3" style="color: #6610f2;"></i>
                                        <h3 class="card-title fs-4 mb-0" style="color: #6610f2;">Pengaturan Website</h3>
                                    </div>
                                    <p class="card-text mb-4">Kelola pengaturan website, logo, dan menu.</p>
                                    <a href="{{ route('admin.pengaturan.index') }}" class="btn btn-primary" style="background-color: #6610f2; border-color: #6610f2;">Pengaturan</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-admin-bootstrap-layout>
