<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pengaturan Media - Admin Panel</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    animation: {
                        'fade-in': 'fadeIn 0.3s ease-in-out',
                        'slide-up': 'slideUp 0.3s ease-out',
                        'bounce-in': 'bounceIn 0.4s ease-out'
                    },
                    keyframes: {
                        fadeIn: {
                            '0%': { opacity: '0' },
                            '100%': { opacity: '1' }
                        },
                        slideUp: {
                            '0%': { transform: 'translateY(10px)', opacity: '0' },
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
<body class="bg-gradient-to-br from-blue-50 via-indigo-50 to-purple-50 min-h-screen">
    <!-- Navigation -->
    <nav class="bg-white/80 backdrop-blur-md shadow-xl border-b border-gray-200/50 sticky top-0 z-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16">
                <div class="flex items-center">
                    <div class="flex-shrink-0">
                        <h1 class="text-2xl font-bold bg-gradient-to-r from-blue-600 via-purple-600 to-indigo-600 bg-clip-text text-transparent hover:from-blue-700 hover:via-purple-700 hover:to-indigo-700 transition-all duration-300">
                            Srikandi Tour And Travel Admin
                        </h1>
                    </div>
                </div>
                
                <div class="flex items-center space-x-4">
                    <div class="flex items-center space-x-2 bg-gradient-to-r from-green-100 to-blue-100 px-4 py-2 rounded-full">
                        <div class="w-2 h-2 bg-green-500 rounded-full animate-pulse"></div>
                        <span class="text-gray-700 font-medium">Selamat datang, Admin!</span>
                    </div>
                    <form action="{{ route('admin.logout') }}" method="POST" class="inline">
                        @csrf
                        <button type="submit" class="bg-gradient-to-r from-red-500 to-red-600 text-white px-6 py-2 rounded-lg hover:from-red-600 hover:to-red-700 transition-all duration-300 font-medium shadow-lg hover:shadow-xl transform hover:-translate-y-0.5">
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
            <div class="bg-gradient-to-r from-white to-blue-50 rounded-2xl p-8 shadow-xl border border-gray-100">
                <div class="flex items-center justify-between">
                    <div>
                        <h1 class="text-5xl font-bold bg-gradient-to-r from-gray-900 via-blue-800 to-purple-800 bg-clip-text text-transparent mb-4">Pengaturan Media</h1>
                        <p class="text-xl text-gray-600">Kelola logo dan background untuk website</p>
                    </div>
                    <a href="{{ route('admin.dashboard') }}" 
                       class="bg-gradient-to-r from-gray-500 to-gray-600 text-white px-6 py-3 rounded-lg hover:from-gray-600 hover:to-gray-700 transition-all duration-300 font-medium shadow-lg hover:shadow-xl transform hover:-translate-y-0.5">
                        <svg class="w-5 h-5 inline mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                        </svg>
                        Kembali ke Dashboard
                    </a>
                </div>
            </div>
        </div>

        <!-- Success/Error Messages -->
        @if(session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-6 py-4 rounded-lg mb-6 animate-bounce-in">
                <div class="flex items-center">
                    <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                    </svg>
                    <span class="font-semibold">{{ session('success') }}</span>
                </div>
            </div>
        @endif

        @if(session('error'))
            <div class="bg-red-100 border border-red-400 text-red-700 px-6 py-4 rounded-lg mb-6 animate-bounce-in">
                <div class="flex items-center">
                    <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"></path>
                    </svg>
                    <span class="font-semibold">{{ session('error') }}</span>
                </div>
            </div>
        @endif

        <!-- Main Form -->
        <form action="{{ route('admin.media.update') }}" method="POST" enctype="multipart/form-data" id="mediaForm">
            @csrf
            
            <!-- Logo Section -->
            <div class="bg-white/80 backdrop-blur-md rounded-2xl shadow-xl p-8 mb-8 border border-gray-100 animate-slide-up">
                <div class="flex items-center mb-6">
                    <div class="w-12 h-12 bg-gradient-to-br from-blue-500 to-blue-600 rounded-xl flex items-center justify-center shadow-lg mr-4">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                        </svg>
                    </div>
                    <h2 class="text-3xl font-bold bg-gradient-to-r from-blue-600 to-purple-600 bg-clip-text text-transparent">Logo Website</h2>
                </div>
                
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                    <!-- Travel Logo -->
                    <div class="space-y-4">
                        <div class="flex items-center justify-between">
                            <h3 class="text-xl font-semibold text-gray-900">Logo Travel</h3>
                            <span class="text-xs text-white bg-gradient-to-r from-blue-500 to-blue-600 px-3 py-1 rounded-full font-medium">Travel Mode</span>
                        </div>
                        
                        @if(isset($mediaSettings['travel_logo']))
                            <div class="mb-4 p-4 bg-gradient-to-r from-blue-50 to-indigo-50 rounded-xl border border-blue-200">
                                <img src="{{ asset('storage/' . $mediaSettings['travel_logo']) }}" 
                                     alt="Travel Logo" 
                                     class="max-w-full h-32 object-contain border rounded-lg">
                                <form action="{{ route('admin.media.delete') }}" method="POST" class="mt-3 delete-form">
                                    @csrf
                                    @method('DELETE')
                                    <input type="hidden" name="type" value="logo">
                                    <input type="hidden" name="mode" value="travel">
                                    <button type="submit" 
                                            class="bg-gradient-to-r from-red-500 to-red-600 text-white px-4 py-2 rounded-lg hover:from-red-600 hover:to-red-700 transition-all duration-300 font-medium shadow-lg hover:shadow-xl transform hover:-translate-y-0.5">
                                        <svg class="w-4 h-4 inline mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                        </svg>
                                        Hapus Logo
                                    </button>
                                </form>
                            </div>
                        @endif
                        
                        <div class="border-2 border-dashed border-gray-300 rounded-xl p-6 text-center hover:border-blue-400 transition-all duration-300 bg-gradient-to-r from-gray-50 to-blue-50">
                            <svg class="mx-auto h-12 w-12 text-gray-400" stroke="currentColor" fill="none" viewBox="0 0 48 48">
                                <path d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                            <div class="mt-4">
                                <label for="travel_logo" class="cursor-pointer bg-gradient-to-r from-blue-500 to-blue-600 text-white px-6 py-3 rounded-lg hover:from-blue-600 hover:to-blue-700 transition-all duration-300 font-medium shadow-lg hover:shadow-xl transform hover:-translate-y-0.5">
                                    <svg class="w-5 h-5 inline mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"></path>
                                    </svg>
                                    Upload Logo Travel
                                </label>
                                <input type="file" name="travel_logo" id="travel_logo" accept="image/*" class="hidden" onchange="previewImage(this, 'travel_logo_preview')">
                            </div>
                            <p class="mt-3 text-sm text-gray-500">Format: JPG, PNG, GIF, SVG. Maksimal 5MB.</p>
                        </div>
                        
                        <!-- Preview -->
                        <div id="travel_logo_preview" class="hidden">
                            <div class="p-4 bg-gradient-to-r from-blue-50 to-indigo-50 rounded-xl border border-blue-200">
                                <h4 class="text-sm font-medium text-blue-800 mb-2">Preview:</h4>
                                <img id="travel_logo_preview_img" src="" alt="Preview" class="max-w-full h-32 object-contain border rounded-lg">
                            </div>
                        </div>
                    </div>

                    <!-- Umroh Logo -->
                    <div class="space-y-4">
                        <div class="flex items-center justify-between">
                            <h3 class="text-xl font-semibold text-gray-900">Logo Umroh</h3>
                            <span class="text-xs text-white bg-gradient-to-r from-green-500 to-green-600 px-3 py-1 rounded-full font-medium">Umroh Mode</span>
                        </div>
                        
                        @if(isset($mediaSettings['umroh_logo']))
                            <div class="mb-4 p-4 bg-gradient-to-r from-green-50 to-teal-50 rounded-xl border border-green-200">
                                <img src="{{ asset('storage/' . $mediaSettings['umroh_logo']) }}" 
                                     alt="Umroh Logo" 
                                     class="max-w-full h-32 object-contain border rounded-lg">
                                <form action="{{ route('admin.media.delete') }}" method="POST" class="mt-3 delete-form">
                                    @csrf
                                    @method('DELETE')
                                    <input type="hidden" name="type" value="logo">
                                    <input type="hidden" name="mode" value="umroh">
                                    <button type="submit" 
                                            class="bg-gradient-to-r from-red-500 to-red-600 text-white px-4 py-2 rounded-lg hover:from-red-600 hover:to-red-700 transition-all duration-300 font-medium shadow-lg hover:shadow-xl transform hover:-translate-y-0.5">
                                        <svg class="w-4 h-4 inline mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                        </svg>
                                        Hapus Logo
                                    </button>
                                </form>
                            </div>
                        @endif
                        
                        <div class="border-2 border-dashed border-gray-300 rounded-xl p-6 text-center hover:border-green-400 transition-all duration-300 bg-gradient-to-r from-gray-50 to-green-50">
                            <svg class="mx-auto h-12 w-12 text-gray-400" stroke="currentColor" fill="none" viewBox="0 0 48 48">
                                <path d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                            <div class="mt-4">
                                <label for="umroh_logo" class="cursor-pointer bg-gradient-to-r from-green-500 to-green-600 text-white px-6 py-3 rounded-lg hover:from-green-600 hover:to-green-700 transition-all duration-300 font-medium shadow-lg hover:shadow-xl transform hover:-translate-y-0.5">
                                    <svg class="w-5 h-5 inline mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"></path>
                                    </svg>
                                    Upload Logo Umroh
                                </label>
                                <input type="file" name="umroh_logo" id="umroh_logo" accept="image/*" class="hidden" onchange="previewImage(this, 'umroh_logo_preview')">
                            </div>
                            <p class="mt-3 text-sm text-gray-500">Format: JPG, PNG, GIF, SVG. Maksimal 5MB.</p>
                        </div>
                        
                        <!-- Preview -->
                        <div id="umroh_logo_preview" class="hidden">
                            <div class="p-4 bg-gradient-to-r from-green-50 to-teal-50 rounded-xl border border-green-200">
                                <h4 class="text-sm font-medium text-green-800 mb-2">Preview:</h4>
                                <img id="umroh_logo_preview_img" src="" alt="Preview" class="max-w-full h-32 object-contain border rounded-lg">
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Background Section -->
            <div class="bg-white/80 backdrop-blur-md rounded-2xl shadow-xl p-8 mb-8 border border-gray-100 animate-slide-up">
                <div class="flex items-center mb-6">
                    <div class="w-12 h-12 bg-gradient-to-br from-purple-500 to-purple-600 rounded-xl flex items-center justify-center shadow-lg mr-4">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                        </svg>
                    </div>
                    <h2 class="text-3xl font-bold bg-gradient-to-r from-purple-600 to-pink-600 bg-clip-text text-transparent">Background Website</h2>
                </div>
                
                <!-- Travel Backgrounds -->
                <div class="mb-8">
                    <h3 class="text-2xl font-bold text-blue-600 mb-4">Background Travel Mode</h3>
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                    <!-- Desktop Background -->
                    <div class="space-y-4">
                        <div class="flex items-center justify-between">
                            <h3 class="text-lg font-semibold text-gray-900">Desktop</h3>
                            <span class="text-xs text-white bg-gradient-to-r from-blue-500 to-blue-600 px-2 py-1 rounded-full">1920x1080</span>
                        </div>
                        
                        @if(isset($mediaSettings['desktop_background']))
                            <div class="mb-4 p-3 bg-gradient-to-r from-blue-50 to-indigo-50 rounded-xl border border-blue-200">
                                <img src="{{ asset('storage/' . $mediaSettings['desktop_background']) }}" 
                                     alt="Desktop Background" 
                                     class="w-full h-24 object-cover border rounded-lg">
                                <form action="{{ route('admin.media.delete') }}" method="POST" class="mt-2 delete-form">
                                    @csrf
                                    @method('DELETE')
                                    <input type="hidden" name="type" value="background">
                                    <input type="hidden" name="mode" value="desktop">
                                    <button type="submit" 
                                            class="bg-gradient-to-r from-red-500 to-red-600 text-white px-3 py-1 rounded-lg hover:from-red-600 hover:to-red-700 transition-all duration-300 text-sm font-medium shadow-lg hover:shadow-xl transform hover:-translate-y-0.5">
                                        <svg class="w-4 h-4 inline mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                        </svg>
                                        Hapus
                                    </button>
                                </form>
                            </div>
                        @endif
                        
                        <div class="border-2 border-dashed border-gray-300 rounded-xl p-4 text-center hover:border-blue-400 transition-all duration-300 bg-gradient-to-r from-gray-50 to-blue-50">
                            <svg class="mx-auto h-8 w-8 text-gray-400" stroke="currentColor" fill="none" viewBox="0 0 48 48">
                                <path d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                            <div class="mt-2">
                                <label for="desktop_background" class="cursor-pointer bg-gradient-to-r from-blue-500 to-blue-600 text-white px-4 py-2 rounded-lg hover:from-blue-600 hover:to-blue-700 transition-all duration-300 text-sm font-medium shadow-lg hover:shadow-xl transform hover:-translate-y-0.5">
                                    Upload
                                </label>
                                <input type="file" name="desktop_background" id="desktop_background" accept="image/*" class="hidden" onchange="previewImage(this, 'desktop_background_preview')">
                            </div>
                        </div>
                        
                        <!-- Preview -->
                        <div id="desktop_background_preview" class="hidden">
                            <div class="p-2 bg-gradient-to-r from-blue-50 to-indigo-50 rounded-xl border border-blue-200">
                                <h4 class="text-xs font-medium text-blue-800 mb-1">Preview:</h4>
                                <img id="desktop_background_preview_img" src="" alt="Preview" class="w-full h-20 object-cover border rounded-lg">
                            </div>
                        </div>
                    </div>

                    <!-- Tablet Background -->
                    <div class="space-y-4">
                        <div class="flex items-center justify-between">
                            <h3 class="text-lg font-semibold text-gray-900">Tablet (Landscape)</h3>
                            <span class="text-xs text-white bg-gradient-to-r from-green-500 to-green-600 px-2 py-1 rounded-full">1024x768</span>
                        </div>
                        
                        @if(isset($mediaSettings['tablet_background']))
                            <div class="mb-4 p-3 bg-gradient-to-r from-green-50 to-teal-50 rounded-xl border border-green-200">
                                <img src="{{ asset('storage/' . $mediaSettings['tablet_background']) }}" 
                                     alt="Tablet Background" 
                                     class="w-full h-24 object-cover border rounded-lg">
                                <form action="{{ route('admin.media.delete') }}" method="POST" class="mt-2 delete-form">
                                    @csrf
                                    @method('DELETE')
                                    <input type="hidden" name="type" value="background">
                                    <input type="hidden" name="mode" value="tablet">
                                    <button type="submit" 
                                            class="bg-gradient-to-r from-red-500 to-red-600 text-white px-3 py-1 rounded-lg hover:from-red-600 hover:to-red-700 transition-all duration-300 text-sm font-medium shadow-lg hover:shadow-xl transform hover:-translate-y-0.5">
                                        <svg class="w-4 h-4 inline mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                        </svg>
                                        Hapus
                                    </button>
                                </form>
                            </div>
                        @endif
                        
                        <div class="border-2 border-dashed border-gray-300 rounded-xl p-4 text-center hover:border-green-400 transition-all duration-300 bg-gradient-to-r from-gray-50 to-green-50">
                            <svg class="mx-auto h-8 w-8 text-gray-400" stroke="currentColor" fill="none" viewBox="0 0 48 48">
                                <path d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                            <div class="mt-2">
                                <label for="tablet_background" class="cursor-pointer bg-gradient-to-r from-green-500 to-green-600 text-white px-4 py-2 rounded-lg hover:from-green-600 hover:to-green-700 transition-all duration-300 text-sm font-medium shadow-lg hover:shadow-xl transform hover:-translate-y-0.5">
                                    Upload
                                </label>
                                <input type="file" name="tablet_background" id="tablet_background" accept="image/*" class="hidden" onchange="previewImage(this, 'tablet_background_preview')">
                            </div>
                        </div>
                        
                        <!-- Preview -->
                        <div id="tablet_background_preview" class="hidden">
                            <div class="p-2 bg-gradient-to-r from-green-50 to-teal-50 rounded-xl border border-green-200">
                                <h4 class="text-xs font-medium text-green-800 mb-1">Preview:</h4>
                                <img id="tablet_background_preview_img" src="" alt="Preview" class="w-full h-20 object-cover border rounded-lg">
                            </div>
                        </div>
                    </div>

                    <!-- Mobile Portrait Background -->
                    <div class="space-y-4">
                        <div class="flex items-center justify-between">
                            <h3 class="text-lg font-semibold text-gray-900">Mobile (Portrait)</h3>
                            <span class="text-xs text-white bg-gradient-to-r from-yellow-500 to-yellow-600 px-2 py-1 rounded-full">375x667</span>
                        </div>
                        
                        @if(isset($mediaSettings['mobile_portrait_background']))
                            <div class="mb-4 p-3 bg-gradient-to-r from-yellow-50 to-orange-50 rounded-xl border border-yellow-200">
                                <img src="{{ asset('storage/' . $mediaSettings['mobile_portrait_background']) }}" 
                                     alt="Mobile Portrait Background" 
                                     class="w-full h-24 object-cover border rounded-lg">
                                <form action="{{ route('admin.media.delete') }}" method="POST" class="mt-2 delete-form">
                                    @csrf
                                    @method('DELETE')
                                    <input type="hidden" name="type" value="background">
                                    <input type="hidden" name="mode" value="mobile_portrait">
                                    <button type="submit" 
                                            class="bg-gradient-to-r from-red-500 to-red-600 text-white px-3 py-1 rounded-lg hover:from-red-600 hover:to-red-700 transition-all duration-300 text-sm font-medium shadow-lg hover:shadow-xl transform hover:-translate-y-0.5">
                                        <svg class="w-4 h-4 inline mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                        </svg>
                                        Hapus
                                    </button>
                                </form>
                            </div>
                        @endif
                        
                        <div class="border-2 border-dashed border-gray-300 rounded-xl p-4 text-center hover:border-yellow-400 transition-all duration-300 bg-gradient-to-r from-gray-50 to-yellow-50">
                            <svg class="mx-auto h-8 w-8 text-gray-400" stroke="currentColor" fill="none" viewBox="0 0 48 48">
                                <path d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                            <div class="mt-2">
                                <label for="mobile_portrait_background" class="cursor-pointer bg-gradient-to-r from-yellow-500 to-yellow-600 text-white px-4 py-2 rounded-lg hover:from-yellow-600 hover:to-yellow-700 transition-all duration-300 text-sm font-medium shadow-lg hover:shadow-xl transform hover:-translate-y-0.5">
                                    Upload
                                </label>
                                <input type="file" name="mobile_portrait_background" id="mobile_portrait_background" accept="image/*" class="hidden" onchange="previewImage(this, 'mobile_portrait_background_preview')">
                            </div>
                        </div>
                        
                        <!-- Preview -->
                        <div id="mobile_portrait_background_preview" class="hidden">
                            <div class="p-2 bg-gradient-to-r from-yellow-50 to-orange-50 rounded-xl border border-yellow-200">
                                <h4 class="text-xs font-medium text-yellow-800 mb-1">Preview:</h4>
                                <img id="mobile_portrait_background_preview_img" src="" alt="Preview" class="w-full h-20 object-cover border rounded-lg">
                            </div>
                        </div>
                    </div>

                    <!-- Mobile Landscape Background -->
                    <div class="space-y-4">
                        <div class="flex items-center justify-between">
                            <h3 class="text-lg font-semibold text-gray-900">Mobile (Landscape)</h3>
                            <span class="text-xs text-white bg-gradient-to-r from-purple-500 to-purple-600 px-2 py-1 rounded-full">667x375</span>
                        </div>
                        
                        @if(isset($mediaSettings['mobile_landscape_background']))
                            <div class="mb-4 p-3 bg-gradient-to-r from-purple-50 to-pink-50 rounded-xl border border-purple-200">
                                <img src="{{ asset('storage/' . $mediaSettings['mobile_landscape_background']) }}" 
                                     alt="Mobile Landscape Background" 
                                     class="w-full h-24 object-cover border rounded-lg">
                                <form action="{{ route('admin.media.delete') }}" method="POST" class="mt-2 delete-form">
                                    @csrf
                                    @method('DELETE')
                                    <input type="hidden" name="type" value="background">
                                    <input type="hidden" name="mode" value="mobile_landscape">
                                    <button type="submit" 
                                            class="bg-gradient-to-r from-red-500 to-red-600 text-white px-3 py-1 rounded-lg hover:from-red-600 hover:to-red-700 transition-all duration-300 text-sm font-medium shadow-lg hover:shadow-xl transform hover:-translate-y-0.5">
                                        <svg class="w-4 h-4 inline mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                        </svg>
                                        Hapus
                                    </button>
                                </form>
                            </div>
                        @endif
                        
                        <div class="border-2 border-dashed border-gray-300 rounded-xl p-4 text-center hover:border-purple-400 transition-all duration-300 bg-gradient-to-r from-gray-50 to-purple-50">
                            <svg class="mx-auto h-8 w-8 text-gray-400" stroke="currentColor" fill="none" viewBox="0 0 48 48">
                                <path d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                            <div class="mt-2">
                                <label for="mobile_landscape_background" class="cursor-pointer bg-gradient-to-r from-purple-500 to-purple-600 text-white px-4 py-2 rounded-lg hover:from-purple-600 hover:to-purple-700 transition-all duration-300 text-sm font-medium shadow-lg hover:shadow-xl transform hover:-translate-y-0.5">
                                    Upload
                                </label>
                                <input type="file" name="mobile_landscape_background" id="mobile_landscape_background" accept="image/*" class="hidden" onchange="previewImage(this, 'mobile_landscape_background_preview')">
                            </div>
                        </div>
                        
                        <!-- Preview -->
                        <div id="mobile_landscape_background_preview" class="hidden">
                            <div class="p-2 bg-gradient-to-r from-purple-50 to-pink-50 rounded-xl border border-purple-200">
                                <h4 class="text-xs font-medium text-purple-800 mb-1">Preview:</h4>
                                <img id="mobile_landscape_background_preview_img" src="" alt="Preview" class="w-full h-20 object-cover border rounded-lg">
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Umroh Backgrounds -->
                <div class="mb-8">
                    <h3 class="text-2xl font-bold text-green-600 mb-4">Background Umroh Mode</h3>
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                        <!-- Desktop Background Umroh -->
                        <div class="space-y-4">
                            <div class="flex items-center justify-between">
                                <h3 class="text-lg font-semibold text-gray-900">Desktop</h3>
                                <span class="text-xs text-white bg-gradient-to-r from-green-500 to-green-600 px-2 py-1 rounded-full">1920x1080</span>
                            </div>
                            
                            @if(isset($mediaSettings['umroh_desktop_background']))
                                <div class="mb-4 p-3 bg-gradient-to-r from-green-50 to-teal-50 rounded-xl border border-green-200">
                                    <img src="{{ asset('storage/' . $mediaSettings['umroh_desktop_background']) }}" 
                                         alt="Umroh Desktop Background" 
                                         class="w-full h-24 object-cover border rounded-lg">
                                    <form action="{{ route('admin.media.delete') }}" method="POST" class="mt-2 delete-form">
                                        @csrf
                                        @method('DELETE')
                                        <input type="hidden" name="type" value="background">
                                        <input type="hidden" name="mode" value="umroh_desktop">
                                        <button type="submit" 
                                                class="bg-gradient-to-r from-red-500 to-red-600 text-white px-3 py-1 rounded-lg hover:from-red-600 hover:to-red-700 transition-all duration-300 text-sm font-medium shadow-lg hover:shadow-xl transform hover:-translate-y-0.5">
                                            <svg class="w-4 h-4 inline mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                            </svg>
                                            Hapus
                                        </button>
                                    </form>
                                </div>
                            @endif
                            
                            <div class="border-2 border-dashed border-gray-300 rounded-xl p-4 text-center hover:border-green-400 transition-all duration-300 bg-gradient-to-r from-gray-50 to-green-50">
                                <svg class="mx-auto h-8 w-8 text-gray-400" stroke="currentColor" fill="none" viewBox="0 0 48 48">
                                    <path d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                                <div class="mt-2">
                                    <label for="umroh_desktop_background" class="cursor-pointer bg-gradient-to-r from-green-500 to-green-600 text-white px-4 py-2 rounded-lg hover:from-green-600 hover:to-green-700 transition-all duration-300 text-sm font-medium shadow-lg hover:shadow-xl transform hover:-translate-y-0.5">
                                        Upload
                                    </label>
                                    <input type="file" name="umroh_desktop_background" id="umroh_desktop_background" accept="image/*" class="hidden" onchange="previewImage(this, 'umroh_desktop_background_preview')">
                                </div>
                            </div>
                            
                            <!-- Preview -->
                            <div id="umroh_desktop_background_preview" class="hidden">
                                <div class="p-2 bg-gradient-to-r from-green-50 to-teal-50 rounded-xl border border-green-200">
                                    <h4 class="text-xs font-medium text-green-800 mb-1">Preview:</h4>
                                    <img id="umroh_desktop_background_preview_img" src="" alt="Preview" class="w-full h-20 object-cover border rounded-lg">
                                </div>
                            </div>
                        </div>

                        <!-- Tablet Background Umroh -->
                        <div class="space-y-4">
                            <div class="flex items-center justify-between">
                                <h3 class="text-lg font-semibold text-gray-900">Tablet (Landscape)</h3>
                                <span class="text-xs text-white bg-gradient-to-r from-green-500 to-green-600 px-2 py-1 rounded-full">1024x768</span>
                            </div>
                            
                            @if(isset($mediaSettings['umroh_tablet_background']))
                                <div class="mb-4 p-3 bg-gradient-to-r from-green-50 to-teal-50 rounded-xl border border-green-200">
                                    <img src="{{ asset('storage/' . $mediaSettings['umroh_tablet_background']) }}" 
                                         alt="Umroh Tablet Background" 
                                         class="w-full h-24 object-cover border rounded-lg">
                                    <form action="{{ route('admin.media.delete') }}" method="POST" class="mt-2 delete-form">
                                        @csrf
                                        @method('DELETE')
                                        <input type="hidden" name="type" value="background">
                                        <input type="hidden" name="mode" value="umroh_tablet">
                                        <button type="submit" 
                                                class="bg-gradient-to-r from-red-500 to-red-600 text-white px-3 py-1 rounded-lg hover:from-red-600 hover:to-red-700 transition-all duration-300 text-sm font-medium shadow-lg hover:shadow-xl transform hover:-translate-y-0.5">
                                            <svg class="w-4 h-4 inline mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                            </svg>
                                            Hapus
                                        </button>
                                    </form>
                                </div>
                            @endif
                            
                            <div class="border-2 border-dashed border-gray-300 rounded-xl p-4 text-center hover:border-green-400 transition-all duration-300 bg-gradient-to-r from-gray-50 to-green-50">
                                <svg class="mx-auto h-8 w-8 text-gray-400" stroke="currentColor" fill="none" viewBox="0 0 48 48">
                                    <path d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                                <div class="mt-2">
                                    <label for="umroh_tablet_background" class="cursor-pointer bg-gradient-to-r from-green-500 to-green-600 text-white px-4 py-2 rounded-lg hover:from-green-600 hover:to-green-700 transition-all duration-300 text-sm font-medium shadow-lg hover:shadow-xl transform hover:-translate-y-0.5">
                                        Upload
                                    </label>
                                    <input type="file" name="umroh_tablet_background" id="umroh_tablet_background" accept="image/*" class="hidden" onchange="previewImage(this, 'umroh_tablet_background_preview')">
                                </div>
                            </div>
                            
                            <!-- Preview -->
                            <div id="umroh_tablet_background_preview" class="hidden">
                                <div class="p-2 bg-gradient-to-r from-green-50 to-teal-50 rounded-xl border border-green-200">
                                    <h4 class="text-xs font-medium text-green-800 mb-1">Preview:</h4>
                                    <img id="umroh_tablet_background_preview_img" src="" alt="Preview" class="w-full h-20 object-cover border rounded-lg">
                                </div>
                            </div>
                        </div>

                        <!-- Mobile Portrait Background Umroh -->
                        <div class="space-y-4">
                            <div class="flex items-center justify-between">
                                <h3 class="text-lg font-semibold text-gray-900">Mobile (Portrait)</h3>
                                <span class="text-xs text-white bg-gradient-to-r from-green-500 to-green-600 px-2 py-1 rounded-full">375x667</span>
                            </div>
                            
                            @if(isset($mediaSettings['umroh_mobile_portrait_background']))
                                <div class="mb-4 p-3 bg-gradient-to-r from-green-50 to-teal-50 rounded-xl border border-green-200">
                                    <img src="{{ asset('storage/' . $mediaSettings['umroh_mobile_portrait_background']) }}" 
                                         alt="Umroh Mobile Portrait Background" 
                                         class="w-full h-24 object-cover border rounded-lg">
                                    <form action="{{ route('admin.media.delete') }}" method="POST" class="mt-2 delete-form">
                                        @csrf
                                        @method('DELETE')
                                        <input type="hidden" name="type" value="background">
                                        <input type="hidden" name="mode" value="umroh_mobile_portrait">
                                        <button type="submit" 
                                                class="bg-gradient-to-r from-red-500 to-red-600 text-white px-3 py-1 rounded-lg hover:from-red-600 hover:to-red-700 transition-all duration-300 text-sm font-medium shadow-lg hover:shadow-xl transform hover:-translate-y-0.5">
                                            <svg class="w-4 h-4 inline mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                            </svg>
                                            Hapus
                                        </button>
                                    </form>
                                </div>
                            @endif
                            
                            <div class="border-2 border-dashed border-gray-300 rounded-xl p-4 text-center hover:border-green-400 transition-all duration-300 bg-gradient-to-r from-gray-50 to-green-50">
                                <svg class="mx-auto h-8 w-8 text-gray-400" stroke="currentColor" fill="none" viewBox="0 0 48 48">
                                    <path d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                                <div class="mt-2">
                                    <label for="umroh_mobile_portrait_background" class="cursor-pointer bg-gradient-to-r from-green-500 to-green-600 text-white px-4 py-2 rounded-lg hover:from-green-600 hover:to-green-700 transition-all duration-300 text-sm font-medium shadow-lg hover:shadow-xl transform hover:-translate-y-0.5">
                                        Upload
                                    </label>
                                    <input type="file" name="umroh_mobile_portrait_background" id="umroh_mobile_portrait_background" accept="image/*" class="hidden" onchange="previewImage(this, 'umroh_mobile_portrait_background_preview')">
                                </div>
                            </div>
                            
                            <!-- Preview -->
                            <div id="umroh_mobile_portrait_background_preview" class="hidden">
                                <div class="p-2 bg-gradient-to-r from-green-50 to-teal-50 rounded-xl border border-green-200">
                                    <h4 class="text-xs font-medium text-green-800 mb-1">Preview:</h4>
                                    <img id="umroh_mobile_portrait_background_preview_img" src="" alt="Preview" class="w-full h-20 object-cover border rounded-lg">
                                </div>
                            </div>
                        </div>

                        <!-- Mobile Landscape Background Umroh -->
                        <div class="space-y-4">
                            <div class="flex items-center justify-between">
                                <h3 class="text-lg font-semibold text-gray-900">Mobile (Landscape)</h3>
                                <span class="text-xs text-white bg-gradient-to-r from-green-500 to-green-600 px-2 py-1 rounded-full">667x375</span>
                            </div>
                            
                            @if(isset($mediaSettings['umroh_mobile_landscape_background']))
                                <div class="mb-4 p-3 bg-gradient-to-r from-green-50 to-teal-50 rounded-xl border border-green-200">
                                    <img src="{{ asset('storage/' . $mediaSettings['umroh_mobile_landscape_background']) }}" 
                                         alt="Umroh Mobile Landscape Background" 
                                         class="w-full h-24 object-cover border rounded-lg">
                                    <form action="{{ route('admin.media.delete') }}" method="POST" class="mt-2 delete-form">
                                        @csrf
                                        @method('DELETE')
                                        <input type="hidden" name="type" value="background">
                                        <input type="hidden" name="mode" value="umroh_mobile_landscape">
                                        <button type="submit" 
                                                class="bg-gradient-to-r from-red-500 to-red-600 text-white px-3 py-1 rounded-lg hover:from-red-600 hover:to-red-700 transition-all duration-300 text-sm font-medium shadow-lg hover:shadow-xl transform hover:-translate-y-0.5">
                                            <svg class="w-4 h-4 inline mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                            </svg>
                                            Hapus
                                        </button>
                                    </form>
                                </div>
                            @endif
                            
                            <div class="border-2 border-dashed border-gray-300 rounded-xl p-4 text-center hover:border-green-400 transition-all duration-300 bg-gradient-to-r from-gray-50 to-green-50">
                                <svg class="mx-auto h-8 w-8 text-gray-400" stroke="currentColor" fill="none" viewBox="0 0 48 48">
                                    <path d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                                <div class="mt-2">
                                    <label for="umroh_mobile_landscape_background" class="cursor-pointer bg-gradient-to-r from-green-500 to-green-600 text-white px-4 py-2 rounded-lg hover:from-green-600 hover:to-green-700 transition-all duration-300 text-sm font-medium shadow-lg hover:shadow-xl transform hover:-translate-y-0.5">
                                        Upload
                                    </label>
                                    <input type="file" name="umroh_mobile_landscape_background" id="umroh_mobile_landscape_background" accept="image/*" class="hidden" onchange="previewImage(this, 'umroh_mobile_landscape_background_preview')">
                                </div>
                            </div>
                            
                            <!-- Preview -->
                            <div id="umroh_mobile_landscape_background_preview" class="hidden">
                                <div class="p-2 bg-gradient-to-r from-green-50 to-teal-50 rounded-xl border border-green-200">
                                    <h4 class="text-xs font-medium text-green-800 mb-1">Preview:</h4>
                                    <img id="umroh_mobile_landscape_background_preview_img" src="" alt="Preview" class="w-full h-20 object-cover border rounded-lg">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Submit Button -->
            <div class="flex justify-end">
                <button type="submit" 
                        class="bg-gradient-to-r from-blue-600 to-purple-600 text-white px-8 py-4 rounded-xl hover:from-blue-700 hover:to-purple-700 transition-all duration-300 font-semibold shadow-xl hover:shadow-2xl transform hover:-translate-y-1 text-lg"
                        id="submitBtn">
                    <svg class="w-6 h-6 inline mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                    </svg>
                    Simpan Pengaturan
                </button>
            </div>
        </form>
    </div>
</div>

<script>
function previewImage(input, previewId) {
    const preview = document.getElementById(previewId);
    const previewImg = document.getElementById(previewId + '_img');
    
    if (input.files && input.files[0]) {
        const reader = new FileReader();
        
        reader.onload = function(e) {
            previewImg.src = e.target.result;
            preview.classList.remove('hidden');
        }
        
        reader.readAsDataURL(input.files[0]);
    } else {
        preview.classList.add('hidden');
    }
}

// Fast form validation
document.addEventListener('DOMContentLoaded', function() {
    const form = document.getElementById('mediaForm');
    const submitBtn = document.getElementById('submitBtn');
    
    if (form) {
        console.log('Form found:', form);
        
        form.addEventListener('submit', function(e) {
            console.log('Form submit event triggered');
            
            // Check if any file is selected
            const fileInputs = form.querySelectorAll('input[type="file"]');
            let hasFiles = false;
            
            fileInputs.forEach(input => {
                if (input.files && input.files.length > 0) {
                    hasFiles = true;
                    console.log('File selected:', input.name, input.files[0].name);
                }
            });
            
            // Allow form submission even without files (for settings update)
            console.log('Form will submit');
            
            // Add loading state
            submitBtn.disabled = true;
            submitBtn.innerHTML = '<svg class="animate-spin -ml-1 mr-3 h-6 w-6 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"><circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle><path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path></svg>Menyimpan...';
            
            return true;
        });
    } else {
        console.error('Form not found!');
    }
    
    // Handle delete confirmation
    const deleteForms = document.querySelectorAll('.delete-form');
    deleteForms.forEach(form => {
        form.addEventListener('submit', function(e) {
            const confirmed = confirm('Yakin ingin menghapus media ini?');
            if (!confirmed) {
                e.preventDefault();
                return false;
            }
            return true;
        });
    });
    
    // Debug: Log all file inputs
    const fileInputs = document.querySelectorAll('input[type="file"]');
    console.log('Found file inputs:', fileInputs.length);
    fileInputs.forEach((input, index) => {
        console.log(`File input ${index + 1}:`, input.name, input.id);
    });
});
</script>
</body>
</html> 