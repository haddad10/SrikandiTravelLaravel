@extends('layouts.app')

@section('title', 'About Us - Srikandi Tour And Travel')

@section('content')
<!-- Hero Section -->
<section class="py-20">
    <!-- Travel Mode Hero -->
    <div x-show="mode === 'travel'" class="bg-gradient-to-r from-blue-600 to-green-600 text-white py-20">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h1 class="text-4xl md:text-5xl font-bold mb-6">Tentang Srikandi Tour And Travel</h1>
            <p class="text-xl md:text-2xl max-w-3xl mx-auto">Mengenal lebih dekat dengan layanan tour and travel terpercaya</p>
        </div>
    </div>
    
    <!-- Umroh Mode Hero -->
    <div x-show="mode === 'umroh'" class="bg-gradient-to-r from-orange-500 to-yellow-500 text-white py-20">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h1 class="text-4xl md:text-5xl font-bold mb-6">Tentang Srikandi Umroh</h1>
            <p class="text-xl md:text-2xl max-w-3xl mx-auto">Mengenal lebih dekat dengan layanan umroh terpercaya</p>
        </div>
    </div>
</section>

<!-- About Content -->
<section class="py-16 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
            <!-- Company Story -->
            <div>
                <h2 class="text-3xl font-bold mb-6">
                    <span x-show="mode === 'travel'">Cerita Kami</span>
                    <span x-show="mode === 'umroh'">Cerita Kami</span>
                </h2>
                <div class="space-y-4 text-gray-700">
                    <p>
                        <span x-show="mode === 'travel'">
                            Srikandi Tour And Travel didirikan dengan visi untuk memberikan pengalaman perjalanan terbaik kepada setiap pelanggan. Dengan pengalaman lebih dari 10 tahun di industri pariwisata, kami telah melayani ribuan pelanggan dengan berbagai destinasi menarik di seluruh dunia.
                        </span>
                        <span x-show="mode === 'umroh'">
                            Srikandi Umroh didirikan dengan visi untuk memfasilitasi ibadah umroh dengan layanan terbaik dan pembimbing berpengalaman. Dengan pengalaman lebih dari 8 tahun di industri umroh, kami telah melayani ribuan jamaah dengan berbagai paket umroh berkualitas.
                        </span>
                    </p>
                    <p>
                        <span x-show="mode === 'travel'">
                            Kami berkomitmen untuk memberikan layanan profesional, aman, dan nyaman dengan harga yang terjangkau. Tim kami terdiri dari para ahli perjalanan yang berpengalaman dan siap membantu Anda merencanakan perjalanan impian.
                        </span>
                        <span x-show="mode === 'umroh'">
                            Kami berkomitmen untuk memberikan layanan umroh yang profesional, aman, dan nyaman dengan pembimbing yang berpengalaman. Tim kami terdiri dari para ahli umroh yang siap membantu Anda melaksanakan ibadah dengan khusyuk.
                        </span>
                    </p>
                </div>
            </div>

            <!-- Company Values -->
            <div class="bg-white p-8 rounded-lg shadow-lg">
                <h3 class="text-2xl font-bold mb-6 text-center">
                    <span x-show="mode === 'travel'">Nilai-Nilai Kami</span>
                    <span x-show="mode === 'umroh'">Nilai-Nilai Kami</span>
                </h3>
                <div class="space-y-4">
                    <div class="flex items-start space-x-3">
                        <div class="w-8 h-8 bg-blue-600 rounded-full flex items-center justify-center text-white font-bold">1</div>
                        <div>
                            <h4 class="font-semibold">Profesionalisme</h4>
                            <p class="text-gray-600 text-sm">Layanan profesional dengan standar tinggi</p>
                        </div>
                    </div>
                    <div class="flex items-start space-x-3">
                        <div class="w-8 h-8 bg-green-600 rounded-full flex items-center justify-center text-white font-bold">2</div>
                        <div>
                            <h4 class="font-semibold">Keamanan</h4>
                            <p class="text-gray-600 text-sm">Prioritas utama adalah keselamatan pelanggan</p>
                        </div>
                    </div>
                    <div class="flex items-start space-x-3">
                        <div class="w-8 h-8 bg-orange-600 rounded-full flex items-center justify-center text-white font-bold">3</div>
                        <div>
                            <h4 class="font-semibold">Kepercayaan</h4>
                            <p class="text-gray-600 text-sm">Membangun kepercayaan melalui layanan terbaik</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Services Section -->
<section class="py-16">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <h2 class="text-3xl font-bold text-center mb-12">
            <span x-show="mode === 'travel'">Layanan Kami</span>
            <span x-show="mode === 'umroh'">Layanan Kami</span>
        </h2>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <div class="bg-white p-6 rounded-lg shadow-lg text-center">
                <div class="w-16 h-16 bg-blue-600 rounded-full flex items-center justify-center mx-auto mb-4">
                    <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                    </svg>
                </div>
                <h3 class="text-xl font-semibold mb-2">
                    <span x-show="mode === 'travel'">Paket Wisata</span>
                    <span x-show="mode === 'umroh'">Paket Umroh</span>
                </h3>
                <p class="text-gray-600">
                    <span x-show="mode === 'travel'">Berbagai paket wisata domestik dan internasional dengan harga terbaik</span>
                    <span x-show="mode === 'umroh'">Paket umroh lengkap dengan pembimbing berpengalaman</span>
                </p>
            </div>
            <div class="bg-white p-6 rounded-lg shadow-lg text-center">
                <div class="w-16 h-16 bg-green-600 rounded-full flex items-center justify-center mx-auto mb-4">
                    <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                    </svg>
                </div>
                <h3 class="text-xl font-semibold mb-2">Jadwal Keberangkatan</h3>
                <p class="text-gray-600">Jadwal keberangkatan yang fleksibel dan teratur</p>
            </div>
            <div class="bg-white p-6 rounded-lg shadow-lg text-center">
                <div class="w-16 h-16 bg-orange-600 rounded-full flex items-center justify-center mx-auto mb-4">
                    <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path>
                    </svg>
                </div>
                <h3 class="text-xl font-semibold mb-2">Layanan 24/7</h3>
                <p class="text-gray-600">Dukungan pelanggan yang siap membantu kapan saja</p>
            </div>
        </div>
    </div>
</section>

<!-- Contact CTA -->
<section class="bg-gradient-to-r from-blue-600 to-green-600 text-white py-16">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <h2 class="text-3xl font-bold mb-4">Siap Memulai Perjalanan?</h2>
        <p class="text-xl mb-8">Hubungi kami untuk informasi lebih lanjut</p>
        <div class="flex flex-col sm:flex-row gap-4 justify-center">
            <a href="{{ route('packages') }}" class="bg-white text-blue-600 px-8 py-3 rounded-lg font-semibold hover:bg-gray-100 transition-all duration-300">
                Lihat Paket
            </a>
            <a href="https://wa.me/6281234567890" target="_blank" class="bg-green-500 text-white px-8 py-3 rounded-lg font-semibold hover:bg-green-600 transition-all duration-300">
                Hubungi WhatsApp
            </a>
        </div>
    </div>
</section>
@endsection 