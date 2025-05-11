<x-bootstrap-layout>
    <div class="container py-5">
        <div class="row">
            <div class="col-12">
                <h1 class="display-5 fw-bold mb-4 text-primary">Kontak Kelurahan Jelupang</h1>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('beranda') }}">Beranda</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('profil') }}">Profil</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Kontak</li>
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
                            <a href="{{ route('profil.struktur-organisasi') }}" class="list-group-item list-group-item-action">
                                <i class="bi bi-diagram-3 me-2"></i> Struktur Organisasi
                            </a>
                            <a href="{{ route('profil.kontak') }}" class="list-group-item list-group-item-action active">
                                <i class="bi bi-envelope me-2"></i> Kontak
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-8">
                <div class="card shadow-sm mb-4">
                    <div class="card-header bg-primary text-white">
                        <h5 class="card-title mb-0"><i class="bi bi-info-circle me-2"></i> Informasi Kontak</h5>
                    </div>
                    <div class="card-body">
                        <div class="row g-4">
                            <div class="col-md-6">
                                <div class="d-flex">
                                    <div class="flex-shrink-0">
                                        <div class="bg-primary bg-opacity-10 p-3 rounded-circle text-primary">
                                            <i class="bi bi-geo-alt fs-4"></i>
                                        </div>
                                    </div>
                                    <div class="flex-grow-1 ms-3">
                                        <h5 class="fw-bold">Alamat</h5>
                                        <p>{{ $profil->alamat ?? 'Jl. Raya Jelupang No. 123, Serpong Utara, Tangerang Selatan, Banten 15310' }}</p>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="d-flex">
                                    <div class="flex-shrink-0">
                                        <div class="bg-primary bg-opacity-10 p-3 rounded-circle text-primary">
                                            <i class="bi bi-telephone fs-4"></i>
                                        </div>
                                    </div>
                                    <div class="flex-grow-1 ms-3">
                                        <h5 class="fw-bold">Telepon</h5>
                                        <p>{{ $profil->telepon ?? '(021) 1234-5678' }}</p>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="d-flex">
                                    <div class="flex-shrink-0">
                                        <div class="bg-primary bg-opacity-10 p-3 rounded-circle text-primary">
                                            <i class="bi bi-envelope fs-4"></i>
                                        </div>
                                    </div>
                                    <div class="flex-grow-1 ms-3">
                                        <h5 class="fw-bold">Email</h5>
                                        <p>{{ $profil->email ?? 'info@kelurahanjelupang.go.id' }}</p>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="d-flex">
                                    <div class="flex-shrink-0">
                                        <div class="bg-primary bg-opacity-10 p-3 rounded-circle text-primary">
                                            <i class="bi bi-clock fs-4"></i>
                                        </div>
                                    </div>
                                    <div class="flex-grow-1 ms-3">
                                        <h5 class="fw-bold">Jam Kerja</h5>
                                        <p class="mb-1">Senin - Jumat: 08.00 - 16.00 WIB</p>
                                        <p class="mb-0">Sabtu, Minggu & Hari Libur: Tutup</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card shadow-sm">
                    <div class="card-header bg-primary text-white">
                        <h5 class="card-title mb-0"><i class="bi bi-geo-alt me-2"></i> Lokasi</h5>
                    </div>
                    <div class="card-body">
                        <div class="ratio ratio-16x9 mb-4">
                            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3965.7331455606383!2d106.6735!3d-6.2935!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2zNsKwMTcnMzYuNiJTIDEwNsKwNDAnMjQuNiJF!5e0!3m2!1sid!2sid!4v1620000000000!5m2!1sid!2sid"
                                style="border:0;" allowfullscreen="" loading="lazy" class="rounded"></iframe>
                        </div>

                        <div class="alert alert-info">
                            <i class="bi bi-info-circle me-2"></i> Kelurahan Jelupang terletak di wilayah Kecamatan Serpong Utara, Kota Tangerang Selatan, Provinsi Banten.
                        </div>

                        <div class="mt-4">
                            <h5 class="fw-bold mb-3">Hubungi Kami</h5>
                            <form>
                                <div class="row g-3">
                                    <div class="col-md-6">
                                        <div class="form-floating mb-3">
                                            <input type="text" class="form-control" id="nama" placeholder="Nama Lengkap">
                                            <label for="nama">Nama Lengkap</label>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-floating mb-3">
                                            <input type="email" class="form-control" id="email" placeholder="Email">
                                            <label for="email">Email</label>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-floating mb-3">
                                            <input type="text" class="form-control" id="subjek" placeholder="Subjek">
                                            <label for="subjek">Subjek</label>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-floating mb-3">
                                            <textarea class="form-control" id="pesan" style="height: 150px" placeholder="Pesan"></textarea>
                                            <label for="pesan">Pesan</label>
                                        </div>
                                    </div>
                                    <div class="col-12 text-end">
                                        <button type="submit" class="btn btn-primary">
                                            <i class="bi bi-send me-2"></i> Kirim Pesan
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-bootstrap-layout>
