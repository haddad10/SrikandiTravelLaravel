<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - Srikandi Travel</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        /* Mobile Responsive Styles */
        @media (max-width: 768px) {
            .mobile-nav { flex-direction: column; height: auto; padding: 1rem 0; }
            .mobile-nav-title { font-size: 1.25rem; margin-bottom: 0.5rem; }
            .mobile-nav-actions { flex-direction: column; gap: 0.5rem; width: 100%; }
            .mobile-welcome { font-size: 0.875rem; padding: 0.5rem 1rem; }
            .mobile-logout { width: 100%; justify-content: center; }
            .mobile-header { padding: 1.5rem; }
            .mobile-header h1 { font-size: 2.5rem; }
            .mobile-header p { font-size: 1rem; }
            .mobile-stats { grid-template-columns: 1fr; gap: 1rem; }
            .mobile-stats-card { padding: 1rem; }
            .mobile-stats-icon { width: 3rem; height: 3rem; }
            .mobile-stats-icon svg { width: 1.5rem; height: 1.5rem; }
            .mobile-stats-text { font-size: 1.5rem; }
            .mobile-features { grid-template-columns: 1fr; gap: 1rem; }
            .mobile-features-card { padding: 1.5rem; }
            .mobile-table { font-size: 0.75rem; }
            .mobile-table th, .mobile-table td { padding: 0.5rem; }
            .mobile-table-image { width: 3rem; height: 2.5rem; }
            .mobile-actions { flex-direction: column; gap: 0.25rem; }
            .mobile-actions button { font-size: 0.75rem; padding: 0.25rem 0.5rem; }
        }
        @media (min-width: 769px) and (max-width: 1024px) {
            .tablet-stats { grid-template-columns: repeat(2, 1fr); }
            .tablet-features { grid-template-columns: repeat(2, 1fr); }
        }
        @media (max-width: 1024px) {
            .container-padding { padding: 1rem; }
            .card-padding { padding: 1.5rem; }
        }
    </style>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    animation: {
                        'fade-in': 'fadeIn 0.5s ease-in-out',
                        'slide-up': 'slideUp 0.5s ease-out',
                        'bounce-in': 'bounceIn 0.6s ease-out'
                    },
                    keyframes: {
                        fadeIn: {
                            '0%': { opacity: '0' },
                            '100%': { opacity: '1' }
                        },
                        slideUp: {
                            '0%': { transform: 'translateY(20px)', opacity: '0' },
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
    <style>
        /* Mobile Responsive Styles */
        @media (max-width: 768px) {
            .mobile-nav {
                flex-direction: column;
                height: auto;
                padding: 1rem 0;
            }
            
            .mobile-nav-title {
                font-size: 1.25rem;
                margin-bottom: 0.5rem;
            }
            
            .mobile-nav-actions {
                flex-direction: column;
                gap: 0.5rem;
                width: 100%;
            }
            
            .mobile-welcome {
                font-size: 0.875rem;
                padding: 0.5rem 1rem;
            }
            
            .mobile-logout {
                width: 100%;
                justify-content: center;
            }
            
            .mobile-header {
                padding: 1.5rem;
            }
            
            .mobile-header h1 {
                font-size: 2.5rem;
            }
            
            .mobile-header p {
                font-size: 1rem;
            }
            
            .mobile-stats {
                grid-template-columns: 1fr;
                gap: 1rem;
            }
            
            .mobile-stats-card {
                padding: 1rem;
            }
            
            .mobile-stats-icon {
                width: 3rem;
                height: 3rem;
            }
            
            .mobile-stats-icon svg {
                width: 1.5rem;
                height: 1.5rem;
            }
            
            .mobile-stats-text {
                font-size: 1.5rem;
            }
            
            .mobile-features {
                grid-template-columns: 1fr;
                gap: 1rem;
            }
            
            .mobile-features-card {
                padding: 1.5rem;
            }
            
            .mobile-table {
                font-size: 0.75rem;
            }
            
            .mobile-table th,
            .mobile-table td {
                padding: 0.5rem;
            }
            
            .mobile-table-image {
                width: 3rem;
                height: 2.5rem;
            }
            
            .mobile-actions {
                flex-direction: column;
                gap: 0.25rem;
            }
            
            .mobile-actions button {
                font-size: 0.75rem;
                padding: 0.25rem 0.5rem;
            }
        }
        
        /* Tablet Responsive Styles */
        @media (min-width: 769px) and (max-width: 1024px) {
            .tablet-stats {
                grid-template-columns: repeat(2, 1fr);
            }
            
            .tablet-features {
                grid-template-columns: repeat(2, 1fr);
            }
        }
        
        /* Ensure proper spacing on all devices */
        @media (max-width: 1024px) {
            .container-padding {
                padding: 1rem;
            }
            
            .card-padding {
                padding: 1.5rem;
            }
        }
    </style>
</head>
<body class="bg-gradient-to-br from-blue-50 via-indigo-50 to-purple-50 min-h-screen">
    <!-- Navigation -->
    <nav class="bg-white/80 backdrop-blur-md shadow-xl border-b border-gray-200/50 sticky top-0 z-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16 mobile-nav">
                <div class="flex items-center">
                    <div class="flex-shrink-0">
                        <h1 class="text-2xl font-bold bg-gradient-to-r from-blue-600 via-purple-600 to-indigo-600 bg-clip-text text-transparent hover:from-blue-700 hover:via-purple-700 hover:to-indigo-700 transition-all duration-300 mobile-nav-title">
                            Srikandi Tour And Travel Admin
                        </h1>
                    </div>
                </div>
                
                <div class="flex items-center space-x-4 mobile-nav-actions">
                    <div class="flex items-center space-x-2 bg-gradient-to-r from-green-100 to-blue-100 px-4 py-2 rounded-full mobile-welcome">
                        <div class="w-2 h-2 bg-green-500 rounded-full animate-pulse"></div>
                        <span class="text-gray-700 font-medium">Selamat datang, Admin!</span>
                    </div>
                    <form action="{{ route('admin.logout') }}" method="POST" class="inline">
                        @csrf
                        <button type="submit" class="bg-gradient-to-r from-red-500 to-red-600 text-white px-6 py-2 rounded-lg hover:from-red-600 hover:to-red-700 transition-all duration-300 font-medium shadow-lg hover:shadow-xl transform hover:-translate-y-0.5 mobile-logout">
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
    <div class="max-w-7xl mx-auto py-8 px-4 sm:px-6 lg:px-8 container-padding">
        <!-- Page Header -->
        <div class="mb-8 animate-fade-in">
            <div class="bg-gradient-to-r from-white to-blue-50 rounded-2xl p-8 shadow-xl border border-gray-100 mobile-header">
                <h1 class="text-5xl font-bold bg-gradient-to-r from-gray-900 via-blue-800 to-purple-800 bg-clip-text text-transparent mb-4">Dashboard</h1>
                <p class="text-xl text-gray-600">Kelola website Srikandi Travel dengan mudah dan efisien</p>
                <div class="mt-4 flex items-center space-x-2">
                    <div class="w-3 h-3 bg-green-500 rounded-full animate-pulse"></div>
                    <span class="text-sm text-gray-500">Sistem berjalan dengan baik</span>
                </div>
            </div>
        </div>

        <!-- Stats Cards -->
        <div class="grid grid-cols-1 md:grid-cols-4 gap-8 mb-8 animate-slide-up mobile-stats tablet-stats">
            <div class="bg-gradient-to-br from-blue-50 to-blue-100 rounded-2xl shadow-xl p-6 border border-blue-200 hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-2 group mobile-stats-card">
                <div class="flex items-center justify-between">
                    <div class="flex items-center">
                        <div class="w-14 h-14 bg-gradient-to-br from-blue-500 to-blue-600 rounded-xl flex items-center justify-center shadow-lg group-hover:shadow-xl transition-all duration-300 mobile-stats-icon">
                            <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/>
                            </svg>
                        </div>
                        <div class="ml-4">
                            <p class="text-sm font-medium text-blue-600">Total Paket</p>
                            <p class="text-3xl font-bold text-blue-900 mobile-stats-text">{{ \App\Models\Package::count() }}</p>
                        </div>
                    </div>
                    <div class="text-right">
                        <div class="w-3 h-3 bg-blue-500 rounded-full animate-pulse"></div>
                    </div>
                </div>
            </div>

            <div class="bg-gradient-to-br from-green-50 to-green-100 rounded-2xl shadow-xl p-6 border border-green-200 hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-2 group mobile-stats-card">
                <div class="flex items-center justify-between">
                    <div class="flex items-center">
                        <div class="w-14 h-14 bg-gradient-to-br from-green-500 to-green-600 rounded-xl flex items-center justify-center shadow-lg group-hover:shadow-xl transition-all duration-300 mobile-stats-icon">
                            <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                            </svg>
                        </div>
                        <div class="ml-4">
                            <p class="text-sm font-medium text-green-600">Total Jadwal</p>
                            <p class="text-3xl font-bold text-green-900 mobile-stats-text">{{ \App\Models\Schedule::count() }}</p>
                        </div>
                    </div>
                    <div class="text-right">
                        <div class="w-3 h-3 bg-green-500 rounded-full animate-pulse"></div>
                    </div>
                </div>
            </div>

            <div class="bg-gradient-to-br from-purple-50 to-purple-100 rounded-2xl shadow-xl p-6 border border-purple-200 hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-2 group mobile-stats-card">
                <div class="flex items-center justify-between">
                    <div class="flex items-center">
                        <div class="w-14 h-14 bg-gradient-to-br from-purple-500 to-purple-600 rounded-xl flex items-center justify-center shadow-lg group-hover:shadow-xl transition-all duration-300 mobile-stats-icon">
                            <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 002 2z"/>
                            </svg>
                        </div>
                        <div class="ml-4">
                            <p class="text-sm font-medium text-purple-600">Total Galeri</p>
                            <p class="text-3xl font-bold text-purple-900 mobile-stats-text">{{ \App\Models\Gallery::count() }}</p>
                        </div>
                    </div>
                    <div class="text-right">
                        <div class="w-3 h-3 bg-purple-500 rounded-full animate-pulse"></div>
                    </div>
                </div>
            </div>

            <div class="bg-gradient-to-br from-orange-50 to-orange-100 rounded-2xl shadow-xl p-6 border border-orange-200 hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-2 group mobile-stats-card">
                <div class="flex items-center justify-between">
                    <div class="flex items-center">
                        <div class="w-14 h-14 bg-gradient-to-br from-orange-500 to-orange-600 rounded-xl flex items-center justify-center shadow-lg group-hover:shadow-xl transition-all duration-300 mobile-stats-icon">
                            <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197m13.5-9a2.5 2.5 0 11-5 0 2.5 2.5 0 015 0z"/>
                            </svg>
                        </div>
                        <div class="ml-4">
                            <p class="text-sm font-medium text-orange-600">Total Pelanggan</p>
                            <p class="text-3xl font-bold text-orange-900 mobile-stats-text">{{ \App\Models\Customer::count() }}</p>
                        </div>
                    </div>
                    <div class="text-right">
                        <div class="w-3 h-3 bg-orange-500 rounded-full animate-pulse"></div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Quick Actions -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8 mb-8 animate-slide-up mobile-features tablet-features">
            <a href="{{ route('admin.packages.index') }}" class="group">
                <div class="bg-gradient-to-br from-blue-500 via-blue-600 to-blue-700 text-white p-8 rounded-2xl hover:from-blue-600 hover:via-blue-700 hover:to-blue-800 transition-all duration-300 transform hover:scale-105 hover:shadow-2xl shadow-xl mobile-features-card">
                    <div class="flex items-center justify-between mb-4">
                        <div class="w-12 h-12 bg-white/20 rounded-xl flex items-center justify-center backdrop-blur-sm">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/>
                            </svg>
                        </div>
                        <svg class="w-6 h-6 text-blue-200 group-hover:text-white transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                        </svg>
                    </div>
                    <h4 class="text-xl font-bold mb-2">Kelola Paket</h4>
                    <p class="text-blue-100 text-sm leading-relaxed">Tambah, edit, dan hapus paket wisata</p>
                </div>
            </a>

            <a href="{{ route('admin.schedules.index') }}" class="group">
                <div class="bg-gradient-to-br from-green-500 via-green-600 to-green-700 text-white p-8 rounded-2xl hover:from-green-600 hover:via-green-700 hover:to-green-800 transition-all duration-300 transform hover:scale-105 hover:shadow-2xl shadow-xl mobile-features-card">
                    <div class="flex items-center justify-between mb-4">
                        <div class="w-12 h-12 bg-white/20 rounded-xl flex items-center justify-center backdrop-blur-sm">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                            </svg>
                        </div>
                        <svg class="w-6 h-6 text-green-200 group-hover:text-white transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                        </svg>
                    </div>
                    <h4 class="text-xl font-bold mb-2">Kelola Jadwal</h4>
                    <p class="text-green-100 text-sm leading-relaxed">Atur jadwal keberangkatan</p>
                </div>
            </a>

            <a href="{{ route('admin.customers.index') }}" class="group">
                <div class="bg-gradient-to-br from-orange-500 via-orange-600 to-orange-700 text-white p-8 rounded-2xl hover:from-orange-600 hover:via-orange-700 hover:to-orange-800 transition-all duration-300 transform hover:scale-105 hover:shadow-2xl shadow-xl mobile-features-card">
                    <div class="flex items-center justify-between mb-4">
                        <div class="w-12 h-12 bg-white/20 rounded-xl flex items-center justify-center backdrop-blur-sm">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197m13.5-9a2.5 2.5 0 11-5 0 2.5 2.5 0 015 0z"/>
                            </svg>
                        </div>
                        <svg class="w-6 h-6 text-orange-200 group-hover:text-white transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                        </svg>
                    </div>
                    <h4 class="text-xl font-bold mb-2">Pendataan Pelanggan</h4>
                    <p class="text-orange-100 text-sm leading-relaxed">Kelola data pelanggan per paket dengan rapi</p>
                </div>
            </a>
        </div>

        <!-- Recent Packages -->
        <div class="bg-gradient-to-br from-white to-gray-50 rounded-2xl shadow-xl p-8 border border-gray-100 animate-fade-in card-padding">
            <div class="flex items-center justify-between mb-8">
                <div>
                    <h3 class="text-3xl font-bold bg-gradient-to-r from-gray-900 to-blue-800 bg-clip-text text-transparent">Paket Terbaru</h3>
                    <p class="text-gray-600 mt-2">Daftar paket terbaru yang telah ditambahkan</p>
                </div>
                <a href="{{ route('admin.packages.index') }}" class="bg-gradient-to-r from-blue-500 to-blue-600 text-white px-6 py-3 rounded-xl hover:from-blue-600 hover:to-blue-700 transition-all duration-300 font-medium shadow-lg hover:shadow-xl transform hover:-translate-y-0.5">
                    <div class="flex items-center">
                        <span>Lihat Semua</span>
                        <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                        </svg>
                    </div>
                </a>
            </div>
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200 mobile-table">
                    <thead class="bg-gradient-to-r from-gray-50 to-gray-100">
                        <tr>
                            <th class="px-6 py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Gambar</th>
                            <th class="px-6 py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Nama Paket</th>
                            <th class="px-6 py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Destinasi</th>
                            <th class="px-6 py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Harga</th>
                            <th class="px-6 py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Status</th>
                            <th class="px-6 py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @foreach(\App\Models\Package::latest()->take(5)->get() as $package)
                        <tr class="hover:bg-gradient-to-r hover:from-blue-50 hover:to-indigo-50 transition-all duration-300">
                            <td class="px-6 py-4 whitespace-nowrap">
                                @if($package->image)
                                    <img src="{{ asset('storage/' . $package->image) }}" alt="{{ $package->name }}" class="w-20 h-16 object-cover rounded-xl shadow-md mobile-table-image">
                                @else
                                    <div class="w-20 h-16 bg-gradient-to-br from-gray-200 to-gray-300 rounded-xl flex items-center justify-center shadow-md mobile-table-image">
                                        <svg class="w-8 h-8 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 002 2z"/>
                                        </svg>
                                    </div>
                                @endif
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm font-semibold text-gray-900">{{ $package->name }}</div>
                                <div class="text-xs text-gray-500">{{ ucfirst($package->mode) }}</div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm text-gray-900">{{ $package->destination }}</div>
                                <div class="text-xs text-gray-500">{{ $package->duration }}</div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm font-semibold text-blue-600">Rp {{ number_format($package->price, 0, ',', '.') }}</div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <span class="px-3 py-1 inline-flex text-xs leading-5 font-semibold rounded-full 
                                    {{ $package->is_active ? 'bg-gradient-to-r from-green-100 to-green-200 text-green-800' : 'bg-gradient-to-r from-red-100 to-red-200 text-red-800' }}">
                                    {{ $package->is_active ? 'Aktif' : 'Nonaktif' }}
                                </span>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                <div class="flex space-x-3 mobile-actions">
                                    <a href="{{ route('admin.packages.edit', $package) }}" class="bg-gradient-to-r from-blue-500 to-blue-600 text-white px-3 py-1 rounded-lg hover:from-blue-600 hover:to-blue-700 transition-all duration-300 text-xs font-medium shadow-md hover:shadow-lg transform hover:-translate-y-0.5">
                                        Edit
                                    </a>
                                    <form action="{{ route('admin.packages.destroy', $package) }}" method="POST" class="inline" onsubmit="return confirm('Yakin ingin menghapus paket ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="bg-gradient-to-r from-red-500 to-red-600 text-white px-3 py-1 rounded-lg hover:from-red-600 hover:to-red-700 transition-all duration-300 text-xs font-medium shadow-md hover:shadow-lg transform hover:-translate-y-0.5">
                                            Hapus
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
</html> 