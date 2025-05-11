<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Edit Profil Kelurahan
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    @if (session('success'))
                        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
                            <span class="block sm:inline">{{ session('success') }}</span>
                        </div>
                    @endif

                    <form action="{{ route('admin.profil.update') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        
                        <div class="mb-6">
                            <h3 class="text-lg font-medium text-gray-900 mb-2">Informasi Dasar</h3>
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                <div>
                                    <x-input-label for="village_name" value="Nama Kelurahan" />
                                    <x-text-input id="village_name" name="village_name" type="text" class="mt-1 block w-full" :value="old('village_name', $profil->village_name)" required />
                                    <x-input-error class="mt-2" :messages="$errors->get('village_name')" />
                                </div>
                                
                                <div>
                                    <x-input-label for="district" value="Kecamatan" />
                                    <x-text-input id="district" name="district" type="text" class="mt-1 block w-full" :value="old('district', $profil->district)" required />
                                    <x-input-error class="mt-2" :messages="$errors->get('district')" />
                                </div>
                                
                                <div>
                                    <x-input-label for="regency" value="Kabupaten/Kota" />
                                    <x-text-input id="regency" name="regency" type="text" class="mt-1 block w-full" :value="old('regency', $profil->regency)" required />
                                    <x-input-error class="mt-2" :messages="$errors->get('regency')" />
                                </div>
                                
                                <div>
                                    <x-input-label for="province" value="Provinsi" />
                                    <x-text-input id="province" name="province" type="text" class="mt-1 block w-full" :value="old('province', $profil->province)" required />
                                    <x-input-error class="mt-2" :messages="$errors->get('province')" />
                                </div>
                                
                                <div>
                                    <x-input-label for="postal_code" value="Kode Pos" />
                                    <x-text-input id="postal_code" name="postal_code" type="text" class="mt-1 block w-full" :value="old('postal_code', $profil->postal_code)" />
                                    <x-input-error class="mt-2" :messages="$errors->get('postal_code')" />
                                </div>
                                
                                <div>
                                    <x-input-label for="logo" value="Logo Kelurahan" />
                                    <input id="logo" name="logo" type="file" class="mt-1 block w-full" />
                                    <x-input-error class="mt-2" :messages="$errors->get('logo')" />
                                    @if ($profil->logo)
                                        <div class="mt-2">
                                            <img src="{{ asset($profil->logo) }}" alt="Logo Kelurahan" class="h-20">
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                        
                        <div class="mb-6">
                            <h3 class="text-lg font-medium text-gray-900 mb-2">Kontak</h3>
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                <div>
                                    <x-input-label for="address" value="Alamat" />
                                    <x-text-input id="address" name="address" type="text" class="mt-1 block w-full" :value="old('address', $profil->address)" />
                                    <x-input-error class="mt-2" :messages="$errors->get('address')" />
                                </div>
                                
                                <div>
                                    <x-input-label for="phone" value="Telepon" />
                                    <x-text-input id="phone" name="phone" type="text" class="mt-1 block w-full" :value="old('phone', $profil->phone)" />
                                    <x-input-error class="mt-2" :messages="$errors->get('phone')" />
                                </div>
                                
                                <div>
                                    <x-input-label for="email" value="Email" />
                                    <x-text-input id="email" name="email" type="email" class="mt-1 block w-full" :value="old('email', $profil->email)" />
                                    <x-input-error class="mt-2" :messages="$errors->get('email')" />
                                </div>
                                
                                <div>
                                    <x-input-label for="website" value="Website" />
                                    <x-text-input id="website" name="website" type="text" class="mt-1 block w-full" :value="old('website', $profil->website)" />
                                    <x-input-error class="mt-2" :messages="$errors->get('website')" />
                                </div>
                            </div>
                        </div>
                        
                        <div class="mb-6">
                            <h3 class="text-lg font-medium text-gray-900 mb-2">Sejarah</h3>
                            <div>
                                <x-input-label for="history" value="Sejarah Kelurahan" />
                                <textarea id="history" name="history" class="mt-1 block w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm" rows="5">{{ old('history', $profil->history) }}</textarea>
                                <x-input-error class="mt-2" :messages="$errors->get('history')" />
                            </div>
                        </div>
                        
                        <div class="mb-6">
                            <h3 class="text-lg font-medium text-gray-900 mb-2">Visi & Misi</h3>
                            <div class="mb-4">
                                <x-input-label for="vision" value="Visi" />
                                <textarea id="vision" name="vision" class="mt-1 block w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm" rows="3">{{ old('vision', $profil->vision) }}</textarea>
                                <x-input-error class="mt-2" :messages="$errors->get('vision')" />
                            </div>
                            
                            <div>
                                <x-input-label for="mission" value="Misi" />
                                <textarea id="mission" name="mission" class="mt-1 block w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm" rows="5">{{ old('mission', $profil->mission) }}</textarea>
                                <x-input-error class="mt-2" :messages="$errors->get('mission')" />
                            </div>
                        </div>
                        
                        <div class="flex items-center justify-end">
                            <x-primary-button>
                                Simpan Perubahan
                            </x-primary-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
