<x-admin-bootstrap-layout>
    <x-slot name="header">
        <h1 class="h3 mb-0">Edit Berita</h1>
    </x-slot>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('admin.berita.update', $berita->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="mb-3">
                            <label for="judul" class="form-label">Judul Berita <span class="text-danger">*</span></label>
                            <input type="text" class="form-control @error('judul') is-invalid @enderror" id="judul" name="judul" value="{{ old('judul', $berita->judul) }}" required autofocus>
                            @error('judul')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="konten" class="form-label">Isi Berita <span class="text-danger">*</span></label>
                            <textarea class="form-control @error('konten') is-invalid @enderror" id="konten" name="konten" rows="10" required>{{ old('konten', $berita->konten) }}</textarea>
                            @error('konten')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="gambar" class="form-label">Gambar Berita (Opsional)</label>

                            @if($berita->gambar)
                                <div class="mb-3">
                                    <img src="{{ asset($berita->gambar) }}" alt="{{ $berita->judul }}" class="img-thumbnail" style="height: 150px;">
                                    <p class="form-text">Gambar saat ini. Unggah gambar baru untuk menggantinya.</p>
                                </div>
                            @endif

                            <input type="file" class="form-control @error('gambar') is-invalid @enderror" id="gambar" name="gambar" accept="image/*">
                            @error('gambar')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3 form-check">
                            <input type="checkbox" class="form-check-input" id="dipublikasikan" name="dipublikasikan" {{ old('dipublikasikan', $berita->dipublikasikan) ? 'checked' : '' }}>
                            <label class="form-check-label" for="dipublikasikan">Publikasikan</label>
                        </div>

                        <div class="d-flex justify-content-between">
                            <a href="{{ route('admin.berita.index') }}" class="btn btn-secondary">Kembali</a>
                            <button type="submit" class="btn btn-primary">Perbarui Berita</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    @push('scripts')
    <!-- CKEditor CDN -->
    <script src="https://cdn.ckeditor.com/ckeditor5/40.0.0/classic/ckeditor.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            ClassicEditor
                .create(document.querySelector('#konten'), {
                    toolbar: ['heading', '|', 'bold', 'italic', 'link', 'bulletedList', 'numberedList', '|', 'outdent', 'indent', '|', 'blockQuote', 'insertTable', 'mediaEmbed', 'undo', 'redo'],
                    heading: {
                        options: [
                            { model: 'paragraph', title: 'Paragraf', class: 'ck-heading_paragraph' },
                            { model: 'heading1', view: 'h1', title: 'Heading 1', class: 'ck-heading_heading1' },
                            { model: 'heading2', view: 'h2', title: 'Heading 2', class: 'ck-heading_heading2' },
                            { model: 'heading3', view: 'h3', title: 'Heading 3', class: 'ck-heading_heading3' }
                        ]
                    }
                })
                .then(editor => {
                    console.log('CKEditor initialized successfully');
                })
                .catch(error => {
                    console.error('Error initializing CKEditor:', error);
                });
        });
    </script>
    <style>
        .ck-editor__editable_inline {
            min-height: 300px;
        }
    </style>
    @endpush
</x-admin-bootstrap-layout>
