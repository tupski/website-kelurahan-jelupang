<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h1 class="text-2xl font-bold mb-6">Kontak Kelurahan Jelupang</h1>
                    
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
                                        <a href="{{ route('profil.struktur-organisasi') }}" class="block p-2 bg-white text-green-700 rounded border border-green-200 hover:bg-green-100">
                                            Struktur Organisasi
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{ route('profil.kontak') }}" class="block p-2 bg-green-500 text-white rounded hover:bg-green-600">
                                            Kontak
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        
                        <div class="md:w-2/3">
                            <div class="bg-white p-6 rounded-lg shadow mb-6">
                                <h2 class="text-xl font-semibold text-gray-800 mb-4">Informasi Kontak</h2>
                                
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                    <div class="flex items-start">
                                        <div class="bg-green-100 p-2 rounded-full mr-3">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-green-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                                            </svg>
                                        </div>
                                        <div>
                                            <h3 class="font-medium text-gray-700">Alamat</h3>
                                            <p>{{ $profil->address ?? 'Jl. Raya Jelupang No. 123, Serpong Utara, Tangerang Selatan, Banten 15310' }}</p>
                                        </div>
                                    </div>
                                    
                                    <div class="flex items-start">
                                        <div class="bg-green-100 p-2 rounded-full mr-3">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-green-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                                            </svg>
                                        </div>
                                        <div>
                                            <h3 class="font-medium text-gray-700">Telepon</h3>
                                            <p>{{ $profil->phone ?? '(021) 1234-5678' }}</p>
                                        </div>
                                    </div>
                                    
                                    <div class="flex items-start">
                                        <div class="bg-green-100 p-2 rounded-full mr-3">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-green-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                                            </svg>
                                        </div>
                                        <div>
                                            <h3 class="font-medium text-gray-700">Email</h3>
                                            <p>{{ $profil->email ?? 'info@kelurahanjelupang.go.id' }}</p>
                                        </div>
                                    </div>
                                    
                                    <div class="flex items-start">
                                        <div class="bg-green-100 p-2 rounded-full mr-3">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-green-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                            </svg>
                                        </div>
                                        <div>
                                            <h3 class="font-medium text-gray-700">Jam Kerja</h3>
                                            <p>Senin - Jumat: 08.00 - 16.00 WIB</p>
                                            <p>Sabtu, Minggu & Hari Libur: Tutup</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="bg-white p-6 rounded-lg shadow">
                                <h2 class="text-xl font-semibold text-gray-800 mb-4">Lokasi</h2>
                                
                                <div class="aspect-w-16 aspect-h-9 mb-4">
                                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3965.7331455606383!2d106.6735!3d-6.2935!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2zNsKwMTcnMzYuNiJTIDEwNsKwNDAnMjQuNiJF!5e0!3m2!1sid!2sid!4v1620000000000!5m2!1sid!2sid" 
                                        width="100%" height="300" style="border:0;" allowfullscreen="" loading="lazy" class="rounded-lg"></iframe>
                                </div>
                                
                                <p class="text-gray-600">
                                    Kelurahan Jelupang terletak di wilayah Kecamatan Serpong Utara, Kota Tangerang Selatan, Provinsi Banten.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
