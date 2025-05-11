<x-admin-bootstrap-layout>
    <x-slot name="header">
        <h1 class="h3 mb-0">Pengaturan Website</h1>
    </x-slot>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h2 class="card-title fs-4 mb-4">Kelola Pengaturan Website</h2>

                    @if(session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif

                    @if(session('error'))
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            {{ session('error') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif

                    <ul class="nav nav-tabs mb-4">
                        @foreach($grupPengaturan as $g)
                            <li class="nav-item">
                                <a href="{{ route('admin.pengaturan.index', ['grup' => $g]) }}"
                                   class="nav-link {{ $grup == $g ? 'active' : '' }}">
                                    {{ ucfirst($g) }}
                                </a>
                            </li>
                        @endforeach
                    </ul>

                    <form action="{{ route('admin.pengaturan.update') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="grup" value="{{ $grup }}">

                        <div class="row g-4">
                            @foreach($pengaturan as $item)
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="{{ $item->kunci }}" class="form-label">
                                            {{ $item->label }}
                                        </label>

                                        @if($item->tipe == 'text')
                                            <input type="text" name="{{ $item->kunci }}" id="{{ $item->kunci }}"
                                                   value="{{ $item->nilai }}"
                                                   class="form-control">

                                        @elseif($item->tipe == 'textarea')
                                            <textarea name="{{ $item->kunci }}" id="{{ $item->kunci }}" rows="3"
                                                      class="form-control">{{ $item->nilai }}</textarea>

                                        @elseif($item->tipe == 'image')
                                            @if($item->nilai)
                                                <div class="mb-2">
                                                    <img src="{{ asset($item->nilai) }}" alt="{{ $item->label }}" class="img-thumbnail" style="height: 100px;">
                                                </div>
                                            @endif
                                            <input type="file" name="{{ $item->kunci }}" id="{{ $item->kunci }}"
                                                   class="form-control" accept="image/png, image/jpeg, image/jpg, image/gif, image/svg+xml, image/x-icon">
                                            <div class="form-text">
                                                Format: JPG, PNG, GIF, SVG, ICO. Biarkan kosong jika tidak ingin mengubah gambar.
                                            </div>

                                        @elseif($item->tipe == 'color')
                                            <div class="input-group">
                                                <input type="color" name="{{ $item->kunci }}" id="{{ $item->kunci }}"
                                                       value="{{ $item->nilai }}"
                                                       class="form-control form-control-color">
                                                <input type="text" value="{{ $item->nilai }}"
                                                       class="form-control"
                                                       readonly>
                                            </div>

                                        @elseif($item->tipe == 'boolean')
                                            <div class="form-check form-switch">
                                                <input type="checkbox" name="{{ $item->kunci }}" id="{{ $item->kunci }}"
                                                       value="1" {{ $item->nilai == '1' ? 'checked' : '' }}
                                                       class="form-check-input">
                                                <label for="{{ $item->kunci }}" class="form-check-label">
                                                    Aktif
                                                </label>
                                            </div>

                                        @elseif($item->tipe == 'select')
                                            <select name="{{ $item->kunci }}" id="{{ $item->kunci }}"
                                                    class="form-select">
                                                @foreach(json_decode($item->opsi, true) ?? [] as $key => $value)
                                                    <option value="{{ $key }}" {{ $item->nilai == $key ? 'selected' : '' }}>
                                                        {{ $value }}
                                                    </option>
                                                @endforeach
                                            </select>

                                        @elseif($item->tipe == 'json')
                                            <textarea name="{{ $item->kunci }}" id="{{ $item->kunci }}" rows="10"
                                                      class="form-control font-monospace">{{ $item->nilai }}</textarea>
                                            <div class="form-text">
                                                Format JSON. Hati-hati saat mengedit secara manual.
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            @endforeach
                        </div>

                        <div class="mt-4">
                            <button type="submit" class="btn btn-primary">
                                <i class="bi bi-save me-1"></i> Simpan Pengaturan
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-admin-bootstrap-layout>
