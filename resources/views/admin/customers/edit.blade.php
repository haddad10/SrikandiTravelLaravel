<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Pelanggan - {{ $customer->name }}</title>
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
                        <h1 class="text-4xl font-bold bg-gradient-to-r from-gray-100 via-blue-300 to-purple-300 bg-clip-text text-transparent mb-2">Edit Pelanggan</h1>
                        <p class="text-xl text-gray-300">{{ $customer->name }} - {{ $customer->package->name }}</p>
                    </div>
                    <a href="{{ route('admin.customers.show', $customer) }}" 
                       class="bg-gradient-to-r from-blue-600 to-blue-700 text-white px-6 py-3 rounded-xl font-bold hover:from-blue-500 hover:to-blue-600 transition-all duration-300 shadow-lg hover:shadow-xl transform hover:-translate-y-0.5">
                        <svg class="w-5 h-5 inline mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                        </svg>
                        Kembali ke Detail
                    </a>
                </div>
            </div>

            @if($errors->any())
            <div class="bg-gradient-to-r from-red-900/50 to-red-800/50 border border-red-500/30 text-red-200 px-6 py-4 rounded-2xl mb-8 shadow-lg animate-bounce-in">
                <div class="flex items-center">
                    <svg class="w-5 h-5 mr-3 text-red-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                    <div>
                        <h4 class="font-semibold mb-2">Terjadi kesalahan:</h4>
                        <ul class="list-disc list-inside space-y-1">
                            @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
            @endif

            <!-- Package Info Card -->
            <div class="bg-gray-800 rounded-3xl shadow-2xl p-8 mb-8 border border-gray-700 animate-slide-up">
                <h3 class="text-2xl font-bold text-gray-100 mb-6">Informasi Paket</h3>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                    <div class="bg-gradient-to-r from-gray-700 to-gray-800 rounded-2xl p-6 border border-gray-600">
                        <p class="text-sm text-gray-400 mb-2">Nama Paket</p>
                        <p class="text-xl font-bold text-gray-100">{{ $customer->package->name }}</p>
                    </div>
                    <div class="bg-gradient-to-r from-gray-700 to-gray-800 rounded-2xl p-6 border border-gray-600">
                        <p class="text-sm text-gray-400 mb-2">Destinasi</p>
                        <p class="text-xl font-bold text-gray-100">{{ $customer->package->destination }}</p>
                    </div>
                    <div class="bg-gradient-to-r from-gray-700 to-gray-800 rounded-2xl p-6 border border-gray-600">
                        <p class="text-sm text-gray-400 mb-2">Harga Paket</p>
                        <p class="text-xl font-bold text-blue-400">Rp {{ number_format($customer->package->price, 0, ',', '.') }}</p>
                    </div>
                </div>
            </div>

            <!-- Customer Form -->
            <div class="bg-gray-800 rounded-3xl shadow-2xl p-8 border border-gray-700 animate-slide-up">
                <form action="{{ route('admin.customers.update', $customer) }}" method="POST">
                    @csrf
                    @method('PUT')
                    
                    <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                        <!-- Personal Information -->
                        <div class="space-y-6">
                            <h3 class="text-2xl font-bold text-gray-100 mb-6">Informasi Pribadi</h3>
                            
                            <div>
                                <label for="name" class="block text-sm font-semibold text-gray-300 mb-3">Nama Lengkap *</label>
                                <input type="text" id="name" name="name" value="{{ old('name', $customer->name) }}" required
                                       class="w-full px-4 py-3 border border-gray-600 rounded-xl shadow-sm placeholder-gray-500 bg-gray-700 text-gray-100 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all duration-300">
                            </div>
                            
                            <div>
                                <label for="phone" class="block text-sm font-semibold text-gray-300 mb-3">Nomor Telepon *</label>
                                <input type="tel" id="phone" name="phone" value="{{ old('phone', $customer->phone) }}" required
                                       class="w-full px-4 py-3 border border-gray-600 rounded-xl shadow-sm placeholder-gray-500 bg-gray-700 text-gray-100 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all duration-300">
                            </div>
                            
                            <div>
                                <label for="email" class="block text-sm font-semibold text-gray-300 mb-3">Email</label>
                                <input type="email" id="email" name="email" value="{{ old('email', $customer->email) }}"
                                       class="w-full px-4 py-3 border border-gray-600 rounded-xl shadow-sm placeholder-gray-500 bg-gray-700 text-gray-100 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all duration-300">
                            </div>
                            
                            <div>
                                <label for="id_number" class="block text-sm font-semibold text-gray-300 mb-3">Nomor KTP</label>
                                <input type="text" id="id_number" name="id_number" value="{{ old('id_number', $customer->id_number) }}"
                                       class="w-full px-4 py-3 border border-gray-600 rounded-xl shadow-sm placeholder-gray-500 bg-gray-700 text-gray-100 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all duration-300">
                            </div>
                            
                            <div>
                                <label for="passport_number" class="block text-sm font-semibold text-gray-300 mb-3">Nomor Paspor</label>
                                <input type="text" id="passport_number" name="passport_number" value="{{ old('passport_number', $customer->passport_number) }}"
                                       class="w-full px-4 py-3 border border-gray-600 rounded-xl shadow-sm placeholder-gray-500 bg-gray-700 text-gray-100 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all duration-300">
                            </div>
                            
                            <div>
                                <label for="visa_number" class="block text-sm font-semibold text-gray-300 mb-3">Nomor Visa</label>
                                <input type="text" id="visa_number" name="visa_number" value="{{ old('visa_number', $customer->visa_number) }}"
                                       class="w-full px-4 py-3 border border-gray-600 rounded-xl shadow-sm placeholder-gray-500 bg-gray-700 text-gray-100 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all duration-300">
                            </div>
                            
                            <div>
                                <label for="birth_date" class="block text-sm font-semibold text-gray-300 mb-3">Tanggal Lahir</label>
                                <input type="date" id="birth_date" name="birth_date" value="{{ old('birth_date', $customer->birth_date ? $customer->birth_date->format('Y-m-d') : '') }}"
                                       class="w-full px-4 py-3 border border-gray-600 rounded-xl shadow-sm bg-gray-700 text-gray-100 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all duration-300">
                            </div>
                            
                            <div>
                                <label for="gender" class="block text-sm font-semibold text-gray-300 mb-3">Jenis Kelamin</label>
                                <select id="gender" name="gender" 
                                        class="w-full px-4 py-3 border border-gray-600 rounded-xl shadow-sm bg-gray-700 text-gray-100 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all duration-300">
                                    <option value="">Pilih Jenis Kelamin</option>
                                    <option value="male" {{ old('gender', $customer->gender) == 'male' ? 'selected' : '' }}>Laki-laki</option>
                                    <option value="female" {{ old('gender', $customer->gender) == 'female' ? 'selected' : '' }}>Perempuan</option>
                                </select>
                            </div>
                            
                            <div>
                                <label for="address" class="block text-sm font-semibold text-gray-300 mb-3">Alamat</label>
                                <textarea id="address" name="address" rows="3"
                                          class="w-full px-4 py-3 border border-gray-600 rounded-xl shadow-sm placeholder-gray-500 bg-gray-700 text-gray-100 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all duration-300">{{ old('address', $customer->address) }}</textarea>
                            </div>
                        </div>
                        
                        <!-- Payment & Travel Information -->
                        <div class="space-y-6">
                            <h3 class="text-2xl font-bold text-gray-100 mb-6">Informasi Pembayaran & Travel</h3>
                            
                            <div>
                                <label for="status" class="block text-sm font-semibold text-gray-300 mb-3">Status *</label>
                                <select id="status" name="status" required
                                        class="w-full px-4 py-3 border border-gray-600 rounded-xl shadow-sm bg-gray-700 text-gray-100 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all duration-300">
                                    <option value="">Pilih Status</option>
                                    <option value="pending" {{ old('status', $customer->status) == 'pending' ? 'selected' : '' }}>Pending</option>
                                    <option value="confirmed" {{ old('status', $customer->status) == 'confirmed' ? 'selected' : '' }}>Confirmed</option>
                                    <option value="cancelled" {{ old('status', $customer->status) == 'cancelled' ? 'selected' : '' }}>Cancelled</option>
                                </select>
                            </div>
                            
                            <div>
                                <label for="total_payment" class="block text-sm font-semibold text-gray-300 mb-3">Total Pembayaran *</label>
                                <input type="number" id="total_payment" name="total_payment" value="{{ old('total_payment', $customer->total_payment) }}" required min="0" step="1000"
                                       class="w-full px-4 py-3 border border-gray-600 rounded-xl shadow-sm placeholder-gray-500 bg-gray-700 text-gray-100 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all duration-300">
                            </div>
                            
                            <div>
                                <label for="paid_amount" class="block text-sm font-semibold text-gray-300 mb-3">Sudah Dibayar *</label>
                                <input type="number" id="paid_amount" name="paid_amount" value="{{ old('paid_amount', $customer->paid_amount) }}" required min="0" step="1000"
                                       class="w-full px-4 py-3 border border-gray-600 rounded-xl shadow-sm placeholder-gray-500 bg-gray-700 text-gray-100 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all duration-300">
                            </div>
                            
                            <div>
                                <label for="travel_date" class="block text-sm font-semibold text-gray-300 mb-3">Tanggal Travel</label>
                                <input type="date" id="travel_date" name="travel_date" value="{{ old('travel_date', $customer->travel_date ? $customer->travel_date->format('Y-m-d') : '') }}"
                                       class="w-full px-4 py-3 border border-gray-600 rounded-xl shadow-sm bg-gray-700 text-gray-100 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all duration-300">
                            </div>
                            
                            <div>
                                <label for="notes" class="block text-sm font-semibold text-gray-300 mb-3">Catatan</label>
                                <textarea id="notes" name="notes" rows="4"
                                          class="w-full px-4 py-3 border border-gray-600 rounded-xl shadow-sm placeholder-gray-500 bg-gray-700 text-gray-100 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all duration-300">{{ old('notes', $customer->notes) }}</textarea>
                            </div>
                        </div>
                    </div>
                    
                    <div class="mt-12 flex justify-end space-x-6">
                        <a href="{{ route('admin.customers.show', $customer) }}" 
                           class="px-8 py-4 border border-gray-600 text-gray-300 rounded-xl hover:bg-gray-700 transition-all duration-300 font-semibold">
                            Batal
                        </a>
                        <button type="submit" 
                                class="px-8 py-4 bg-gradient-to-r from-blue-600 to-blue-700 text-white rounded-xl hover:from-blue-500 hover:to-blue-600 transition-all duration-300 font-bold shadow-lg hover:shadow-xl transform hover:-translate-y-0.5">
                            <svg class="w-5 h-5 inline mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                            </svg>
                            Update Pelanggan
                        </button>
                    </div>
                </form>
            </div>
        </div>

        <script>
        // Auto-calculate remaining amount
        document.getElementById('total_payment').addEventListener('input', function() {
            const totalPayment = parseFloat(this.value) || 0;
            const paidAmount = parseFloat(document.getElementById('paid_amount').value) || 0;
            const remainingAmount = totalPayment - paidAmount;
            
            // You can add a display for remaining amount if needed
            console.log('Sisa bayar: Rp', remainingAmount.toLocaleString('id-ID'));
        });

        document.getElementById('paid_amount').addEventListener('input', function() {
            const totalPayment = parseFloat(document.getElementById('total_payment').value) || 0;
            const paidAmount = parseFloat(this.value) || 0;
            const remainingAmount = totalPayment - paidAmount;
            
            // You can add a display for remaining amount if needed
            console.log('Sisa bayar: Rp', remainingAmount.toLocaleString('id-ID'));
        });
        </script>
    </div>
</body>
</html> 