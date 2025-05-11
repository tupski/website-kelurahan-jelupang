<x-admin-bootstrap-layout>
    <x-slot name="header">
        <h1 class="h3 mb-0">Tambah Berita Baru</h1>
    </x-slot>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('admin.berita.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="mb-3">
                            <label for="judul" class="form-label">Judul Berita <span class="text-danger">*</span></label>
                            <input type="text" class="form-control @error('judul') is-invalid @enderror" id="judul" name="judul" value="{{ old('judul') }}" required autofocus>
                            @error('judul')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="konten" class="form-label">Isi Berita <span class="text-danger">*</span></label>
                            <textarea class="form-control @error('konten') is-invalid @enderror" id="konten" name="konten" rows="10" required>{{ old('konten') }}</textarea>
                            @error('konten')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="gambar" class="form-label">Gambar Berita (Opsional)</label>
                            <input type="file" class="form-control @error('gambar') is-invalid @enderror" id="gambar" name="gambar" accept="image/*">
                            <div class="form-text">Format: JPG, PNG, GIF. Maks: 2MB</div>
                            @error('gambar')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3 form-check">
                            <input type="checkbox" class="form-check-input" id="dipublikasikan" name="dipublikasikan" {{ old('dipublikasikan', true) ? 'checked' : '' }}>
                            <label class="form-check-label" for="dipublikasikan">Publikasikan sekarang</label>
                        </div>

                        <div class="d-flex justify-content-between">
                            <a href="{{ route('admin.berita.index') }}" class="btn btn-secondary">Kembali</a>
                            <button type="submit" class="btn btn-primary">Simpan Berita</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    @push('scripts')
    <script>
        // Inisialisasi editor WYSIWYG jika diperlukan
        document.addEventListener('DOMContentLoaded', function() {
            // Tambahkan kode inisialisasi editor di sini jika diperlukan
        });
    </script>
    @endpush
</x-admin-bootstrap-layout>
