<x-admin-bootstrap-layout>
    <x-slot name="header">
        <h1 class="h3 mb-0">Edit Statistik</h1>
    </x-slot>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('admin.statistik.update', $statistik->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="judul" class="form-label">Judul Statistik <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control @error('judul') is-invalid @enderror" id="judul" name="judul" value="{{ old('judul', $statistik->judul) }}" required>
                                    @error('judul')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="kategori_statistik_id" class="form-label">Kategori <span class="text-danger">*</span></label>
                                    <select class="form-select @error('kategori_statistik_id') is-invalid @enderror" id="kategori_statistik_id" name="kategori_statistik_id" required>
                                        <option value="">Pilih Kategori</option>
                                        @foreach($kategori as $kat)
                                            <option value="{{ $kat->id }}" {{ old('kategori_statistik_id', $statistik->kategori_statistik_id) == $kat->id ? 'selected' : '' }}>{{ $kat->nama }}</option>
                                        @endforeach
                                    </select>
                                    @error('kategori_statistik_id')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        
                        <div class="row mb-3">
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label for="nilai" class="form-label">Nilai <span class="text-danger">*</span></label>
                                    <input type="number" step="0.01" class="form-control @error('nilai') is-invalid @enderror" id="nilai" name="nilai" value="{{ old('nilai', $statistik->nilai) }}" required>
                                    @error('nilai')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label for="satuan" class="form-label">Satuan</label>
                                    <input type="text" class="form-control @error('satuan') is-invalid @enderror" id="satuan" name="satuan" value="{{ old('satuan', $statistik->satuan) }}" placeholder="contoh: orang, kg, %">
                                    @error('satuan')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label for="tahun" class="form-label">Tahun <span class="text-danger">*</span></label>
                                    <input type="number" class="form-control @error('tahun') is-invalid @enderror" id="tahun" name="tahun" value="{{ old('tahun', $statistik->tahun) }}" min="2000" max="{{ date('Y') + 1 }}" required>
                                    @error('tahun')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        
                        <div class="mb-3">
                            <label for="deskripsi" class="form-label">Deskripsi</label>
                            <textarea class="form-control @error('deskripsi') is-invalid @enderror" id="deskripsi" name="deskripsi" rows="4">{{ old('deskripsi', $statistik->deskripsi) }}</textarea>
                            @error('deskripsi')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        
                        <div class="d-flex justify-content-between">
                            <a href="{{ route('admin.statistik.index') }}" class="btn btn-secondary">Kembali</a>
                            <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-admin-bootstrap-layout>
