@extends('layouts.app')

@section('title', 'Galeri - Srikandi Travel')

@section('content')
    <!-- Hero Section -->
    <section class="py-16">
        @if($mode === 'travel')
        <!-- Travel Mode Hero -->
        <div class="bg-gradient-to-r from-blue-600 to-green-600 py-16">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center text-white">
                <h1 class="text-4xl md:text-5xl font-bold mb-4">Galeri Wisata</h1>
                <p class="text-xl">Momen indah dari perjalanan wisata</p>
            </div>
        </div>
        @else
        <!-- Umroh Mode Hero -->
        <div class="bg-gradient-to-r from-orange-500 to-yellow-500 py-16">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center text-white">
                <h1 class="text-4xl md:text-5xl font-bold mb-4">Galeri Umroh</h1>
                <p class="text-xl">Momen indah dari perjalanan umroh</p>
            </div>
        </div>
        @endif
    </section>

    <!-- Mode Filter Section -->
    <section class="py-8 bg-gray-50 dark:bg-gray-800 transition-colors duration-300">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex flex-wrap justify-center gap-4">
                <a href="{{ route('gallery', ['mode' => 'travel']) }}" 
                   class="px-6 py-3 rounded-lg font-semibold transition-colors {{ $mode === 'travel' ? 'bg-blue-600 text-white' : 'bg-gray-300 dark:bg-gray-600 text-gray-700 dark:text-gray-300 hover:bg-gray-400 dark:hover:bg-gray-500' }}">
                    Travel ({{ $galleryCounts['travel'] }})
                </a>
                <a href="{{ route('gallery', ['mode' => 'umroh']) }}" 
                   class="px-6 py-3 rounded-lg font-semibold transition-colors {{ $mode === 'umroh' ? 'bg-orange-600 text-white' : 'bg-gray-300 dark:bg-gray-600 text-gray-700 dark:text-gray-300 hover:bg-gray-400 dark:hover:bg-gray-500' }}">
                    Umroh ({{ $galleryCounts['umroh'] }})
                </a>
            </div>
        </div>
    </section>

    <!-- Gallery Section -->
    <section class="py-16 bg-white dark:bg-gray-800 transition-colors duration-300">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
                @foreach($galleries as $gallery)
                <div class="group relative overflow-hidden rounded-lg shadow-lg transition-all duration-300 hover:shadow-xl transform hover:-translate-y-1">
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
            
            @if($galleries->isEmpty())
            <div class="text-center py-12">
                <div class="text-gray-500 dark:text-gray-400 text-lg transition-colors duration-300">
                    @if($mode === 'travel')
                        Belum ada foto wisata yang tersedia saat ini.
                    @else
                        Belum ada foto umroh yang tersedia saat ini.
                    @endif
                </div>
            </div>
            @endif
        </div>
    </section>

    <!-- Modal for image preview -->
    <div id="imageModal" class="fixed inset-0 bg-black bg-opacity-75 hidden z-50 flex items-center justify-center">
        <div class="max-w-4xl max-h-full p-4">
            <div class="relative">
                <button onclick="closeModal()" class="absolute top-4 right-4 text-white text-2xl hover:text-gray-300">
                    &times;
                </button>
                <img id="modalImage" src="" alt="" class="max-w-full max-h-full object-contain">
                <div id="modalCaption" class="text-white text-center mt-4"></div>
            </div>
        </div>
    </div>

    <script>
        function openModal(imageSrc, caption) {
            document.getElementById('modalImage').src = imageSrc;
            document.getElementById('modalCaption').textContent = caption;
            document.getElementById('imageModal').classList.remove('hidden');
        }

        function closeModal() {
            document.getElementById('imageModal').classList.add('hidden');
        }

        // Close modal when clicking outside
        document.getElementById('imageModal').addEventListener('click', function(e) {
            if (e.target === this) {
                closeModal();
            }
        });

        // Close modal with Escape key
        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape') {
                closeModal();
            }
        });
    </script>
@endsection 