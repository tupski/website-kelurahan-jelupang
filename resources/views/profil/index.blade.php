<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h1 class="text-2xl font-bold mb-6">Profil Kelurahan Jelupang</h1>
                    
                    <div class="flex flex-col md:flex-row gap-8">
                        <div class="md:w-1/3">
                            <div class="bg-green-50 p-4 rounded-lg shadow mb-4">
                                <h2 class="text-xl font-semibold text-green-800 mb-2">Menu Profil</h2>
                                <ul class="space-y-2">
                                    <li>
                                        <a href="{{ route('profil') }}" class="block p-2 bg-green-500 text-white rounded hover:bg-green-600">
                                            Profil Umum
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{ route('profil.sejarah') }}" class="block p-2 bg-white text-green-700 rounded border border-green-200 hover:bg-green-100">
                                            Sejarah
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{ route('profil.visi-misi') }}" class="block p-2 bg-white text-green-700 rounded border border-green-200 hover:bg-green-100">
                                            Visi & Misi
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{ route('profil.struktur-organisasi') }}" class="block p-2 bg-white text-green-700 rounded border border-green-200 hover:bg-green-100">
                                            Struktur Organisasi
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{ route('profil.kontak') }}" class="block p-2 bg-white text-green-700 rounded border border-green-200 hover:bg-green-100">
                                            Kontak
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            
                            @if ($profil && $profil->logo)
                            <div class="bg-white p-4 rounded-lg shadow text-center">
                                <img src="{{ asset($profil->logo) }}" alt="Logo Kelurahan" class="mx-auto h-32">
                            </div>
                            @endif
                        </div>
                        
                        <div class="md:w-2/3">
                            <div class="bg-white p-6 rounded-lg shadow">
                                <h2 class="text-xl font-semibold text-gray-800 mb-4">Informasi Umum</h2>
                                
                                @if ($profil)
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-6">
                                    <div>
                                        <h3 class="font-medium text-gray-700">Nama Kelurahan</h3>
                                        <p>{{ $profil->village_name }}</p>
                                    </div>
                                    
                                    <div>
                                        <h3 class="font-medium text-gray-700">Kecamatan</h3>
                                        <p>{{ $profil->district }}</p>
                                    </div>
                                    
                                    <div>
                                        <h3 class="font-medium text-gray-700">Kabupaten/Kota</h3>
                                        <p>{{ $profil->regency }}</p>
                                    </div>
                                    
                                    <div>
                                        <h3 class="font-medium text-gray-700">Provinsi</h3>
                                        <p>{{ $profil->province }}</p>
                                    </div>
                                    
                                    @if ($profil->postal_code)
                                    <div>
                                        <h3 class="font-medium text-gray-700">Kode Pos</h3>
                                        <p>{{ $profil->postal_code }}</p>
                                    </div>
                                    @endif
                                    
                                    @if ($profil->address)
                                    <div>
                                        <h3 class="font-medium text-gray-700">Alamat</h3>
                                        <p>{{ $profil->address }}</p>
                                    </div>
                                    @endif
                                </div>
                                
                                <div class="mb-6">
                                    <h3 class="font-medium text-gray-700 mb-2">Tentang Kelurahan Jelupang</h3>
                                    <p class="text-gray-600">
                                        {{ $profil->history ? Str::limit($profil->history, 300) : 'Informasi belum tersedia.' }}
                                        @if ($profil->history && strlen($profil->history) > 300)
                                            <a href="{{ route('profil.sejarah') }}" class="text-green-600 hover:underline">Baca selengkapnya</a>
                                        @endif
                                    </p>
                                </div>
                                @else
                                <p class="text-gray-600">Informasi profil belum tersedia.</p>
                                @endif
                                
                                <div class="mt-6">
                                    <a href="{{ route('profil.kontak') }}" class="inline-block bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600">
                                        Hubungi Kami
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
