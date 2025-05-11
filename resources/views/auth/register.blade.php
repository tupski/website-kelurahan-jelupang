<x-bootstrap-layout>
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card shadow-sm">
                    <div class="card-header bg-success text-white">
                        <h4 class="mb-0">Pendaftaran Akun</h4>
                    </div>
                    <div class="card-body p-4">
                        <form method="POST" action="{{ route('register') }}">
                            @csrf

                            <!-- Nama -->
                            <div class="mb-3">
                                <label for="nama" class="form-label">Nama Lengkap</label>
                                <input id="nama" type="text" class="form-control @error('nama') is-invalid @enderror" name="nama" value="{{ old('nama') }}" required autofocus>
                                @error('nama')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- NIK -->
                            <div class="mb-3">
                                <label for="nik" class="form-label">NIK (16 Digit)</label>
                                <input id="nik" type="text" class="form-control @error('nik') is-invalid @enderror" name="nik" value="{{ old('nik') }}" required maxlength="16" minlength="16">
                                @error('nik')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                                <div class="form-text">Masukkan 16 digit Nomor Induk Kependudukan (NIK) sesuai KTP</div>
                            </div>

                            <!-- Email -->
                            <div class="mb-3">
                                <label for="email" class="form-label">Alamat Email</label>
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required>
                                @error('email')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- No HP -->
                            <div class="mb-3">
                                <label for="no_hp" class="form-label">Nomor HP</label>
                                <input id="no_hp" type="text" class="form-control @error('no_hp') is-invalid @enderror" name="no_hp" value="{{ old('no_hp') }}" required>
                                @error('no_hp')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Domisili -->
                            <div class="mb-3">
                                <label class="form-label">Domisili sesuai KTP?</label>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="domisili_ktp" id="domisili_yes" value="1" {{ old('domisili_ktp', '1') == '1' ? 'checked' : '' }} onchange="toggleDomisili()">
                                    <label class="form-check-label" for="domisili_yes">
                                        Ya, saya tinggal sesuai alamat KTP
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="domisili_ktp" id="domisili_no" value="0" {{ old('domisili_ktp') == '0' ? 'checked' : '' }} onchange="toggleDomisili()">
                                    <label class="form-check-label" for="domisili_no">
                                        Tidak, saya tinggal di alamat berbeda
                                    </label>
                                </div>
                            </div>

                            <!-- Kota Domisili (hanya muncul jika domisili tidak sesuai KTP) -->
                            <div class="mb-3" id="kota_domisili_container" style="display: {{ old('domisili_ktp') == '0' ? 'block' : 'none' }};">
                                <label for="kota_domisili" class="form-label">Kota Domisili Saat Ini</label>
                                <select id="kota_domisili" class="form-select @error('kota_domisili') is-invalid @enderror" name="kota_domisili" style="width: 100%;">
                                    <option value="">-- Pilih Kota Domisili --</option>
                                    @foreach(['Jakarta Pusat', 'Jakarta Utara', 'Jakarta Barat', 'Jakarta Selatan', 'Jakarta Timur', 'Tangerang', 'Tangerang Selatan', 'Depok', 'Bekasi', 'Bogor'] as $kota)
                                        <option value="{{ $kota }}" {{ old('kota_domisili') == $kota ? 'selected' : '' }}>{{ $kota }}</option>
                                    @endforeach
                                </select>
                                @error('kota_domisili')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Alamat -->
                            <div class="mb-3">
                                <label for="alamat" class="form-label">Alamat Lengkap</label>
                                <textarea id="alamat" class="form-control @error('alamat') is-invalid @enderror" name="alamat" rows="3">{{ old('alamat') }}</textarea>
                                @error('alamat')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Password -->
                            <div class="mb-3">
                                <label for="password" class="form-label">Password</label>
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required>
                                @error('password')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Konfirmasi Password -->
                            <div class="mb-3">
                                <label for="password_confirmation" class="form-label">Konfirmasi Password</label>
                                <input id="password_confirmation" type="password" class="form-control" name="password_confirmation" required>
                            </div>

                            <div class="d-flex justify-content-between align-items-center mt-4">
                                <a href="{{ route('login') }}" class="text-decoration-none">Sudah punya akun? Login</a>
                                <button type="submit" class="btn btn-success">Daftar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Load Select2 -->
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#kota_domisili').select2({
                placeholder: "Pilih kota domisili",
                allowClear: true
            });
        });

        function toggleDomisili() {
            const domisiliNo = document.getElementById('domisili_no').checked;
            const kotaDomisiliContainer = document.getElementById('kota_domisili_container');

            if (domisiliNo) {
                kotaDomisiliContainer.style.display = 'block';
            } else {
                kotaDomisiliContainer.style.display = 'none';
            }
        }
    </script>
</x-bootstrap-layout>
