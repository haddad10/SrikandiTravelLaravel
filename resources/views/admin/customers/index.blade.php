<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pendataan Pelanggan - Admin Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    animation: {
                        'fade-in': 'fadeIn 0.6s ease-in-out',
                        'slide-up': 'slideUp 0.6s ease-out',
                        'bounce-in': 'bounceIn 0.8s ease-out',
                        'pulse-slow': 'pulse 3s cubic-bezier(0.4, 0, 0.6, 1) infinite'
                    },
                    keyframes: {
                        fadeIn: {
                            '0%': { opacity: '0' },
                            '100%': { opacity: '1' }
                        },
                        slideUp: {
                            '0%': { transform: 'translateY(30px)', opacity: '0' },
                            '100%': { transform: 'translateY(0)', opacity: '1' }
                        },
                        bounceIn: {
                            '0%': { transform: 'scale(0.3)', opacity: '0' },
                            '50%': { transform: 'scale(1.05)' },
                            '70%': { transform: 'scale(0.9)' },
                            '100%': { transform: 'scale(1)', opacity: '1' }
                        }
                    }
                }
            }
        }
    </script>
</head>
<body class="bg-gradient-to-br from-gray-900 via-gray-800 to-black min-h-screen">
    <!-- Navigation -->
    <nav class="bg-gray-900/90 backdrop-blur-md shadow-xl border-b border-gray-700/50 sticky top-0 z-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16">
                <div class="flex items-center">
                    <div class="flex-shrink-0">
                        <a href="{{ route('admin.dashboard') }}" class="text-2xl font-bold bg-gradient-to-r from-blue-400 via-purple-400 to-indigo-400 bg-clip-text text-transparent hover:from-blue-300 hover:via-purple-300 hover:to-indigo-300 transition-all duration-300">
                            Srikandi Tour And Travel Admin
                        </a>
                    </div>
                </div>
                
                <div class="flex items-center space-x-4">
                    <a href="{{ route('admin.dashboard') }}" class="bg-gradient-to-r from-blue-600 to-blue-700 text-white px-6 py-2 rounded-xl hover:from-blue-500 hover:to-blue-600 transition-all duration-300 font-medium shadow-lg hover:shadow-xl transform hover:-translate-y-0.5">
                        <svg class="w-4 h-4 inline mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/>
                        </svg>
                        Dashboard
                    </a>
                    <div class="flex items-center space-x-2 bg-gradient-to-r from-green-900/50 to-blue-900/50 px-4 py-2 rounded-full border border-green-500/30">
                        <div class="w-2 h-2 bg-green-400 rounded-full animate-pulse"></div>
                        <span class="text-gray-200 font-medium">Selamat datang, Admin!</span>
                    </div>
                    <form action="{{ route('admin.logout') }}" method="POST" class="inline">
                        @csrf
                        <button type="submit" class="bg-gradient-to-r from-red-600 to-red-700 text-white px-6 py-2 rounded-xl hover:from-red-500 hover:to-red-600 transition-all duration-300 font-medium shadow-lg hover:shadow-xl transform hover:-translate-y-0.5">
                            <svg class="w-4 h-4 inline mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/>
                            </svg>
                            Logout
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <div class="max-w-7xl mx-auto py-8 px-4 sm:px-6 lg:px-8">
        <!-- Page Header -->
        <div class="mb-8 animate-fade-in">
            <div class="bg-gradient-to-r from-gray-800 to-gray-900 rounded-3xl p-8 shadow-xl border border-gray-700">
                <div class="flex items-center justify-between mb-6">
                    <div>
                        <h1 class="text-5xl font-bold bg-gradient-to-r from-gray-100 via-blue-300 to-purple-300 bg-clip-text text-transparent mb-4">Pendataan Pelanggan</h1>
                        <p class="text-xl text-gray-300 leading-relaxed">Kelola data pelanggan berdasarkan paket perjalanan dengan mudah dan terorganisir</p>
                    </div>
                    <div class="w-16 h-16 bg-gradient-to-br from-blue-600 to-purple-700 rounded-2xl flex items-center justify-center shadow-xl">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197m13.5-9a2.5 2.5 0 11-5 0 2.5 2.5 0 015 0z"/>
                        </svg>
                    </div>
                </div>
                <div class="flex items-center justify-between">
                    <div class="flex items-center space-x-4">
                        <div class="w-3 h-3 bg-green-400 rounded-full animate-pulse"></div>
                        <span class="text-sm text-gray-400">Sistem pendataan pelanggan aktif</span>
                    </div>
                    <a href="{{ route('admin.export.customers.all') }}" 
                       class="bg-gradient-to-r from-blue-600 to-blue-700 text-white px-6 py-3 rounded-xl font-bold hover:from-blue-500 hover:to-blue-600 transition-all duration-300 shadow-lg hover:shadow-xl transform hover:-translate-y-0.5">
                        <svg class="w-5 h-5 inline mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                        </svg>
                        Export Semua Data
                    </a>
                </div>
            </div>
        </div>

        <!-- Success/Error Messages -->
        @if(session('success'))
        <div class="bg-gradient-to-r from-green-900/50 to-green-800/50 border border-green-500/30 text-green-200 px-6 py-4 rounded-2xl mb-8 shadow-lg animate-bounce-in">
            <div class="flex items-center">
                <svg class="w-5 h-5 mr-3 text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                </svg>
                {{ session('success') }}
            </div>
        </div>
        @endif

        @if(session('error'))
        <div class="bg-gradient-to-r from-red-900/50 to-red-800/50 border border-red-500/30 text-red-200 px-6 py-4 rounded-2xl mb-8 shadow-lg animate-bounce-in">
            <div class="flex items-center">
                <svg class="w-5 h-5 mr-3 text-red-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                </svg>
                {{ session('error') }}
            </div>
        </div>
        @endif

        <!-- Package Cards -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 animate-slide-up">
            @foreach($packages as $package)
            <div class="bg-gray-800 rounded-3xl shadow-2xl overflow-hidden hover:shadow-3xl transition-all duration-500 transform hover:-translate-y-3 border border-gray-700 group">
                <!-- Image Section -->
                @if($package->image)
                <div class="h-64 overflow-hidden relative">
                    <img src="{{ Storage::url($package->image) }}" 
                         alt="{{ $package->name }}" 
                         class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                    <div class="absolute inset-0 bg-gradient-to-t from-black/70 to-transparent"></div>
                    <div class="absolute top-4 right-4">
                        <span class="px-4 py-2 rounded-full text-sm font-bold shadow-lg
                            {{ $package->mode === 'travel' ? 'bg-gradient-to-r from-blue-600 to-blue-700 text-white' : 'bg-gradient-to-r from-orange-600 to-orange-700 text-white' }}">
                            {{ ucfirst($package->mode) }}
                        </span>
                    </div>
                </div>
                @else
                <div class="h-64 bg-gradient-to-br from-gray-700 via-gray-800 to-gray-900 flex items-center justify-center relative overflow-hidden">
                    <div class="absolute inset-0 bg-gradient-to-t from-black/40 to-transparent"></div>
                    <div class="relative z-10 text-center">
                        <svg class="w-20 h-20 text-gray-500 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 002 2z"/>
                        </svg>
                        <p class="text-gray-400 font-medium">Gambar Paket</p>
                    </div>
                    <div class="absolute top-4 right-4">
                        <span class="px-4 py-2 rounded-full text-sm font-bold shadow-lg
                            {{ $package->mode === 'travel' ? 'bg-gradient-to-r from-blue-600 to-blue-700 text-white' : 'bg-gradient-to-r from-orange-600 to-orange-700 text-white' }}">
                            {{ ucfirst($package->mode) }}
                        </span>
                    </div>
                </div>
                @endif
                
                <!-- Content Section -->
                <div class="p-8">
                    <!-- Package Info -->
                    <div class="mb-6">
                        <h3 class="text-2xl font-bold text-gray-100 mb-3 leading-tight">{{ $package->name }}</h3>
                        <div class="flex items-center text-gray-300 mb-4">
                            <svg class="w-5 h-5 mr-2 text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                            </svg>
                            <span class="text-lg">{{ $package->destination }}</span>
                        </div>
                    </div>
                    
                    <!-- Price and Duration -->
                    <div class="bg-gradient-to-r from-gray-700 to-gray-800 rounded-2xl p-6 mb-6 border border-gray-600">
                        <div class="flex items-center justify-between">
                            <div class="text-center">
                                <div class="text-3xl font-bold bg-gradient-to-r from-blue-400 to-purple-400 bg-clip-text text-transparent">
                                    Rp {{ number_format($package->price, 0, ',', '.') }}
                                </div>
                                <div class="text-sm text-gray-400 mt-1">{{ $package->duration }}</div>
                            </div>
                            
                            <div class="text-center">
                                <div class="text-4xl font-bold text-green-400">{{ $package->customers_count }}</div>
                                <div class="text-sm text-gray-400">Pelanggan</div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Status -->
                    <div class="mb-6">
                        <div class="flex items-center justify-between">
                            <span class="text-gray-300 font-medium">Status Data:</span>
                            <span class="px-4 py-2 rounded-full text-sm font-bold shadow-md
                                {{ $package->customers_count > 0 ? 'bg-gradient-to-r from-green-900/50 to-green-800/50 text-green-200 border border-green-500/30' : 'bg-gradient-to-r from-yellow-900/50 to-yellow-800/50 text-yellow-200 border border-yellow-500/30' }}">
                                {{ $package->customers_count > 0 ? '✓ Ada Data' : '⚠ Belum Ada' }}
                            </span>
                        </div>
                    </div>
                    
                    <!-- Action Buttons -->
                    <div class="flex gap-4">
                        <a href="{{ route('admin.customers.package', $package) }}" 
                           class="flex-1 bg-gradient-to-r from-blue-600 to-blue-700 text-white py-4 px-6 rounded-2xl text-center hover:from-blue-500 hover:to-blue-600 transition-all duration-300 font-bold shadow-lg hover:shadow-xl transform hover:-translate-y-1 flex items-center justify-center">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                            </svg>
                            Lihat
                        </a>
                        <a href="{{ route('admin.customers.create', $package) }}" 
                           class="flex-1 bg-gradient-to-r from-green-600 to-green-700 text-white py-4 px-6 rounded-2xl text-center hover:from-green-500 hover:to-green-600 transition-all duration-300 font-bold shadow-lg hover:shadow-xl transform hover:-translate-y-1 flex items-center justify-center">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"/>
                            </svg>
                            Tambah
                        </a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>

        <!-- Empty State -->
        @if($packages->isEmpty())
        <div class="text-center py-16 animate-fade-in">
            <div class="bg-gray-800 rounded-3xl p-12 shadow-xl border border-gray-700">
                <div class="w-24 h-24 bg-gradient-to-br from-gray-700 to-gray-800 rounded-full flex items-center justify-center mx-auto mb-6">
                    <svg class="w-12 h-12 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/>
                    </svg>
                </div>
                <h3 class="text-2xl font-bold text-gray-100 mb-4">Belum ada paket yang tersedia</h3>
                <p class="text-gray-400 mb-8 text-lg">Silakan tambahkan paket perjalanan terlebih dahulu untuk mulai mengelola data pelanggan.</p>
                <a href="{{ route('admin.packages.create') }}" 
                   class="bg-gradient-to-r from-blue-600 to-blue-700 text-white px-8 py-4 rounded-2xl font-bold hover:from-blue-500 hover:to-blue-600 transition-all duration-300 shadow-lg hover:shadow-xl transform hover:-translate-y-1 inline-flex items-center">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"/>
                    </svg>
                    Tambah Paket
                </a>
            </div>
        </div>
        @endif
    </div>
</body>
</html> 