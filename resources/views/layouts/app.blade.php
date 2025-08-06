<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Srikandi Tour And Travel')</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="{{ asset('css/backgrounds.css') }}">
    <script>
        tailwind.config = {
            darkMode: 'class',
            theme: {
                extend: {}
            }
        }
    </script>
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <style>
        [x-cloak] { display: none !important; }
        
        /* Mobile Navigation Fixes */
        @media (max-width: 768px) {
            /* Ensure navigation has proper z-index */
            nav {
                position: relative !important;
                z-index: 50 !important;
            }
            
            /* Mobile menu container */
            .md\\:hidden {
                position: relative !important;
                z-index: 60 !important;
            }
            
            /* Mobile menu background */
            .md\\:hidden > div {
                background: rgba(255, 255, 255, 0.98) !important;
                backdrop-filter: blur(10px) !important;
                border-top: 1px solid rgba(0, 0, 0, 0.1) !important;
                box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1) !important;
            }
            
            .dark .md\\:hidden > div {
                background: rgba(31, 41, 55, 0.98) !important;
                border-top: 1px solid rgba(255, 255, 255, 0.1) !important;
            }
            
            /* Logo and text spacing for mobile */
            .flex-shrink-0 {
                flex-shrink: 0 !important;
                min-width: 0 !important;
                flex: 1 !important;
                max-width: calc(100% - 80px) !important; /* Maximum space for text */
            }
            
            .flex-shrink-0 a {
                font-size: 0.75rem !important;
                line-height: 1.25rem !important;
                white-space: nowrap !important;
                overflow: visible !important; /* Show full text */
                text-overflow: clip !important; /* Don't add ellipsis */
                display: block !important;
                width: 100% !important;
            }
            
            /* Ensure logo doesn't take too much space */
            .flex-shrink-0 img {
                height: 2.5rem !important;
                width: auto !important;
                margin-right: 0.5rem !important;
            }
            
            /* Ensure buttons don't overlap */
            .md\\:hidden.flex {
                flex-shrink: 0 !important;
                min-width: 80px !important;
                justify-content: flex-end !important;
            }
            
            /* Mobile button spacing */
            .md\\:hidden.flex button {
                margin-left: 0.125rem !important;
                padding: 0.25rem !important;
                font-size: 0.75rem !important;
            }
            
            /* Ensure logo doesn't take too much space */
            .flex-shrink-0 img {
                height: 1.75rem !important;
                width: auto !important;
                margin-right: 0.25rem !important;
            }
            
            /* Ensure proper flex layout */
            .flex.justify-between {
                align-items: center !important;
            }
            
            /* Better text display for mobile */
            .flex-shrink-0 a {
                font-weight: 600 !important;
                letter-spacing: -0.025em !important;
                word-break: keep-all !important;
                hyphens: none !important;
            }
            
            /* Force text to show completely */
            .flex-shrink-0 a {
                overflow: visible !important;
                text-overflow: clip !important;
                white-space: nowrap !important;
            }
            
            /* Responsive text sizing */
            @media (max-width: 480px) {
                .flex-shrink-0 a {
                    font-size: 0.6875rem !important;
                }
                
                .flex-shrink-0 {
                    max-width: calc(100% - 70px) !important;
                }
                
                .md\\:hidden.flex {
                    min-width: 70px !important;
                }
            }
            
            /* Mobile landscape specific */
            @media (orientation: landscape) {
                nav {
                    background: rgba(255, 255, 255, 0.95) !important;
                    backdrop-filter: blur(10px) !important;
                }
                
                .dark nav {
                    background: rgba(31, 41, 55, 0.95) !important;
                }
                
                /* More space for text in landscape */
                .flex-shrink-0 {
                    max-width: calc(100% - 140px) !important;
                }
                
                .flex-shrink-0 a {
                    font-size: 1.125rem !important;
                }
            }
            
            /* Mobile portrait specific */
            @media (orientation: portrait) {
                /* Ensure proper spacing */
                .flex-shrink-0 {
                    max-width: calc(100% - 80px) !important;
                }
                
                .flex-shrink-0 a {
                    font-size: 0.75rem !important;
                }
                
                /* Extra small screens */
                @media (max-width: 360px) {
                    .flex-shrink-0 a {
                        font-size: 0.625rem !important;
                    }
                    
                    .flex-shrink-0 {
                        max-width: calc(100% - 60px) !important;
                    }
                    
                    .md\\:hidden.flex {
                        min-width: 60px !important;
                    }
                }
            }
        }
    </style>
