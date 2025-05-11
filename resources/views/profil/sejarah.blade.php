<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h1 class="text-2xl font-bold mb-6">Sejarah Kelurahan Jelupang</h1>
                    
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
                                        <a href="{{ route('profil.sejarah') }}" class="block p-2 bg-green-500 text-white rounded hover:bg-green-600">
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
                        </div>
                        
                        <div class="md:w-2/3">
                            <div class="bg-white p-6 rounded-lg shadow">
                                <h2 class="text-xl font-semibold text-gray-800 mb-4">Sejarah Kelurahan</h2>
                                
                                @if ($profil && $profil->history)
                                <div class="prose max-w-none">
                                    {!! nl2br(e($profil->history)) !!}
                                </div>
                                @else
                                <p class="text-gray-600">Informasi sejarah kelurahan belum tersedia.</p>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
