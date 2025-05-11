<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="mb-6">
                        <a href="{{ route('berita') }}" class="inline-flex items-center text-green-600 hover:text-green-800">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                            </svg>
                            Kembali ke Daftar Berita
                        </a>
                    </div>
                    
                    <article>
                        <h1 class="text-3xl font-bold mb-4">{{ $berita->title }}</h1>
                        
                        <div class="flex items-center text-gray-500 mb-6">
                            <span>{{ $berita->created_at->format('d M Y') }}</span>
                            <span class="mx-2">•</span>
                            <span>{{ $berita->user->name }}</span>
                        </div>
                        
                        @if($berita->image)
                            <div class="mb-6">
                                <img src="{{ asset($berita->image) }}" alt="{{ $berita->title }}" class="w-full max-h-96 object-cover rounded-lg">
                            </div>
                        @endif
                        
                        <div class="prose max-w-none mb-8">
                            {!! nl2br(e($berita->content)) !!}
                        </div>
                        
                        <div class="flex items-center justify-between border-t border-gray-200 pt-6">
                            <div class="flex items-center">
                                <span class="text-gray-600 mr-2">Bagikan:</span>
                                <a href="#" class="text-blue-600 hover:text-blue-800 mx-1">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="currentColor" viewBox="0 0 24 24">
                                        <path d="M24 4.557c-.883.392-1.832.656-2.828.775 1.017-.609 1.798-1.574 2.165-2.724-.951.564-2.005.974-3.127 1.195-.897-.957-2.178-1.555-3.594-1.555-3.179 0-5.515 2.966-4.797 6.045-4.091-.205-7.719-2.165-10.148-5.144-1.29 2.213-.669 5.108 1.523 6.574-.806-.026-1.566-.247-2.229-.616-.054 2.281 1.581 4.415 3.949 4.89-.693.188-1.452.232-2.224.084.626 1.956 2.444 3.379 4.6 3.419-2.07 1.623-4.678 2.348-7.29 2.04 2.179 1.397 4.768 2.212 7.548 2.212 9.142 0 14.307-7.721 13.995-14.646.962-.695 1.797-1.562 2.457-2.549z"/>
                                    </svg>
                                </a>
                                <a href="#" class="text-blue-800 hover:text-blue-900 mx-1">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="currentColor" viewBox="0 0 24 24">
                                        <path d="M9 8h-3v4h3v12h5v-12h3.642l.358-4h-4v-1.667c0-.955.192-1.333 1.115-1.333h2.885v-5h-3.808c-3.596 0-5.192 1.583-5.192 4.615v3.385z"/>
                                    </svg>
                                </a>
                                <a href="#" class="text-green-600 hover:text-green-700 mx-1">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="currentColor" viewBox="0 0 24 24">
                                        <path d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946.003-6.556 5.338-11.891 11.893-11.891 3.181.001 6.167 1.24 8.413 3.488 2.245 2.248 3.481 5.236 3.48 8.414-.003 6.557-5.338 11.892-11.893 11.892-1.99-.001-3.951-.5-5.688-1.448l-6.305 1.654zm6.597-3.807c1.676.995 3.276 1.591 5.392 1.592 5.448 0 9.886-4.434 9.889-9.885.002-5.462-4.415-9.89-9.881-9.892-5.452 0-9.887 4.434-9.889 9.884-.001 2.225.651 3.891 1.746 5.634l-.999 3.648 3.742-.981zm11.387-5.464c-.074-.124-.272-.198-.57-.347-.297-.149-1.758-.868-2.031-.967-.272-.099-.47-.149-.669.149-.198.297-.768.967-.941 1.165-.173.198-.347.223-.644.074-.297-.149-1.255-.462-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.297-.347.446-.521.151-.172.2-.296.3-.495.099-.198.05-.372-.025-.521-.075-.148-.669-1.611-.916-2.206-.242-.579-.487-.501-.669-.51l-.57-.01c-.198 0-.52.074-.792.372s-1.04 1.016-1.04 2.479 1.065 2.876 1.213 3.074c.149.198 2.095 3.2 5.076 4.487.709.306 1.263.489 1.694.626.712.226 1.36.194 1.872.118.571-.085 1.758-.719 2.006-1.413.248-.695.248-1.29.173-1.414z"/>
                                    </svg>
                                </a>
                            </div>
                        </div>
                    </article>
                    
                    @if($beritaTerkait->count() > 0)
                        <div class="mt-12">
                            <h2 class="text-2xl font-bold mb-6">Berita Terkait</h2>
                            
                            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                                @foreach($beritaTerkait as $item)
                                    <div class="bg-white rounded-lg shadow overflow-hidden">
                                        @if($item->image)
                                            <img src="{{ asset($item->image) }}" alt="{{ $item->title }}" class="w-full h-40 object-cover">
                                        @else
                                            <div class="w-full h-40 bg-gray-200 flex items-center justify-center">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z" />
                                                </svg>
                                            </div>
                                        @endif
                                        
                                        <div class="p-4">
                                            <h3 class="text-lg font-semibold mb-2">
                                                <a href="{{ route('berita.detail', $item->slug) }}" class="text-gray-800 hover:text-green-600">
                                                    {{ $item->title }}
                                                </a>
                                            </h3>
                                            
                                            <div class="text-sm text-gray-500 mb-2">
                                                {{ $item->created_at->format('d M Y') }}
                                            </div>
                                            
                                            <a href="{{ route('berita.detail', $item->slug) }}" class="text-green-600 hover:text-green-800 font-medium text-sm">
                                                Baca selengkapnya →
                                            </a>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
