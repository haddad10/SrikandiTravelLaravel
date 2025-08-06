@extends('layouts.app')

@section('title', 'Beranda - Srikandi Tour And Travel')

@section('content')
<style>
    .hero-section {
        min-height: 100vh;
        background-size: cover;
        background-position: center;
        background-repeat: no-repeat;
    }
    
    .hero-section img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        object-position: center;
    }
    
    @media (max-width: 768px) {
        .hero-section {
            min-height: 100vh;
        }
    }
</style>
    <!-- Hero Section -->
    <section class="hero-section relative min-h-screen flex items-center justify-center overflow-hidden travel-mode" x-data="{ mode: 'travel' }">
        <!-- Background Image -->
        <div class="absolute inset-0 z-0">
            <div x-show="mode === 'travel'" class="w-full h-full">
                <img src="{{ $heroImages['travel'] }}" 
                     alt="Travel Background" 
                     class="w-full h-full object-cover object-center"
                     loading="eager"
                     decoding="async">
                <div class="absolute inset-0 bg-gradient-to-r from-blue-600/60 to-green-600/60"></div>
            </div>
            <div x-show="mode === 'umroh'" class="w-full h-full">
                <img src="{{ $heroImages['umroh'] }}" 
                     alt="Umroh Background" 
                     class="w-full h-full object-cover object-center"
                     loading="eager"
                     decoding="async">
                <div class="absolute inset-0 bg-gradient-to-r from-orange-500/60 to-yellow-500/60"></div>
            </div>
        </div>
        
        <!-- Content -->
        <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center text-white">
            <h1 class="text-4xl md:text-6xl lg:text-7xl font-bold mb-6 leading-tight">
                <span x-show="mode === 'travel'">Jelajahi Dunia Bersama Kami</span>
                <span x-show="mode === 'umroh'">Berangkat Umroh dengan Hati Tenang</span>
            </h1>
            <p class="text-xl md:text-2xl lg:text-3xl mb-8 max-w-4xl mx-auto leading-relaxed">
                <span x-show="mode === 'travel'">Temukan pengalaman perjalanan terbaik dengan paket wisata berkualitas</span>
                <span x-show="mode === 'umroh'">Layanan umroh terpercaya dengan pembimbing berpengalaman dan akomodasi terbaik</span>
            </p>
            <div class="flex flex-col sm:flex-row gap-4 justify-center">
                <a href="{{ route('packages') }}" class="bg-white text-blue-600 px-8 py-4 rounded-lg font-semibold hover:bg-gray-100 transition-all duration-300 transform hover:scale-105 shadow-lg">
                    Lihat Paket
                </a>
                <a href="https://wa.me/6281234567890" target="_blank" class="bg-green-500 text-white px-8 py-4 rounded-lg font-semibold hover:bg-green-600 transition-all duration-300 transform hover:scale-105 shadow-lg">
                    Hubungi Kami via WhatsApp
                </a>
            </div>
        </div>
    </section>

    <script>
        // Mode switching functionality
        document.addEventListener('DOMContentLoaded', function() {
            const heroSection = document.querySelector('.hero-section');
            let currentMode = 'travel';
            
            // Function to switch modes
            function switchMode(mode) {
                currentMode = mode;
                
                // Remove existing mode classes
                heroSection.classList.remove('travel-mode', 'umroh-mode');
                
                // Add new mode class
                if (mode === 'travel') {
                    heroSection.classList.add('travel-mode');
                } else {
                    heroSection.classList.add('umroh-mode');
                }
                
                console.log('Mode switched to:', mode);
            }
            
            // Make switchMode available globally
            window.switchMode = switchMode;
            
            // Test background loading
            setTimeout(() => {
                const computedStyle = window.getComputedStyle(heroSection);
                const backgroundImage = computedStyle.backgroundImage;
                console.log('Current background image:', backgroundImage);
                
                if (backgroundImage === 'none') {
                    console.log('⚠️ No background image detected, adding fallback');
                    heroSection.classList.add('fallback');
                }
            }, 1000);
        });
    </script>

    <!-- About Section -->
    <section class="py-16 bg-white dark:bg-gray-800 transition-colors duration-300">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-bold text-gray-900 dark:text-white mb-4 transition-colors duration-300">
                    <span x-show="mode === 'travel'">Mengapa Memilih Srikandi Travel?</span>
                    <span x-show="mode === 'umroh'">Mengapa Memilih Srikandi Umroh?</span>
                </h2>
                <p class="text-lg text-gray-600 dark:text-gray-300 max-w-3xl mx-auto transition-colors duration-300">
                    <span x-show="mode === 'travel'">Kami adalah agen tour and travel terpercaya dengan pengalaman lebih dari 10 tahun dalam menyediakan paket wisata berkualitas. Tim kami siap membantu Anda merencanakan perjalanan impian dengan layanan profesional dan harga terbaik.</span>
                    <span x-show="mode === 'umroh'">Kami adalah agen umroh terpercaya dengan pengalaman lebih dari 10 tahun dalam menyediakan paket umroh berkualitas. Tim pembimbing kami siap membantu Anda menjalankan ibadah umroh dengan khusyuk dan nyaman.</span>
                </p>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div class="text-center">
                    <div class="bg-blue-100 dark:bg-blue-900 w-16 h-16 rounded-full flex items-center justify-center mx-auto mb-4 transition-colors duration-300">
                        <svg class="w-8 h-8 text-blue-600 dark:text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold mb-2 text-gray-900 dark:text-white transition-colors duration-300">
                        <span x-show="mode === 'travel'">Paket wisata berkualitas dengan harga terjangkau</span>
                        <span x-show="mode === 'umroh'">Paket umroh berkualitas dengan harga terjangkau</span>
                    </h3>
                </div>
                <div class="text-center">
                    <div class="bg-blue-100 dark:bg-blue-900 w-16 h-16 rounded-full flex items-center justify-center mx-auto mb-4 transition-colors duration-300">
                        <svg class="w-8 h-8 text-blue-600 dark:text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold mb-2 text-gray-900 dark:text-white transition-colors duration-300">
                        <span x-show="mode === 'travel'">Tim profesional berpengalaman</span>
                        <span x-show="mode === 'umroh'">Pembimbing umroh berpengalaman</span>
                    </h3>
                </div>
                <div class="text-center">
                    <div class="bg-blue-100 dark:bg-blue-900 w-16 h-16 rounded-full flex items-center justify-center mx-auto mb-4 transition-colors duration-300">
                        <svg class="w-8 h-8 text-blue-600 dark:text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold mb-2 text-gray-900 dark:text-white transition-colors duration-300">
                        <span x-show="mode === 'travel'">Layanan 24/7 untuk kenyamanan Anda</span>
                        <span x-show="mode === 'umroh'">Layanan 24/7 untuk kenyamanan ibadah Anda</span>
                    </h3>
                </div>
            </div>
        </div>
    </section>

    <!-- Packages Section -->
    <section class="py-16 bg-gray-50 dark:bg-gray-900 transition-colors duration-300">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-bold text-gray-900 dark:text-white mb-4 transition-colors duration-300">
                    <span x-show="mode === 'travel'">Paket Wisata Terpopuler</span>
                    <span x-show="mode === 'umroh'">Paket Umroh Terpopuler</span>
                </h2>
                <p class="text-lg text-gray-600 dark:text-gray-300 max-w-3xl mx-auto transition-colors duration-300">
                    <span x-show="mode === 'travel'">Pilih paket wisata favorit Anda dan nikmati pengalaman perjalanan yang tak terlupakan</span>
                    <span x-show="mode === 'umroh'">Pilih paket umroh favorit Anda dan jalankan ibadah dengan khusyuk</span>
                </p>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach($packages->take(6) as $package)
                <div class="bg-white dark:bg-gray-800 rounded-lg shadow-lg overflow-hidden transition-all duration-300 hover:shadow-xl transform hover:-translate-y-1">
                    @if($package->image)
                    <div class="h-48 overflow-hidden">
                        <img src="{{ Storage::url($package->image) }}" 
                             alt="{{ $package->name }}" 
                             class="w-full h-full object-cover">
                    </div>
                    @endif
                    <div class="p-6">
                        <h3 class="text-xl font-semibold mb-2 text-gray-900 dark:text-white transition-colors duration-300">{{ $package->name }}</h3>
                        <p class="text-gray-600 dark:text-gray-300 mb-4 transition-colors duration-300">{{ $package->destination }}</p>
                        <div class="flex justify-between items-center mb-4">
                            <span class="text-2xl font-bold text-blue-600 dark:text-blue-400 transition-colors duration-300">Rp {{ number_format($package->price, 0, ',', '.') }}</span>
                            <span class="text-sm text-gray-500 dark:text-gray-400 transition-colors duration-300">{{ $package->duration }}</span>
                        </div>
                        <div class="flex gap-2">
                            <a href="{{ route('packages.detail', $package) }}" class="flex-1 bg-blue-600 text-white py-2 px-4 rounded-lg text-center hover:bg-blue-700 transition-colors duration-300">
                                Detail Paket
                            </a>
                            <a href="https://wa.me/6281234567890?text=Halo, saya tertarik dengan paket {{ $package->name }}. Mohon informasi lebih lanjut." target="_blank" class="bg-green-500 text-white py-2 px-4 rounded-lg hover:bg-green-600 transition-colors duration-300">
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893A11.821 11.821 0 0020.464 3.488"/>
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            
            <div class="text-center mt-8">
                <a href="{{ route('packages') }}" class="inline-block bg-blue-600 text-white px-8 py-3 rounded-lg font-semibold hover:bg-blue-700 transition-colors duration-300">
                    Lihat Semua Paket
                </a>
            </div>
        </div>
    </section>

    <!-- Schedules Section -->
    <section class="py-16 bg-white dark:bg-gray-800 transition-colors duration-300">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-bold text-gray-900 dark:text-white mb-4 transition-colors duration-300">
                    <span x-show="mode === 'travel'">Jadwal Keberangkatan Terbaru</span>
                    <span x-show="mode === 'umroh'">Jadwal Umroh Terbaru</span>
                </h2>
                <p class="text-lg text-gray-600 dark:text-gray-300 max-w-3xl mx-auto transition-colors duration-300">
                    <span x-show="mode === 'travel'">Jadwal keberangkatan wisata terbaru untuk memudahkan perencanaan perjalanan Anda</span>
                    <span x-show="mode === 'umroh'">Jadwal keberangkatan umroh terbaru untuk memudahkan perencanaan ibadah Anda</span>
                </p>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach($schedules->take(6) as $schedule)
                <div class="bg-gray-50 dark:bg-gray-700 rounded-lg p-6 transition-all duration-300 hover:shadow-lg">
                    <div class="flex items-center justify-between mb-4">
                        <div class="bg-blue-100 dark:bg-blue-900 text-blue-800 dark:text-blue-200 px-3 py-1 rounded-full text-sm font-medium transition-colors duration-300">
                            {{ \Carbon\Carbon::parse($schedule->date)->format('d M Y') }}
                        </div>
                        <span class="text-sm text-gray-500 dark:text-gray-400 transition-colors duration-300">{{ $schedule->destination }}</span>
                    </div>
                    <h3 class="text-lg font-semibold mb-2 text-gray-900 dark:text-white transition-colors duration-300">{{ $schedule->destination }}</h3>
                    <p class="text-gray-600 dark:text-gray-300 text-sm transition-colors duration-300">{{ $schedule->description }}</p>
                </div>
                @endforeach
            </div>
            
            <div class="text-center mt-8">
                <a href="{{ route('schedules') }}" class="inline-block bg-blue-600 text-white px-8 py-3 rounded-lg font-semibold hover:bg-blue-700 transition-colors duration-300">
                    Lihat Semua Jadwal
                </a>
            </div>
        </div>
    </section>

    <!-- Gallery Section -->
    <section class="py-16 bg-gray-50 dark:bg-gray-900 transition-colors duration-300">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-bold text-gray-900 dark:text-white mb-4 transition-colors duration-300">
                    <span x-show="mode === 'travel'">Galeri Wisata</span>
                    <span x-show="mode === 'umroh'">Galeri Umroh</span>
                </h2>
                <p class="text-lg text-gray-600 dark:text-gray-300 max-w-3xl mx-auto transition-colors duration-300">
                    <span x-show="mode === 'travel'">Momen indah dari perjalanan wisata yang telah kami selenggarakan</span>
                    <span x-show="mode === 'umroh'">Momen indah dari perjalanan umroh yang telah kami selenggarakan</span>
                </p>
            </div>
            
            <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
                @foreach($galleries->take(8) as $gallery)
                <div class="group relative overflow-hidden rounded-lg shadow-lg transition-all duration-300 hover:shadow-xl">
                    <img src="{{ Storage::url($gallery->image) }}" 
                         alt="{{ $gallery->caption }}" 
                         class="w-full h-48 object-cover transition-transform duration-300 group-hover:scale-110">
                    <div class="absolute inset-0 bg-black bg-opacity-0 group-hover:bg-opacity-50 transition-all duration-300 flex items-center justify-center">
                        <div class="text-white opacity-0 group-hover:opacity-100 transition-opacity duration-300 text-center">
                            <p class="text-sm font-medium">{{ $gallery->caption }}</p>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            
            <div class="text-center mt-8">
                <a href="{{ route('gallery') }}" class="inline-block bg-blue-600 text-white px-8 py-3 rounded-lg font-semibold hover:bg-blue-700 transition-colors duration-300">
                    Lihat Semua Foto
                </a>
            </div>
        </div>
    </section>

    <!-- Stats Section -->
    <section class="py-16 bg-blue-600 dark:bg-blue-800 transition-colors duration-300">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-2 md:grid-cols-4 gap-8 text-center text-white">
                <div>
                    <div class="text-3xl md:text-4xl font-bold mb-2">1000+</div>
                    <div class="text-blue-100 dark:text-blue-200">
                        <span x-show="mode === 'travel'">Pelanggan Puas</span>
                        <span x-show="mode === 'umroh'">Jamaah Umroh</span>
                    </div>
                </div>
                <div>
                    <div class="text-3xl md:text-4xl font-bold mb-2">50+</div>
                    <div class="text-blue-100 dark:text-blue-200">
                        <span x-show="mode === 'travel'">Destinasi Wisata</span>
                        <span x-show="mode === 'umroh'">Paket Umroh</span>
                    </div>
                </div>
                <div>
                    <div class="text-3xl md:text-4xl font-bold mb-2">10+</div>
                    <div class="text-blue-100 dark:text-blue-200">Tahun Pengalaman</div>
                </div>
                <div>
                    <div class="text-3xl md:text-4xl font-bold mb-2">24/7</div>
                    <div class="text-blue-100 dark:text-blue-200">Layanan Pelanggan</div>
                </div>
            </div>
        </div>
    </section>

    <style>
        .line-clamp-3 {
            display: -webkit-box;
            -webkit-line-clamp: 3;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }
    </style>
@endsection 