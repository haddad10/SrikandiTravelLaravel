@extends('layouts.app')

@section('title', $package->name . ' - Srikandi Travel')

@section('content')
    <!-- Hero Section -->
    <section class="py-16">
        <!-- Travel Mode Hero -->
        <div x-show="mode === 'travel'" class="bg-gradient-to-r from-blue-600 to-green-600 py-16">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center text-white">
                <h1 class="text-4xl md:text-5xl font-bold mb-4">{{ $package->name }}</h1>
                <p class="text-xl">{{ $package->destination }}</p>
            </div>
        </div>
        
        <!-- Umroh Mode Hero -->
        <div x-show="mode === 'umroh'" class="bg-gradient-to-r from-orange-500 to-yellow-500 py-16">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center text-white">
                <h1 class="text-4xl md:text-5xl font-bold mb-4">{{ $package->name }}</h1>
                <p class="text-xl">{{ $package->destination }}</p>
            </div>
        </div>
    </section>

    <!-- Package Detail Section -->
    <section class="py-16 bg-white dark:bg-gray-800 transition-colors duration-300">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12">
                <!-- Package Image -->
                <div class="space-y-6">
                    <div class="relative">
                        <img src="{{ $package->image ? asset('storage/' . $package->image) : 'https://via.placeholder.com/600x400?text=' . urlencode($package->name) }}" 
                             alt="{{ $package->name }}" 
                             class="w-full h-96 object-cover rounded-lg shadow-lg">
                        <div class="absolute top-4 left-4">
                            <span class="px-3 py-1 rounded-full text-sm font-semibold 
                                {{ $package->mode === 'travel' ? 'bg-blue-500 text-white' : 'bg-orange-500 text-white' }}">
                                {{ ucfirst($package->mode) }}
                            </span>
                        </div>
                        @if($package->mode === 'travel')
                        <div class="absolute top-4 right-4">
                            <span class="px-3 py-1 rounded-full text-sm font-semibold 
                                {{ $package->category === 'domestik' ? 'bg-green-500 text-white' : 'bg-purple-500 text-white' }}">
                                {{ ucfirst($package->category) }}
                            </span>
                        </div>
                        @endif
                    </div>
                </div>

                <!-- Package Info -->
                <div class="space-y-6">
                    <div>
                        <h2 class="text-3xl font-bold text-gray-900 dark:text-white mb-4 transition-colors duration-300">{{ $package->name }}</h2>
                        <p class="text-xl text-gray-600 dark:text-gray-300 mb-6 transition-colors duration-300">{{ $package->destination }}</p>
                        
                        <div class="grid grid-cols-2 gap-6 mb-6">
                            <div class="bg-gray-50 dark:bg-gray-700 p-4 rounded-lg transition-colors duration-300">
                                <h3 class="text-sm font-medium text-gray-500 dark:text-gray-400 transition-colors duration-300">Durasi</h3>
                                <p class="text-lg font-semibold text-gray-900 dark:text-white transition-colors duration-300">{{ $package->duration }}</p>
                            </div>
                            <div class="bg-gray-50 dark:bg-gray-700 p-4 rounded-lg transition-colors duration-300">
                                <h3 class="text-sm font-medium text-gray-500 dark:text-gray-400 transition-colors duration-300">Harga</h3>
                                <p class="text-lg font-semibold text-blue-600 dark:text-blue-400 transition-colors duration-300">Rp {{ number_format($package->price, 0, ',', '.') }}</p>
                            </div>
                        </div>

                        <div class="bg-gray-50 dark:bg-gray-700 p-6 rounded-lg mb-6 transition-colors duration-300">
                            <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-3 transition-colors duration-300">Deskripsi Paket</h3>
                            <p class="text-gray-700 dark:text-gray-300 leading-relaxed transition-colors duration-300">{{ $package->description }}</p>
                        </div>



                        <!-- Action Buttons -->
                        <div class="flex flex-col sm:flex-row gap-4">
                            <a href="https://wa.me/6281234567890?text=Halo, saya tertarik dengan paket {{ $package->name }} - {{ $package->destination }} dengan harga Rp{{ number_format($package->price, 0, ',', '.') }}. Mohon informasi lebih lanjut." 
                               target="_blank"
                               class="flex-1 bg-green-500 text-white py-3 px-6 rounded-lg font-semibold hover:bg-green-600 transition-colors duration-300 text-center">
                                <div class="flex items-center justify-center">
                                    <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 24 24">
                                        <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893A11.821 11.821 0 0020.464 3.488"/>
                                    </svg>
                                    Pesan via WhatsApp
                                </div>
                            </a>
                            <a href="{{ route('packages') }}" 
                               class="flex-1 bg-gray-600 dark:bg-gray-700 text-white py-3 px-6 rounded-lg font-semibold hover:bg-gray-700 dark:hover:bg-gray-600 transition-colors duration-300 text-center">
                                Lihat Paket Lainnya
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Related Packages Section -->
    <section class="py-16 bg-gray-50 dark:bg-gray-900 transition-colors duration-300">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-bold text-gray-900 dark:text-white mb-4 transition-colors duration-300">
                    <span x-show="mode === 'travel'">Paket Wisata Terkait</span>
                    <span x-show="mode === 'umroh'">Paket Umroh Terkait</span>
                </h2>
                <p class="text-lg text-gray-600 dark:text-gray-300 transition-colors duration-300">
                    <span x-show="mode === 'travel'">Temukan paket wisata lainnya yang mungkin menarik untuk Anda</span>
                    <span x-show="mode === 'umroh'">Temukan paket umroh lainnya yang mungkin menarik untuk Anda</span>
                </p>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                @foreach($relatedPackages as $relatedPackage)
                <div class="bg-white dark:bg-gray-800 rounded-lg shadow-lg overflow-hidden hover:shadow-xl transition-all duration-300 transform hover:-translate-y-1">
                    @if($relatedPackage->image)
                    <div class="h-48 overflow-hidden">
                        <img src="{{ Storage::url($relatedPackage->image) }}" 
                             alt="{{ $relatedPackage->name }}" 
                             class="w-full h-full object-cover">
                    </div>
                    @endif
                    <div class="p-6">
                        <h3 class="text-xl font-semibold mb-2 text-gray-900 dark:text-white transition-colors duration-300">{{ $relatedPackage->name }}</h3>
                        <p class="text-gray-600 dark:text-gray-300 mb-4 transition-colors duration-300">{{ $relatedPackage->destination }}</p>
                        <div class="flex justify-between items-center mb-4">
                            <span class="text-2xl font-bold text-blue-600 dark:text-blue-400 transition-colors duration-300">Rp {{ number_format($relatedPackage->price, 0, ',', '.') }}</span>
                            <span class="text-sm text-gray-500 dark:text-gray-400 transition-colors duration-300">{{ $relatedPackage->duration }}</span>
                        </div>
                        <div class="flex gap-2">
                            <a href="{{ route('packages.detail', $relatedPackage) }}" class="flex-1 bg-blue-600 text-white py-2 px-4 rounded-lg text-center hover:bg-blue-700 transition-colors duration-300">
                                Detail
                            </a>
                            <a href="https://wa.me/6281234567890?text=Halo, saya tertarik dengan paket {{ $relatedPackage->name }}. Mohon informasi lebih lanjut." target="_blank" class="bg-green-500 text-white py-2 px-4 rounded-lg hover:bg-green-600 transition-colors duration-300">
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893A11.821 11.821 0 0020.464 3.488"/>
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection 