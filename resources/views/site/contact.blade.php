@extends('layouts.app')

@section('title', 'Kontak - Srikandi Travel')

@section('content')
    <!-- Hero Section -->
    <section class="py-16">
        <!-- Travel Mode Hero -->
        <div x-show="mode === 'travel'" class="bg-gradient-to-r from-blue-600 to-green-600 py-16">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center text-white">
                <h1 class="text-4xl md:text-5xl font-bold mb-4">Hubungi Kami</h1>
                <p class="text-xl">Kami siap membantu Anda dengan layanan terbaik</p>
            </div>
        </div>
        
        <!-- Umroh Mode Hero -->
        <div x-show="mode === 'umroh'" class="bg-gradient-to-r from-orange-500 to-yellow-500 py-16">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center text-white">
                <h1 class="text-4xl md:text-5xl font-bold mb-4">Hubungi Kami</h1>
                <p class="text-xl">Kami siap membantu Anda dengan layanan terbaik</p>
            </div>
        </div>
    </section>

    <!-- Contact Section -->
    <section class="py-16 bg-white dark:bg-gray-800 transition-colors duration-300">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12">
                <!-- Contact Information -->
                <div>
                    <h2 class="text-3xl font-bold text-gray-900 dark:text-white mb-8 transition-colors duration-300">Informasi Kontak</h2>
                    
                    <div class="space-y-6">
                        <div class="flex items-start space-x-4">
                            <div class="bg-blue-100 dark:bg-blue-900 p-3 rounded-lg">
                                <svg class="w-6 h-6 text-blue-600 dark:text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path>
                                </svg>
                            </div>
                            <div>
                                <h3 class="text-lg font-semibold text-gray-900 dark:text-white transition-colors duration-300">Telepon</h3>
                                <p class="text-gray-600 dark:text-gray-300 transition-colors duration-300">+62 812-3456-7890</p>
                                <p class="text-gray-600 dark:text-gray-300 transition-colors duration-300">+62 812-3456-7891</p>
                            </div>
                        </div>
                        
                        <div class="flex items-start space-x-4">
                            <div class="bg-blue-100 dark:bg-blue-900 p-3 rounded-lg">
                                <svg class="w-6 h-6 text-blue-600 dark:text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 4.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                                </svg>
                            </div>
                            <div>
                                <h3 class="text-lg font-semibold text-gray-900 dark:text-white transition-colors duration-300">Email</h3>
                                <p class="text-gray-600 dark:text-gray-300 transition-colors duration-300">info@srikanditravel.com</p>
                                <p class="text-gray-600 dark:text-gray-300 transition-colors duration-300">booking@srikanditravel.com</p>
                            </div>
                        </div>
                        
                        <div class="flex items-start space-x-4">
                            <div class="bg-blue-100 dark:bg-blue-900 p-3 rounded-lg">
                                <svg class="w-6 h-6 text-blue-600 dark:text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                </svg>
                            </div>
                            <div>
                                <h3 class="text-lg font-semibold text-gray-900 dark:text-white transition-colors duration-300">Alamat</h3>
                                <p class="text-gray-600 dark:text-gray-300 transition-colors duration-300">Jl. Sudirman No. 123</p>
                                <p class="text-gray-600 dark:text-gray-300 transition-colors duration-300">Jakarta Pusat, 10220</p>
                                <p class="text-gray-600 dark:text-gray-300 transition-colors duration-300">Indonesia</p>
                            </div>
                        </div>
                        
                        <div class="flex items-start space-x-4">
                            <div class="bg-blue-100 dark:bg-blue-900 p-3 rounded-lg">
                                <svg class="w-6 h-6 text-blue-600 dark:text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                            </div>
                            <div>
                                <h3 class="text-lg font-semibold text-gray-900 dark:text-white transition-colors duration-300">Jam Operasional</h3>
                                <p class="text-gray-600 dark:text-gray-300 transition-colors duration-300">Senin - Jumat: 08:00 - 17:00</p>
                                <p class="text-gray-600 dark:text-gray-300 transition-colors duration-300">Sabtu: 08:00 - 15:00</p>
                                <p class="text-gray-600 dark:text-gray-300 transition-colors duration-300">Minggu: 09:00 - 14:00</p>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Contact Form -->
                <div>
                    <h2 class="text-3xl font-bold text-gray-900 dark:text-white mb-8 transition-colors duration-300">Kirim Pesan</h2>
                    
                    <form class="space-y-6">
                        <div>
                            <label for="name" class="block text-sm font-medium text-gray-700 dark:text-gray-300 transition-colors duration-300">Nama Lengkap</label>
                            <input type="text" id="name" name="name" class="mt-1 block w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-md shadow-sm placeholder-gray-400 dark:placeholder-gray-500 bg-white dark:bg-gray-700 text-gray-900 dark:text-white focus:outline-none focus:ring-blue-500 focus:border-blue-500 transition-colors duration-300">
                        </div>
                        
                        <div>
                            <label for="email" class="block text-sm font-medium text-gray-700 dark:text-gray-300 transition-colors duration-300">Email</label>
                            <input type="email" id="email" name="email" class="mt-1 block w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-md shadow-sm placeholder-gray-400 dark:placeholder-gray-500 bg-white dark:bg-gray-700 text-gray-900 dark:text-white focus:outline-none focus:ring-blue-500 focus:border-blue-500 transition-colors duration-300">
                        </div>
                        
                        <div>
                            <label for="phone" class="block text-sm font-medium text-gray-700 dark:text-gray-300 transition-colors duration-300">Nomor Telepon</label>
                            <input type="tel" id="phone" name="phone" class="mt-1 block w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-md shadow-sm placeholder-gray-400 dark:placeholder-gray-500 bg-white dark:bg-gray-700 text-gray-900 dark:text-white focus:outline-none focus:ring-blue-500 focus:border-blue-500 transition-colors duration-300">
                        </div>
                        
                        <div>
                            <label for="subject" class="block text-sm font-medium text-gray-700 dark:text-gray-300 transition-colors duration-300">Subjek</label>
                            <select id="subject" name="subject" class="mt-1 block w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-md shadow-sm bg-white dark:bg-gray-700 text-gray-900 dark:text-white focus:outline-none focus:ring-blue-500 focus:border-blue-500 transition-colors duration-300">
                                <option value="">Pilih subjek</option>
                                <option value="booking">Pemesanan Paket</option>
                                <option value="inquiry">Pertanyaan Umum</option>
                                <option value="complaint">Keluhan</option>
                                <option value="suggestion">Saran</option>
                            </select>
                        </div>
                        
                        <div>
                            <label for="message" class="block text-sm font-medium text-gray-700 dark:text-gray-300 transition-colors duration-300">Pesan</label>
                            <textarea id="message" name="message" rows="4" class="mt-1 block w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-md shadow-sm placeholder-gray-400 dark:placeholder-gray-500 bg-white dark:bg-gray-700 text-gray-900 dark:text-white focus:outline-none focus:ring-blue-500 focus:border-blue-500 transition-colors duration-300"></textarea>
                        </div>
                        
                        <button type="submit" class="w-full bg-blue-600 text-white py-3 px-6 rounded-lg font-semibold hover:bg-blue-700 transition-colors duration-300">
                            Kirim Pesan
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <!-- Map Section -->
    <section class="py-16 bg-gray-50 dark:bg-gray-900 transition-colors duration-300">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-8">
                <h2 class="text-3xl font-bold text-gray-900 dark:text-white mb-4 transition-colors duration-300">Lokasi Kami</h2>
                <p class="text-gray-600 dark:text-gray-300 transition-colors duration-300">Kunjungi kantor kami untuk informasi lebih lanjut</p>
            </div>
            
            <div class="bg-white dark:bg-gray-800 rounded-lg shadow-lg overflow-hidden transition-colors duration-300">
                <div class="h-96 bg-gray-200 dark:bg-gray-700 flex items-center justify-center">
                    <div class="text-center">
                        <svg class="w-16 h-16 text-gray-400 dark:text-gray-500 mx-auto mb-4" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7zm0 9.5c-1.38 0-2.5-1.12-2.5-2.5s1.12-2.5 2.5-2.5 2.5 1.12 2.5 2.5-1.12 2.5-2.5 2.5z"/>
                        </svg>
                        <p class="text-gray-500 dark:text-gray-400 transition-colors duration-300">Peta akan ditampilkan di sini</p>
                        <p class="text-sm text-gray-400 dark:text-gray-500 transition-colors duration-300">Jl. Sudirman No. 123, Jakarta Pusat</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection 