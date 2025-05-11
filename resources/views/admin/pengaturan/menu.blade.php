<x-admin-bootstrap-layout>
    <x-slot name="header">
        <h1 class="h3 mb-0">Pengaturan Menu</h1>
    </x-slot>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h2 class="card-title fs-4 mb-4">Kelola Menu Website</h2>

                    <ul class="nav nav-pills mb-4">
                        <li class="nav-item">
                            <a href="{{ route('admin.pengaturan.menu', ['tipe' => 'utama']) }}"
                               class="nav-link {{ $tipe == 'utama' ? 'active' : '' }}">
                                <i class="bi bi-list me-1"></i> Menu Utama
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.pengaturan.menu', ['tipe' => 'footer']) }}"
                               class="nav-link {{ $tipe == 'footer' ? 'active' : '' }}">
                                <i class="bi bi-layout-text-window-reverse me-1"></i> Menu Footer
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.pengaturan.menu', ['tipe' => 'mobile']) }}"
                               class="nav-link {{ $tipe == 'mobile' ? 'active' : '' }}">
                                <i class="bi bi-phone me-1"></i> Menu Mobile
                            </a>
                        </li>
                    </ul>

                    <div class="row">
                        <!-- Form Tambah Menu -->
                        <div class="col-md-4 mb-4">
                            <div class="card bg-light">
                                <div class="card-header">
                                    <h5 class="card-title mb-0">Tambah Item Menu</h5>
                                </div>
                                <div class="card-body">
                                    <form action="{{ route('admin.pengaturan.menu.add', ['tipe' => $tipe]) }}" method="POST">
                                        @csrf

                                        <div class="mb-3">
                                            <label for="nama" class="form-label">Nama Menu</label>
                                            <input type="text" name="nama" id="nama" required class="form-control">
                                        </div>

                                        <div class="mb-3">
                                            <label for="url" class="form-label">URL</label>
                                            <input type="text" name="url" id="url" required class="form-control">
                                        </div>

                                        @if($tipe == 'utama' || $tipe == 'mobile')
                                        <div class="mb-3">
                                            <label for="icon" class="form-label">Icon (Bootstrap Icons)</label>
                                            <div class="input-group">
                                                <span class="input-group-text"><i class="bi bi-house-door"></i></span>
                                                <input type="text" name="icon" id="icon" placeholder="bi-house-door" class="form-control">
                                            </div>
                                            <div class="form-text">
                                                Contoh: bi-house-door, bi-newspaper, bi-shop
                                            </div>
                                        </div>
                                        @endif

                                        <div class="mb-3">
                                            <label for="parent_id" class="form-label">Parent Menu (Opsional)</label>
                                            <select name="parent_id" id="parent_id" class="form-select">
                                                <option value="">-- Tidak Ada --</option>
                                                @foreach($menuData as $index => $item)
                                                    @if(empty($item['parent_id']))
                                                        <option value="{{ $index }}">{{ $item['nama'] }}</option>
                                                    @endif
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="d-grid">
                                            <button type="submit" class="btn btn-success">
                                                <i class="bi bi-plus-circle me-1"></i> Tambah Menu
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                        <!-- Daftar Menu -->
                        <div class="col-md-8">
                            <div class="card">
                                <div class="card-header d-flex justify-content-between align-items-center">
                                    <h5 class="card-title mb-0">Daftar Menu {{ ucfirst($tipe) }}</h5>
                                </div>
                                <div class="card-body">
                                    <form action="{{ route('admin.pengaturan.menu.update', ['tipe' => $tipe]) }}" method="POST">
                                        @csrf

                                        <div class="table-responsive">
                                            <table class="table table-striped table-hover">
                                                <thead>
                                                    <tr>
                                                        <th>Urutan</th>
                                                        <th>Nama</th>
                                                        <th>URL</th>
                                                        @if($tipe == 'utama' || $tipe == 'mobile')
                                                        <th>Icon</th>
                                                        @endif
                                                        <th>Status</th>
                                                        <th>Aksi</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @forelse($menuData as $index => $item)
                                                        <tr>
                                                            <td style="width: 80px;">
                                                                <input type="number" name="menu[{{ $index }}][urutan]" value="{{ $item['urutan'] }}"
                                                                       class="form-control form-control-sm">
                                                                <input type="hidden" name="menu[{{ $index }}][nama]" value="{{ $item['nama'] }}">
                                                                <input type="hidden" name="menu[{{ $index }}][url]" value="{{ $item['url'] }}">
                                                                @if(isset($item['icon']))
                                                                    <input type="hidden" name="menu[{{ $index }}][icon]" value="{{ $item['icon'] }}">
                                                                @endif
                                                                <input type="hidden" name="menu[{{ $index }}][parent_id]" value="{{ $item['parent_id'] }}">
                                                            </td>
                                                            <td>{{ $item['nama'] }}</td>
                                                            <td>{{ $item['url'] }}</td>
                                                            @if($tipe == 'utama' || $tipe == 'mobile')
                                                            <td>
                                                                @if(isset($item['icon']) && $item['icon'])
                                                                    <i class="bi {{ $item['icon'] }}"></i> {{ $item['icon'] }}
                                                                @else
                                                                    <span class="text-muted">-</span>
                                                                @endif
                                                            </td>
                                                            @endif
                                                            <td>
                                                                <div class="form-check form-switch">
                                                                    <input type="checkbox" name="menu[{{ $index }}][aktif]" value="1"
                                                                           {{ $item['aktif'] ? 'checked' : '' }}
                                                                           class="form-check-input">
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <form action="{{ route('admin.pengaturan.menu.delete', ['tipe' => $tipe, 'index' => $index]) }}" method="POST" class="d-inline">
                                                                    @csrf
                                                                    @method('DELETE')
                                                                    <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Yakin ingin menghapus menu ini?')">
                                                                        <i class="bi bi-trash"></i>
                                                                    </button>
                                                                </form>
                                                            </td>
                                                        </tr>
                                                    @empty
                                                        <tr>
                                                            <td colspan="{{ ($tipe == 'utama' || $tipe == 'mobile') ? 6 : 5 }}" class="text-center py-3">
                                                                <i class="bi bi-info-circle me-1"></i> Belum ada item menu.
                                                            </td>
                                                        </tr>
                                                    @endforelse
                                                </tbody>
                                            </table>
                                        </div>

                                        <div class="mt-3">
                                            <button type="submit" class="btn btn-primary">
                                                <i class="bi bi-save me-1"></i> Simpan Perubahan
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-admin-bootstrap-layout>
