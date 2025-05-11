<x-admin-bootstrap-layout>
    <x-slot name="header">
        <h1 class="h3 mb-0">Tambah UMKM</h1>
    </x-slot>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('admin.umkm.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="nama" class="form-label">Nama UMKM <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama" name="nama" value="{{ old('nama') }}" required>
                                    @error('nama')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="kategori_umkm_id" class="form-label">Kategori <span class="text-danger">*</span></label>
                                    <select class="form-select @error('kategori_umkm_id') is-invalid @enderror" id="kategori_umkm_id" name="kategori_umkm_id" required>
                                        <option value="">Pilih Kategori</option>
                                        @foreach($kategori as $kat)
                                            <option value="{{ $kat->id }}" {{ old('kategori_umkm_id') == $kat->id ? 'selected' : '' }}>{{ $kat->nama }}</option>
                                        @endforeach
                                    </select>
                                    @error('kategori_umkm_id')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="nama_pemilik" class="form-label">Nama Pemilik <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control @error('nama_pemilik') is-invalid @enderror" id="nama_pemilik" name="nama_pemilik" value="{{ old('nama_pemilik') }}" required>
                                    @error('nama_pemilik')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="alamat" class="form-label">Alamat <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control @error('alamat') is-invalid @enderror" id="alamat" name="alamat" value="{{ old('alamat') }}" required>
                                    @error('alamat')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="telepon" class="form-label">Telepon</label>
                                    <input type="text" class="form-control @error('telepon') is-invalid @enderror" id="telepon" name="telepon" value="{{ old('telepon') }}">
                                    @error('telepon')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email') }}">
                                    @error('email')
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
                            <label for="gambar" class="form-label">Gambar</label>
                            <input type="file" class="form-control @error('gambar') is-invalid @enderror" id="gambar" name="gambar">
                            <div class="form-text">Format: JPG, PNG, GIF. Maks: 2MB</div>
                            @error('gambar')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        
                        <div class="mb-3 form-check">
                            <input type="checkbox" class="form-check-input" id="aktif" name="aktif" {{ old('aktif') ? 'checked' : '' }}>
                            <label class="form-check-label" for="aktif">Aktif</label>
                        </div>
                        
                        <div class="d-flex justify-content-between">
                            <a href="{{ route('admin.umkm.index') }}" class="btn btn-secondary">Kembali</a>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-admin-bootstrap-layout>