</head>
<body class="bg-gray-50 dark:bg-gray-900 transition-colors duration-300" 
      x-data="{ 
          mode: localStorage.getItem('mode') || 'travel',
          darkMode: localStorage.getItem('darkMode') === 'true'
      }" 
      x-init="
          $watch('mode', value => { 
              localStorage.setItem('mode', value); 
              location.reload(); 
          });
          $watch('darkMode', value => { 
              localStorage.setItem('darkMode', value); 
              if (value) {
                  document.documentElement.classList.add('dark');
              } else {
                  document.documentElement.classList.remove('dark');
              }
          });
          if (darkMode) {
              document.documentElement.classList.add('dark');
          }
      "
      :class="darkMode ? 'dark' : ''">
    <!-- Navigation -->
    <nav class="bg-white dark:bg-gray-800 shadow-lg transition-colors duration-300" x-data="{ mobileMenuOpen: false }">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16">
                <div class="flex items-center">
                    <div class="flex-shrink-0">
                        <!-- Logo -->
                        <div class="flex items-center space-x-3">
                            <div x-show="mode === 'travel'" class="flex items-center">
                                @if(isset($logos) && $logos['travel'])
                                    <img src="{{ $logos['travel'] }}" 
                                         alt="Srikandi Tour And Travel Logo" 
                                         class="h-16 w-auto mr-4">
                                @endif
                                <a href="{{ route('home') }}" class="text-2xl font-bold text-blue-600 dark:text-blue-400 hover:text-blue-700 dark:hover:text-blue-300 transition-colors duration-200">
                                    Srikandi Tour And Travel
                                </a>
                            </div>
                            <div x-show="mode === 'umroh'" class="flex items-center">
                                @if(isset($logos) && $logos['umroh'])
                                    <img src="{{ $logos['umroh'] }}" 
                                         alt="Srikandi Umroh Logo" 
                                         class="h-16 w-auto mr-4">
                                @endif
                                <a href="{{ route('home') }}" class="text-2xl font-bold text-orange-600 dark:text-orange-400 hover:text-orange-700 dark:hover:text-orange-300 transition-colors duration-200">
                                    Srikandi Umroh
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Desktop Navigation -->
                <div class="hidden md:flex items-center space-x-4">
                    <a href="{{ route('home') }}" class="text-gray-700 dark:text-gray-300 hover:text-blue-600 dark:hover:text-blue-400 px-3 py-2 rounded-md text-sm font-medium transition-colors duration-200">Beranda</a>
                    <a href="{{ route('packages') }}" class="text-gray-700 dark:text-gray-300 hover:text-blue-600 dark:hover:text-blue-400 px-3 py-2 rounded-md text-sm font-medium transition-colors duration-200">Paket</a>
                    <a href="{{ route('schedules') }}" class="text-gray-700 dark:text-gray-300 hover:text-blue-600 dark:hover:text-blue-400 px-3 py-2 rounded-md text-sm font-medium transition-colors duration-200">Jadwal</a>
                    <a href="{{ route('gallery') }}" class="text-gray-700 dark:text-gray-300 hover:text-blue-600 dark:hover:text-blue-400 px-3 py-2 rounded-md text-sm font-medium transition-colors duration-200">Galeri</a>
                    <a href="{{ route('contact') }}" class="text-gray-700 dark:text-gray-300 hover:text-blue-600 dark:hover:text-blue-400 px-3 py-2 rounded-md text-sm font-medium transition-colors duration-200">Kontak</a>
                    
                    <!-- Dark/Light Mode Toggle -->
                    <button @click="darkMode = !darkMode" 
                            class="p-2 rounded-lg transition-all duration-300"
                            :class="darkMode ? 'bg-gray-700 text-yellow-400 hover:bg-gray-600' : 'bg-gray-200 text-gray-700 hover:bg-gray-300'">
                        <svg x-show="!darkMode" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M17.293 13.293A8 8 0 016.707 2.707a8.001 8.001 0 1010.586 10.586z"></path>
                        </svg>
                        <svg x-show="darkMode" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 2a1 1 0 011 1v1a1 1 0 11-2 0V3a1 1 0 011-1zm4 8a4 4 0 11-8 0 4 4 0 018 0zm-.464 4.95l.707.707a1 1 0 001.414-1.414l-.707-.707a1 1 0 00-1.414 1.414zm2.12-10.607a1 1 0 010 1.414l-.706.707a1 1 0 11-1.414-1.414l.707-.707a1 1 0 011.414 0zM17 11a1 1 0 100-2h-1a1 1 0 100 2h1zm-7 4a1 1 0 011 1v1a1 1 0 11-2 0v-1a1 1 0 011-1zM5.05 6.464A1 1 0 106.465 5.05l-.708-.707a1 1 0 00-1.414 1.414l.707.707zm1.414 8.486l-.707.707a1 1 0 01-1.414-1.414l.707-.707a1 1 0 011.414 1.414zM4 11a1 1 0 100-2H3a1 1 0 000 2h1z" clip-rule="evenodd"></path>
                        </svg>
                    </button>
                    
                    <!-- Mode Switch Button -->
                    <button @click="mode = mode === 'travel' ? 'umroh' : 'travel'" 
                            class="px-4 py-2 rounded-lg font-semibold transition-all duration-300"
                            :class="mode === 'travel' ? 'bg-blue-600 text-white hover:bg-blue-700' : 'bg-orange-500 text-white hover:bg-orange-600'">
                        <span x-show="mode === 'travel'">Switch ke Umroh</span>
                        <span x-show="mode === 'umroh'">Switch ke Travel</span>
                    </button>
                </div>
                
                <!-- Mobile menu button -->
                <div class="md:hidden flex items-center space-x-2">
                    <!-- Dark/Light Mode Toggle (Mobile) -->
                    <button @click="darkMode = !darkMode" 
                            class="p-2 rounded-lg transition-all duration-300 z-10"
                            :class="darkMode ? 'bg-gray-700 text-yellow-400 hover:bg-gray-600' : 'bg-gray-200 text-gray-700 hover:bg-gray-300'">
                        <svg x-show="!darkMode" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M17.293 13.293A8 8 0 016.707 2.707a8.001 8.001 0 1010.586 10.586z"></path>
                        </svg>
                        <svg x-show="darkMode" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 2a1 1 0 011 1v1a1 1 0 11-2 0V3a1 1 0 011-1zm4 8a4 4 0 11-8 0 4 4 0 018 0zm-.464 4.95l.707.707a1 1 0 001.414-1.414l-.707-.707a1 1 0 00-1.414 1.414zm2.12-10.607a1 1 0 010 1.414l-.706.707a1 1 0 11-1.414-1.414l.707-.707a1 1 0 011.414 0zM17 11a1 1 0 100-2h-1a1 1 0 100 2h1zm-7 4a1 1 0 011 1v1a1 1 0 11-2 0v-1a1 1 0 011-1zM5.05 6.464A1 1 0 106.465 5.05l-.708-.707a1 1 0 00-1.414 1.414l.707.707zm1.414 8.486l-.707.707a1 1 0 01-1.414-1.414l.707-.707a1 1 0 011.414 1.414zM4 11a1 1 0 100-2H3a1 1 0 000 2h1z" clip-rule="evenodd"></path>
                        </svg>
                    </button>
                    
                    <button @click="mobileMenuOpen = !mobileMenuOpen" 
                            class="text-gray-700 dark:text-gray-300 hover:text-blue-600 dark:hover:text-blue-400 focus:outline-none focus:text-blue-600 dark:focus:text-blue-400 z-10">
                        <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        </svg>
                    </button>
                </div>
            </div>
            
            <!-- Mobile Navigation Menu -->
            <div x-show="mobileMenuOpen" 
                 x-transition:enter="transition ease-out duration-200"
                 x-transition:enter-start="opacity-0 transform -translate-y-2"
                 x-transition:enter-end="opacity-100 transform translate-y-0"
                 x-transition:leave="transition ease-in duration-150"
                 x-transition:leave-start="opacity-100 transform translate-y-0"
                 x-transition:leave-end="opacity-0 transform -translate-y-2"
                 class="md:hidden z-50">
                <div class="px-2 pt-2 pb-3 space-y-1 bg-white dark:bg-gray-800 border-t border-gray-200 dark:border-gray-700 shadow-lg">
                    <a href="{{ route('home') }}" 
                       class="block px-3 py-2 rounded-md text-base font-medium text-gray-700 dark:text-gray-300 hover:text-blue-600 dark:hover:text-blue-400 hover:bg-gray-50 dark:hover:bg-gray-700 transition-colors duration-200">
                        Beranda
                    </a>
                    <a href="{{ route('packages') }}" 
                       class="block px-3 py-2 rounded-md text-base font-medium text-gray-700 dark:text-gray-300 hover:text-blue-600 dark:hover:text-blue-400 hover:bg-gray-50 dark:hover:bg-gray-700 transition-colors duration-200">
                        Paket
                    </a>
                    <a href="{{ route('schedules') }}" 
                       class="block px-3 py-2 rounded-md text-base font-medium text-gray-700 dark:text-gray-300 hover:text-blue-600 dark:hover:text-blue-400 hover:bg-gray-50 dark:hover:bg-gray-700 transition-colors duration-200">
                        Jadwal
                    </a>
                    <a href="{{ route('gallery') }}" 
                       class="block px-3 py-2 rounded-md text-base font-medium text-gray-700 dark:text-gray-300 hover:text-blue-600 dark:hover:text-blue-400 hover:bg-gray-50 dark:hover:bg-gray-700 transition-colors duration-200">
                        Galeri
                    </a>
                    <a href="{{ route('contact') }}" 
                       class="block px-3 py-2 rounded-md text-base font-medium text-gray-700 dark:text-gray-300 hover:text-blue-600 dark:hover:text-blue-400 hover:bg-gray-50 dark:hover:bg-gray-700 transition-colors duration-200">
                        Kontak
                    </a>
                    
                    <!-- Mobile Mode Switch Button -->
                    <button @click="mode = mode === 'travel' ? 'umroh' : 'travel'" 
                            class="w-full text-left px-3 py-2 rounded-md text-base font-medium transition-all duration-300"
                            :class="mode === 'travel' ? 'bg-blue-600 text-white hover:bg-blue-700' : 'bg-orange-500 text-white hover:bg-orange-600'">
                        <span x-show="mode === 'travel'">Switch ke Umroh</span>
                        <span x-show="mode === 'umroh'">Switch ke Travel</span>
                    </button>
                </div>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <main class="transition-colors duration-300">
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="bg-gray-800 dark:bg-gray-900 text-white py-8 transition-colors duration-300">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
                <div>
                    <h3 class="text-lg font-semibold mb-4">
                        <span x-show="mode === 'travel'">Srikandi Tour And Travel</span>
                        <span x-show="mode === 'umroh'">Srikandi Umroh</span>
                    </h3>
                    <p class="text-gray-300 dark:text-gray-400">
                        <span x-show="mode === 'travel'">Layanan tour and travel terpercaya dengan pengalaman bertahun-tahun.</span>
                        <span x-show="mode === 'umroh'">Layanan umroh terpercaya dengan pembimbing berpengalaman.</span>
                    </p>
                </div>
                <div>
                    <h4 class="text-md font-semibold mb-4">Layanan</h4>
                    <ul class="space-y-2 text-gray-300 dark:text-gray-400">
                        <li x-show="mode === 'travel'"><a href="{{ route('packages') }}" class="hover:text-white dark:hover:text-white transition-colors duration-200">Paket Travel</a></li>
                        <li x-show="mode === 'umroh'"><a href="{{ route('packages') }}" class="hover:text-white dark:hover:text-white transition-colors duration-200">Paket Umroh</a></li>
                        <li><a href="{{ route('schedules') }}" class="hover:text-white dark:hover:text-white transition-colors duration-200">Jadwal Keberangkatan</a></li>
                    </ul>
                </div>
                <div>
                    <h4 class="text-md font-semibold mb-4">Informasi</h4>
                    <ul class="space-y-2 text-gray-300 dark:text-gray-400">
                        <li><a href="{{ route('about') }}" class="hover:text-white dark:hover:text-white transition-colors duration-200">About Us</a></li>
                        <li><a href="{{ route('terms') }}" class="hover:text-white dark:hover:text-white transition-colors duration-200">Terms</a></li>
                        <li><a href="{{ route('privacy') }}" class="hover:text-white dark:hover:text-white transition-colors duration-200">Privacy</a></li>
                        <li><a href="{{ route('contact') }}" class="hover:text-white dark:hover:text-white transition-colors duration-200">Kontak Kami</a></li>
                    </ul>
                </div>
                <div>
                    <h4 class="text-md font-semibold mb-4">Kontak</h4>
                    <div class="space-y-2 text-gray-300 dark:text-gray-400">
                        <p>📞 +62 812-3456-7890</p>
                        <p>📧 info@srikanditravel.com</p>
                        <p>📍 Jl. Sudirman No. 123, Jakarta</p>
                    </div>
                </div>
            </div>
            <div class="border-t border-gray-700 dark:border-gray-600 mt-8 pt-8 text-center text-gray-300 dark:text-gray-400">
                <p>&copy; 2024 Srikandi Travel. Semua hak dilindungi.</p>
            </div>
        </div>
    </footer>
</body>
</html> 