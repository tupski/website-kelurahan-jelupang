<x-admin-bootstrap-layout>
    <x-slot name="header">
        <h1 class="h3 mb-0">Tambah Layanan</h1>
    </x-slot>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('admin.layanan.store') }}" method="POST">
                        @csrf
                        
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="nama" class="form-label">Nama Layanan <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama" name="nama" value="{{ old('nama') }}" required>
                                    @error('nama')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="kategori_layanan_id" class="form-label">Kategori <span class="text-danger">*</span></label>
                                    <select class="form-select @error('kategori_layanan_id') is-invalid @enderror" id="kategori_layanan_id" name="kategori_layanan_id" required>
                                        <option value="">Pilih Kategori</option>
                                        @foreach($kategori as $kat)
                                            <option value="{{ $kat->id }}" {{ old('kategori_layanan_id') == $kat->id ? 'selected' : '' }}>{{ $kat->nama }}</option>
                                        @endforeach
                                    </select>
                                    @error('kategori_layanan_id')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        
                        <div class="mb-3">
                            <label for="deskripsi" class="form-label">Deskripsi <span class="text-danger">*</span></label>
                            <textarea class="form-control @error('deskripsi') is-invalid @enderror" id="deskripsi" name="deskripsi" rows="4" required>{{ old('deskripsi') }}</textarea>
                            @error('deskripsi')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        
                        <div class="mb-3">
                            <label for="persyaratan" class="form-label">Persyaratan</label>
                            <textarea class="form-control @error('persyaratan') is-invalid @enderror" id="persyaratan" name="persyaratan" rows="4">{{ old('persyaratan') }}</textarea>
                            @error('persyaratan')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        
                        <div class="row mb-3">
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label for="jam_layanan" class="form-label">Jam Layanan</label>
                                    <input type="text" class="form-control @error('jam_layanan') is-invalid @enderror" id="jam_layanan" name="jam_layanan" value="{{ old('jam_layanan') }}" placeholder="contoh: Senin-Jumat, 08.00-16.00 WIB">
                                    @error('jam_layanan')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label for="lokasi" class="form-label">Lokasi</label>
                                    <input type="text" class="form-control @error('lokasi') is-invalid @enderror" id="lokasi" name="lokasi" value="{{ old('lokasi') }}">
                                    @error('lokasi')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label for="ikon" class="form-label">Ikon (Bootstrap Icons)</label>
                                    <div class="input-group">
                                        <span class="input-group-text"><i class="bi bi-file-earmark-text"></i></span>
                                        <input type="text" class="form-control @error('ikon') is-invalid @enderror" id="ikon" name="ikon" value="{{ old('ikon', 'bi-file-earmark-text') }}" placeholder="contoh: bi-file-earmark-text">
                                    </div>
                                    <div class="form-text">Kunjungi <a href="https://icons.getbootstrap.com/" target="_blank">Bootstrap Icons</a> untuk melihat daftar ikon</div>
                                    @error('ikon')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        
                        <div class="mb-3 form-check">
                            <input type="checkbox" class="form-check-input" id="aktif" name="aktif" {{ old('aktif') ? 'checked' : '' }}>
                            <label class="form-check-label" for="aktif">Aktif</label>
                        </div>
                        
                        <div class="d-flex justify-content-between">
                            <a href="{{ route('admin.layanan.index') }}" class="btn btn-secondary">Kembali</a>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-admin-bootstrap-layout>
