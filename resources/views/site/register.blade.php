@extends('layouts.app')

@section('title', 'Pendaftaran - Srikandi Travel')

@section('content')
    <!-- Hero Section -->
    <section class="bg-gradient-to-r from-blue-600 to-green-600 py-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center text-white">
            <h1 class="text-4xl md:text-5xl font-bold mb-4">Pendaftaran Paket</h1>
            <p class="text-xl">Daftar sekarang untuk mendapatkan paket perjalanan terbaik</p>
        </div>
    </section>

    <!-- Registration Form -->
    <section class="py-16">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            @if(session('success'))
                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-6">
                    {{ session('success') }}
                </div>
            @endif

            @if($errors->any())
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-6">
                    <ul class="list-disc list-inside">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div class="bg-white rounded-lg shadow-lg p-8">
                <h2 class="text-2xl font-bold mb-6 text-center">Form Pendaftaran</h2>
                
                <form action="{{ route('register.store') }}" method="POST">
                    @csrf
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label for="name" class="block text-sm font-medium text-gray-700 mb-2">Nama Lengkap *</label>
                            <input type="text" name="name" id="name" value="{{ old('name') }}" required
                                   class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                        </div>
                        
                        <div>
                            <label for="email" class="block text-sm font-medium text-gray-700 mb-2">Email *</label>
                            <input type="email" name="email" id="email" value="{{ old('email') }}" required
                                   class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                        </div>
                        
                        <div>
                            <label for="phone" class="block text-sm font-medium text-gray-700 mb-2">Nomor Telepon *</label>
                            <input type="tel" name="phone" id="phone" value="{{ old('phone') }}" required
                                   class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                                   placeholder="08xxxxxxxxxx">
                        </div>
                        
                        <div>
                            <label for="package_id" class="block text-sm font-medium text-gray-700 mb-2">Pilih Paket *</label>
                            <select name="package_id" id="package_id" required
                                    class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                                <option value="">Pilih paket perjalanan</option>
                                @foreach($packages as $package)
                                    <option value="{{ $package->id }}" {{ old('package_id') == $package->id || request('package') == $package->id ? 'selected' : '' }}>
                                        {{ $package->name }} - {{ $package->destination }} (Rp {{ number_format($package->price, 0, ',', '.') }})
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    
                    <div class="mt-6">
                        <label for="message" class="block text-sm font-medium text-gray-700 mb-2">Pesan Tambahan</label>
                        <textarea name="message" id="message" rows="4" 
                                  class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                                  placeholder="Tulis pesan tambahan jika ada...">{{ old('message') }}</textarea>
                    </div>
                    
                    <div class="mt-8 flex flex-col sm:flex-row gap-4">
                        <button type="submit" class="flex-1 bg-blue-600 text-white py-3 px-6 rounded-lg font-semibold hover:bg-blue-700 transition-colors">
                            Kirim Pendaftaran
                        </button>
                        <a href="https://wa.me/6281234567890" target="_blank" class="flex-1 bg-green-500 text-white py-3 px-6 rounded-lg font-semibold hover:bg-green-600 transition-colors text-center">
                            WhatsApp Kami
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </section>

    <!-- Package Preview -->
    @if(request('package'))
        @php
            $selectedPackage = $packages->where('id', request('package'))->first();
        @endphp
        @if($selectedPackage)
        <section class="py-16 bg-gray-50">
            <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
                <h2 class="text-2xl font-bold mb-6 text-center">Paket yang Dipilih</h2>
                <div class="bg-white rounded-lg shadow-lg p-6">
                    <div class="flex flex-col md:flex-row items-start gap-6">
                        <div class="w-full md:w-1/3">
                            <div class="h-48 bg-gray-200 rounded-lg overflow-hidden">
                                @if($selectedPackage->image)
                                    <img src="{{ asset('storage/' . $selectedPackage->image) }}" alt="{{ $selectedPackage->name }}" class="w-full h-full object-cover">
                                @else
                                    <div class="w-full h-full bg-gradient-to-br from-blue-400 to-green-400 flex items-center justify-center">
                                        <svg class="w-16 h-16 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 9a2 2 0 012-2h.93a2 2 0 001.664-.89l.812-1.22A2 2 0 0110.07 4h3.86a2 2 0 011.664.89l.812 1.22A2 2 0 0018.07 7H19a2 2 0 012 2v9a2 2 0 01-2 2H5a2 2 0 01-2-2V9z"></path>
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 13a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                        </svg>
                                    </div>
                                @endif
                            </div>
                        </div>
                        <div class="flex-1">
                            <div class="flex items-center justify-between mb-2">
                                <span class="px-2 py-1 text-xs rounded-full {{ $selectedPackage->mode === 'travel' ? 'bg-blue-100 text-blue-800' : 'bg-orange-100 text-orange-800' }}">
                                    {{ ucfirst($selectedPackage->mode) }}
                                </span>
                                <span class="text-sm text-gray-500">{{ $selectedPackage->duration }}</span>
                            </div>
                            <h3 class="text-2xl font-bold mb-2">{{ $selectedPackage->name }}</h3>
                            <p class="text-gray-600 mb-4">{{ $selectedPackage->destination }}</p>
                            <div class="text-3xl font-bold text-blue-600 mb-4">Rp {{ number_format($selectedPackage->price, 0, ',', '.') }}</div>
                            <p class="text-gray-600">{{ $selectedPackage->description }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        @endif
    @endif

    <!-- Contact Info -->
    <section class="py-16">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="bg-white rounded-lg shadow-lg p-8">
                <h2 class="text-2xl font-bold mb-6 text-center">Informasi Kontak</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                    <div>
                        <h3 class="text-lg font-semibold mb-4">Kantor Pusat</h3>
                        <div class="space-y-2 text-gray-600">
                            <p>📍 Jl. Sudirman No. 123, Jakarta Pusat</p>
                            <p>📞 +62 812-3456-7890</p>
                            <p>📧 info@srikanditravel.com</p>
                            <p>🕒 Senin - Jumat: 08:00 - 17:00</p>
                        </div>
                    </div>
                    <div>
                        <h3 class="text-lg font-semibold mb-4">Layanan Pelanggan</h3>
                        <div class="space-y-2 text-gray-600">
                            <p>📱 WhatsApp: +62 812-3456-7890</p>
                            <p>💬 Live Chat: Tersedia di website</p>
                            <p>📧 Email: cs@srikanditravel.com</p>
                            <p>🆘 Emergency: +62 812-3456-7891</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection 