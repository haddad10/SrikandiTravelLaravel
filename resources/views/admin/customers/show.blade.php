<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Pelanggan - {{ $customer->name }}</title>
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
        <div class="container mx-auto px-4 py-8">
            <div class="mb-8 animate-fade-in">
                <div class="flex items-center justify-between">
                    <div>
                        <h1 class="text-4xl font-bold bg-gradient-to-r from-gray-100 via-blue-300 to-purple-300 bg-clip-text text-transparent mb-2">Detail Pelanggan</h1>
                        <p class="text-xl text-gray-300">{{ $customer->name }} - {{ $customer->package->name }}</p>
                    </div>
                    <div class="flex space-x-4">
                        <a href="{{ route('admin.customers.edit', $customer) }}" 
                           class="bg-gradient-to-r from-blue-600 to-blue-700 text-white px-6 py-3 rounded-xl font-bold hover:from-blue-500 hover:to-blue-600 transition-all duration-300 shadow-lg hover:shadow-xl transform hover:-translate-y-0.5">
                            <svg class="w-5 h-5 inline mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                            </svg>
                            Edit
                        </a>
                        <a href="{{ route('admin.customers.package', $customer->package) }}" 
                           class="bg-gradient-to-r from-gray-600 to-gray-700 text-white px-6 py-3 rounded-xl font-bold hover:from-gray-500 hover:to-gray-600 transition-all duration-300 shadow-lg hover:shadow-xl transform hover:-translate-y-0.5">
                            <svg class="w-5 h-5 inline mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                            </svg>
                            Kembali
                        </a>
                    </div>
                </div>
            </div>

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

            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8 animate-slide-up">
                <!-- Customer Information -->
                <div class="lg:col-span-2 space-y-6">
                    <!-- Personal Information -->
                    <div class="bg-gray-800 rounded-3xl shadow-2xl p-8 border border-gray-700">
                        <h3 class="text-2xl font-bold text-gray-100 mb-6">Informasi Pribadi</h3>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div class="bg-gradient-to-r from-gray-700 to-gray-800 rounded-2xl p-6 border border-gray-600">
                                <label class="block text-sm font-semibold text-gray-400 mb-2">Nama Lengkap</label>
                                <p class="text-xl font-bold text-gray-100">{{ $customer->name }}</p>
                            </div>
                            <div class="bg-gradient-to-r from-gray-700 to-gray-800 rounded-2xl p-6 border border-gray-600">
                                <label class="block text-sm font-semibold text-gray-400 mb-2">Nomor KTP</label>
                                <p class="text-xl text-gray-100">{{ $customer->id_number ?: '-' }}</p>
                            </div>
                            <div class="bg-gradient-to-r from-gray-700 to-gray-800 rounded-2xl p-6 border border-gray-600">
                                <label class="block text-sm font-semibold text-gray-400 mb-2">Nomor Paspor</label>
                                <p class="text-xl text-gray-100">{{ $customer->passport_number ?: '-' }}</p>
                            </div>
                            <div class="bg-gradient-to-r from-gray-700 to-gray-800 rounded-2xl p-6 border border-gray-600">
                                <label class="block text-sm font-semibold text-gray-400 mb-2">Nomor Visa</label>
                                <p class="text-xl text-gray-100">{{ $customer->visa_number ?: '-' }}</p>
                            </div>
                            <div class="bg-gradient-to-r from-gray-700 to-gray-800 rounded-2xl p-6 border border-gray-600">
                                <label class="block text-sm font-semibold text-gray-400 mb-2">Nomor Telepon</label>
                                <p class="text-xl text-gray-100">{{ $customer->phone }}</p>
                            </div>
                            <div class="bg-gradient-to-r from-gray-700 to-gray-800 rounded-2xl p-6 border border-gray-600">
                                <label class="block text-sm font-semibold text-gray-400 mb-2">Email</label>
                                <p class="text-xl text-gray-100">{{ $customer->email ?: '-' }}</p>
                            </div>
                            <div class="bg-gradient-to-r from-gray-700 to-gray-800 rounded-2xl p-6 border border-gray-600">
                                <label class="block text-sm font-semibold text-gray-400 mb-2">Tanggal Lahir</label>
                                <p class="text-xl text-gray-100">{{ $customer->birth_date ? $customer->birth_date->format('d/m/Y') : '-' }}</p>
                            </div>
                            <div class="bg-gradient-to-r from-gray-700 to-gray-800 rounded-2xl p-6 border border-gray-600">
                                <label class="block text-sm font-semibold text-gray-400 mb-2">Jenis Kelamin</label>
                                <p class="text-xl text-gray-100">{{ $customer->gender_label }}</p>
                            </div>
                            <div class="md:col-span-2 bg-gradient-to-r from-gray-700 to-gray-800 rounded-2xl p-6 border border-gray-600">
                                <label class="block text-sm font-semibold text-gray-400 mb-2">Alamat</label>
                                <p class="text-xl text-gray-100">{{ $customer->address ?: '-' }}</p>
                            </div>
                        </div>
                    </div>

                    <!-- Payment Information -->
                    <div class="bg-gray-800 rounded-3xl shadow-2xl p-8 border border-gray-700">
                        <h3 class="text-2xl font-bold text-gray-100 mb-6">Informasi Pembayaran</h3>
                        <div class="grid grid-cols-1 md:grid-cols-4 gap-6">
                            <div class="bg-gradient-to-r from-gray-700 to-gray-800 rounded-2xl p-6 border border-gray-600">
                                <label class="block text-sm font-semibold text-gray-400 mb-2">Status Booking</label>
                                <span class="inline-block px-4 py-2 text-sm font-bold rounded-full shadow-md {{ $customer->status_badge }}">
                                    {{ ucfirst($customer->status) }}
                                </span>
                            </div>
                            <div class="bg-gradient-to-r from-gray-700 to-gray-800 rounded-2xl p-6 border border-gray-600">
                                <label class="block text-sm font-semibold text-gray-400 mb-2">Status Pembayaran</label>
                                <span class="inline-block px-4 py-2 text-sm font-bold rounded-full shadow-md {{ $customer->payment_status_badge }}">
                                    {{ $customer->payment_status_label }}
                                </span>
                            </div>
                            <div class="bg-gradient-to-r from-gray-700 to-gray-800 rounded-2xl p-6 border border-gray-600">
                                <label class="block text-sm font-semibold text-gray-400 mb-2">Total Pembayaran</label>
                                <p class="text-2xl font-bold text-blue-400">
                                    Rp {{ number_format($customer->total_payment, 0, ',', '.') }}
                                </p>
                            </div>
                            <div class="bg-gradient-to-r from-gray-700 to-gray-800 rounded-2xl p-6 border border-gray-600">
                                <label class="block text-sm font-semibold text-gray-400 mb-2">Sudah Dibayar</label>
                                <p class="text-2xl font-bold text-green-400">
                                    Rp {{ number_format($customer->paid_amount, 0, ',', '.') }}
                                </p>
                            </div>
                            <div class="md:col-span-4 bg-gradient-to-r from-gray-700 to-gray-800 rounded-2xl p-6 border border-gray-600">
                                <label class="block text-sm font-semibold text-gray-400 mb-2">
                                    @if($customer->is_overpaid)
                                        Kelebihan Pembayaran
                                    @elseif($customer->remaining_amount > 0)
                                        Sisa Pembayaran
                                    @else
                                        Status Pembayaran
                                    @endif
                                </label>
                                <p class="text-3xl font-bold 
                                    @if($customer->is_overpaid) text-green-400
                                    @elseif($customer->remaining_amount > 0) text-red-400
                                    @else text-green-400
                                    @endif">
                                    @if($customer->is_overpaid)
                                        +Rp {{ number_format($customer->excess_amount, 0, ',', '.') }}
                                    @elseif($customer->remaining_amount > 0)
                                        -Rp {{ number_format($customer->remaining_amount, 0, ',', '.') }}
                                    @else
                                        LUNAS
                                    @endif
                                </p>
                            </div>
                        </div>
                    </div>

                    <!-- Travel Information -->
                    <div class="bg-gray-800 rounded-3xl shadow-2xl p-8 border border-gray-700">
                        <h3 class="text-2xl font-bold text-gray-100 mb-6">Informasi Travel</h3>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div class="bg-gradient-to-r from-gray-700 to-gray-800 rounded-2xl p-6 border border-gray-600">
                                <label class="block text-sm font-semibold text-gray-400 mb-2">Paket</label>
                                <p class="text-xl font-bold text-gray-100">{{ $customer->package->name }}</p>
                            </div>
                            <div class="bg-gradient-to-r from-gray-700 to-gray-800 rounded-2xl p-6 border border-gray-600">
                                <label class="block text-sm font-semibold text-gray-400 mb-2">Destinasi</label>
                                <p class="text-xl text-gray-100">{{ $customer->package->destination }}</p>
                            </div>
                            <div class="bg-gradient-to-r from-gray-700 to-gray-800 rounded-2xl p-6 border border-gray-600">
                                <label class="block text-sm font-semibold text-gray-400 mb-2">Durasi</label>
                                <p class="text-xl text-gray-100">{{ $customer->package->duration }}</p>
                            </div>
                            <div class="bg-gradient-to-r from-gray-700 to-gray-800 rounded-2xl p-6 border border-gray-600">
                                <label class="block text-sm font-semibold text-gray-400 mb-2">Tanggal Travel</label>
                                <p class="text-xl text-gray-100">{{ $customer->travel_date ? $customer->travel_date->format('d/m/Y') : '-' }}</p>
                            </div>
                        </div>
                    </div>

                    <!-- Notes -->
                    @if($customer->notes)
                    <div class="bg-gray-800 rounded-3xl shadow-2xl p-8 border border-gray-700">
                        <h3 class="text-2xl font-bold text-gray-100 mb-6">Catatan</h3>
                        <div class="bg-gradient-to-r from-gray-700 to-gray-800 rounded-2xl p-6 border border-gray-600">
                            <p class="text-lg text-gray-100">{{ $customer->notes }}</p>
                        </div>
                    </div>
                    @endif
                </div>

                <!-- Package Information -->
                <div class="space-y-6">
                    <div class="bg-gray-800 rounded-3xl shadow-2xl p-8 border border-gray-700">
                        <h3 class="text-2xl font-bold text-gray-100 mb-6">Informasi Paket</h3>
                        @if($customer->package->image)
                        <div class="mb-6">
                            <img src="{{ Storage::url($customer->package->image) }}" 
                                 alt="{{ $customer->package->name }}" 
                                 class="w-full h-48 object-cover rounded-2xl">
                        </div>
                        @endif
                        <div class="space-y-4">
                            <div class="bg-gradient-to-r from-gray-700 to-gray-800 rounded-2xl p-4 border border-gray-600">
                                <label class="block text-sm font-semibold text-gray-400 mb-2">Nama Paket</label>
                                <p class="text-lg font-bold text-gray-100">{{ $customer->package->name }}</p>
                            </div>
                            <div class="bg-gradient-to-r from-gray-700 to-gray-800 rounded-2xl p-4 border border-gray-600">
                                <label class="block text-sm font-semibold text-gray-400 mb-2">Destinasi</label>
                                <p class="text-lg text-gray-100">{{ $customer->package->destination }}</p>
                            </div>
                            <div class="bg-gradient-to-r from-gray-700 to-gray-800 rounded-2xl p-4 border border-gray-600">
                                <label class="block text-sm font-semibold text-gray-400 mb-2">Durasi</label>
                                <p class="text-lg text-gray-100">{{ $customer->package->duration }}</p>
                            </div>
                            <div class="bg-gradient-to-r from-gray-700 to-gray-800 rounded-2xl p-4 border border-gray-600">
                                <label class="block text-sm font-semibold text-gray-400 mb-2">Harga Paket</label>
                                <p class="text-xl font-bold text-blue-400">
                                    Rp {{ number_format($customer->package->price, 0, ',', '.') }}
                                </p>
                            </div>
                            <div class="bg-gradient-to-r from-gray-700 to-gray-800 rounded-2xl p-4 border border-gray-600">
                                <label class="block text-sm font-semibold text-gray-400 mb-2">Mode</label>
                                <span class="inline-block px-3 py-1 text-sm font-bold rounded-full shadow-md
                                    {{ $customer->package->mode === 'travel' ? 'bg-gradient-to-r from-blue-600 to-blue-700 text-white' : 'bg-gradient-to-r from-orange-600 to-orange-700 text-white' }}">
                                    {{ ucfirst($customer->package->mode) }}
                                </span>
                            </div>
                        </div>
                    </div>

                    <!-- Quick Actions -->
                    <div class="bg-gray-800 rounded-3xl shadow-2xl p-8 border border-gray-700">
                        <h3 class="text-xl font-bold text-gray-100 mb-6">Aksi Cepat</h3>
                        <div class="space-y-4">
                            <a href="{{ route('admin.customers.edit', $customer) }}" 
                               class="w-full bg-gradient-to-r from-blue-600 to-blue-700 text-white py-3 px-6 rounded-xl text-center font-bold hover:from-blue-500 hover:to-blue-600 transition-all duration-300 shadow-lg hover:shadow-xl transform hover:-translate-y-0.5 flex items-center justify-center">
                                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                                </svg>
                                Edit Data
                            </a>
                            <form action="{{ route('admin.customers.destroy', $customer) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" 
                                        class="w-full bg-gradient-to-r from-red-600 to-red-700 text-white py-3 px-6 rounded-xl font-bold hover:from-red-500 hover:to-red-600 transition-all duration-300 shadow-lg hover:shadow-xl transform hover:-translate-y-0.5 flex items-center justify-center"
                                        onclick="return confirm('Apakah Anda yakin ingin menghapus data pelanggan ini?')">
                                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                                    </svg>
                                    Hapus Data
                                </button>
                            </form>
                            <a href="{{ route('admin.customers.package', $customer->package) }}" 
                               class="w-full bg-gradient-to-r from-gray-600 to-gray-700 text-white py-3 px-6 rounded-xl text-center font-bold hover:from-gray-500 hover:to-gray-600 transition-all duration-300 shadow-lg hover:shadow-xl transform hover:-translate-y-0.5 flex items-center justify-center">
                                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/>
                                </svg>
                                Lihat Semua Pelanggan
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html> 