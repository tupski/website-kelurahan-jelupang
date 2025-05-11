<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h1 class="text-2xl font-bold mb-6">Struktur Organisasi Kelurahan Jelupang</h1>
                    
                    <div class="flex flex-col md:flex-row gap-8">
                        <div class="md:w-1/3">
                            <div class="bg-green-50 p-4 rounded-lg shadow mb-4">
                                <h2 class="text-xl font-semibold text-green-800 mb-2">Menu Profil</h2>
                                <ul class="space-y-2">
                                    <li>
                                        <a href="{{ route('profil') }}" class="block p-2 bg-white text-green-700 rounded border border-green-200 hover:bg-green-100">
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
                                        <a href="{{ route('profil.struktur-organisasi') }}" class="block p-2 bg-green-500 text-white rounded hover:bg-green-600">
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
                        </div>
                        
                        <div class="md:w-2/3">
                            <div class="bg-white p-6 rounded-lg shadow">
                                <h2 class="text-xl font-semibold text-gray-800 mb-4">Struktur Organisasi</h2>
                                
                                @if ($profil && $profil->organization_structure)
                                <div class="prose max-w-none">
                                    @foreach($profil->organization_structure as $position => $name)
                                    <div class="mb-4 p-4 border rounded-lg">
                                        <h3 class="font-medium text-gray-700">{{ $position }}</h3>
                                        <p>{{ $name }}</p>
                                    </div>
                                    @endforeach
                                </div>
                                @else
                                <div class="text-center py-8">
                                    <p class="text-gray-600 mb-4">Struktur organisasi belum tersedia.</p>
                                    
                                    <!-- Contoh struktur organisasi default -->
                                    <div class="max-w-lg mx-auto">
                                        <div class="bg-green-100 p-4 rounded-lg shadow-sm mb-4 text-center">
                                            <h3 class="font-bold">Lurah</h3>
                                            <p>Nama Lurah</p>
                                        </div>
                                        
                                        <div class="grid grid-cols-2 gap-4 mb-4">
                                            <div class="bg-blue-100 p-4 rounded-lg shadow-sm text-center">
                                                <h3 class="font-bold">Sekretaris Lurah</h3>
                                                <p>Nama Sekretaris</p>
                                            </div>
                                            <div class="bg-blue-100 p-4 rounded-lg shadow-sm text-center">
                                                <h3 class="font-bold">Bendahara</h3>
                                                <p>Nama Bendahara</p>
                                            </div>
                                        </div>
                                        
                                        <div class="grid grid-cols-3 gap-4">
                                            <div class="bg-yellow-100 p-4 rounded-lg shadow-sm text-center">
                                                <h3 class="font-bold">Kasi Pemerintahan</h3>
                                                <p>Nama Kasi</p>
                                            </div>
                                            <div class="bg-yellow-100 p-4 rounded-lg shadow-sm text-center">
                                                <h3 class="font-bold">Kasi Kesra</h3>
                                                <p>Nama Kasi</p>
                                            </div>
                                            <div class="bg-yellow-100 p-4 rounded-lg shadow-sm text-center">
                                                <h3 class="font-bold">Kasi Pelayanan</h3>
                                                <p>Nama Kasi</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
