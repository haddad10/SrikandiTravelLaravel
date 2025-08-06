@extends('layouts.app')

@section('title', 'Paket Perjalanan - Srikandi Travel')

@section('content')
    <!-- Hero Section -->
    <section class="py-16">
        @if($mode === 'travel')
        <!-- Travel Mode Hero -->
        <div class="bg-gradient-to-r from-blue-600 to-green-600 py-16">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center text-white">
                <h1 class="text-4xl md:text-5xl font-bold mb-4">Paket Perjalanan</h1>
                <p class="text-xl">Temukan paket perjalanan terbaik untuk liburan Anda</p>
            </div>
        </div>
        @else
        <!-- Umroh Mode Hero -->
        <div class="bg-gradient-to-r from-orange-500 to-yellow-500 py-16">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center text-white">
                <h1 class="text-4xl md:text-5xl font-bold mb-4">Paket Umroh</h1>
                <p class="text-xl">Pilih paket umroh terbaik untuk ibadah Anda</p>
            </div>
        </div>
        @endif
    </section>

    <!-- Filter Section -->
    <section class="py-8 bg-gray-50 dark:bg-gray-800 transition-colors duration-300">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Mode Switch Buttons -->
            <div class="flex flex-wrap justify-center gap-4 mb-6">
                <a href="{{ route('packages', ['mode' => 'travel']) }}" 
                   class="px-6 py-3 rounded-lg font-semibold transition-colors {{ $mode === 'travel' ? 'bg-blue-600 text-white' : 'bg-gray-300 dark:bg-gray-600 text-gray-700 dark:text-gray-300 hover:bg-gray-400 dark:hover:bg-gray-500' }}">
                    Travel ({{ $packageCounts['travel'] }})
                </a>
                <a href="{{ route('packages', ['mode' => 'umroh']) }}" 
                   class="px-6 py-3 rounded-lg font-semibold transition-colors {{ $mode === 'umroh' ? 'bg-orange-600 text-white' : 'bg-gray-300 dark:bg-gray-600 text-gray-700 dark:text-gray-300 hover:bg-gray-400 dark:hover:bg-gray-500' }}">
                    Umroh ({{ $packageCounts['umroh'] }})
                </a>
            </div>
            
            <!-- Travel Mode Filters -->
            @if($mode === 'travel')
            <div class="flex flex-wrap justify-center gap-4">
                <button onclick="filterByCategory('all')" class="filter-btn category-filter active px-6 py-2 rounded-lg font-semibold transition-colors bg-blue-600 text-white hover:bg-blue-700" data-category="all">
                    Semua
                </button>
                <button onclick="filterByCategory('domestik')" class="filter-btn category-filter px-6 py-2 rounded-lg font-semibold transition-colors bg-gray-300 dark:bg-gray-600 text-gray-700 dark:text-gray-300 hover:bg-gray-400 dark:hover:bg-gray-500" data-category="domestik">
                    Domestik
                </button>
                <button onclick="filterByCategory('internasional')" class="filter-btn category-filter px-6 py-2 rounded-lg font-semibold transition-colors bg-gray-300 dark:bg-gray-600 text-gray-700 dark:text-gray-300 hover:bg-gray-400 dark:hover:bg-gray-500" data-category="internasional">
                    Internasional
                </button>
            </div>
            @else
            <div class="text-center">
                <p class="text-gray-600 dark:text-gray-300 transition-colors duration-300">Semua paket umroh tersedia</p>
            </div>
            @endif
        </div>
    </section>

    <!-- Packages Section -->
    <section class="py-16 bg-white dark:bg-gray-900 transition-colors duration-300">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8" id="packages-container">
                @foreach($packages as $package)
                @if($package->mode === $mode)
                <div class="package-card bg-white dark:bg-gray-800 rounded-lg shadow-lg overflow-hidden hover:shadow-xl transition-all duration-300 transform hover:-translate-y-1" 
                     data-mode="{{ $package->mode }}" 
                     data-category="{{ $package->category }}">
                    <div class="relative">
                        <img src="{{ $package->image ? asset('storage/' . $package->image) : 'https://via.placeholder.com/400x250?text=' . urlencode($package->name) }}" 
                             alt="{{ $package->name }}" 
                             class="w-full h-48 object-cover">
                        <div class="absolute top-4 left-4">
                            <span class="px-3 py-1 rounded-full text-xs font-semibold 
                                {{ $package->mode === 'travel' ? 'bg-blue-500 text-white' : 'bg-orange-500 text-white' }}">
                                {{ ucfirst($package->mode) }}
                            </span>
                        </div>
                        @if($package->mode === 'travel' && $package->category)
                        <div class="absolute top-4 right-4">
                            <span class="px-3 py-1 rounded-full text-xs font-semibold 
                                {{ $package->category === 'domestik' ? 'bg-green-500 text-white' : 'bg-purple-500 text-white' }}">
                                {{ ucfirst($package->category) }}
                            </span>
                        </div>
                        @endif
                    </div>
                    
                    <div class="p-6">
                        <h3 class="text-xl font-bold mb-2 text-gray-900 dark:text-white transition-colors duration-300">{{ $package->name }}</h3>
                        <p class="text-gray-600 dark:text-gray-300 mb-3 transition-colors duration-300">{{ $package->destination }}</p>
                        <p class="text-sm text-gray-500 dark:text-gray-400 mb-4 transition-colors duration-300">{{ $package->duration }}</p>
                        <p class="text-gray-700 dark:text-gray-300 mb-4 line-clamp-3 transition-colors duration-300">{{ $package->description }}</p>
                        
                        <div class="flex justify-between items-center mb-4">
                            <div class="text-2xl font-bold text-blue-600 dark:text-blue-400 transition-colors duration-300">
                                Rp {{ number_format($package->price, 0, ',', '.') }}
                            </div>
                        </div>
                        
                        <div class="flex space-x-2">
                            <a href="{{ route('packages.detail', $package) }}" 
                               class="flex-1 bg-gray-600 dark:bg-gray-700 text-white px-4 py-2 rounded-lg font-semibold hover:bg-gray-700 dark:hover:bg-gray-600 transition-colors text-center">
                                Detail Paket
                            </a>
                            <a href="https://wa.me/6281234567890?text=Saya tertarik dengan paket {{ $package->name }} - {{ $package->destination }} dengan harga Rp{{ number_format($package->price, 0, ',', '.') }}" 
                               target="_blank"
                               class="flex-1 bg-green-500 text-white px-4 py-2 rounded-lg font-semibold hover:bg-green-600 transition-colors text-center">
                                WhatsApp
                            </a>
                        </div>
                    </div>
                </div>
                @endif
                @endforeach
            </div>
            
            @if($packages->isEmpty())
            <div class="text-center py-12">
                <div class="text-gray-500 dark:text-gray-400 text-lg transition-colors duration-300">
                    @if($mode === 'travel')
                        Belum ada paket wisata yang tersedia saat ini.
                    @else
                        Belum ada paket umroh yang tersedia saat ini.
                    @endif
                </div>
            </div>
            @endif
        </div>
    </section>

    <script>
        function filterByCategory(category) {
            // Only apply filters for travel mode
            const currentMode = '{{ $mode }}';
            if (currentMode !== 'travel') {
                return;
            }
            
            // Update active button
            document.querySelectorAll('.category-filter').forEach(btn => {
                btn.classList.remove('active', 'bg-blue-600', 'text-white');
                btn.classList.add('bg-gray-300', 'dark:bg-gray-600', 'text-gray-700', 'dark:text-gray-300');
            });
            
            const activeBtn = document.querySelector(`[data-category="${category}"]`);
            if (activeBtn) {
                activeBtn.classList.add('active', 'bg-blue-600', 'text-white');
                activeBtn.classList.remove('bg-gray-300', 'dark:bg-gray-600', 'text-gray-700', 'dark:text-gray-300');
            }
            
            // Filter packages - only show packages that match the current mode
            const packages = document.querySelectorAll('.package-card');
            packages.forEach(package => {
                const packageMode = package.getAttribute('data-mode');
                const packageCategory = package.getAttribute('data-category');
                
                // Only show packages that match the current mode
                if (packageMode === currentMode) {
                    if (category === 'all' || packageCategory === category) {
                        package.style.display = 'block';
                    } else {
                        package.style.display = 'none';
                    }
                } else {
                    // Hide packages from other modes
                    package.style.display = 'none';
                }
            });
        }
        
        // Initialize with first category active for travel mode
        document.addEventListener('DOMContentLoaded', function() {
            const currentMode = '{{ $mode }}';
            if (currentMode === 'travel') {
                const firstCategoryBtn = document.querySelector('.category-filter');
                if (firstCategoryBtn) {
                    firstCategoryBtn.click();
                }
            }
        });
    </script>

    <style>
        .line-clamp-3 {
            display: -webkit-box;
            -webkit-line-clamp: 3;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }
    </style>
@endsection 