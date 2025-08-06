<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pelanggan {{ $package->name }} - Admin Dashboard</title>
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
                        <h1 class="text-4xl font-bold bg-gradient-to-r from-gray-100 via-blue-300 to-purple-300 bg-clip-text text-transparent mb-2">Pelanggan {{ $package->name }}</h1>
                        <p class="text-xl text-gray-300">{{ $package->destination }}</p>
                    </div>
                    <div class="flex items-center space-x-4">
                        <a href="{{ route('admin.export.customers.package', $package) }}" 
                           class="bg-gradient-to-r from-blue-600 to-blue-700 text-white px-6 py-3 rounded-xl font-bold hover:from-blue-500 hover:to-blue-600 transition-all duration-300 shadow-lg hover:shadow-xl transform hover:-translate-y-0.5">
                            <svg class="w-5 h-5 inline mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                            </svg>
                            Export Excel
                        </a>
                        <a href="{{ route('admin.customers.create', $package) }}" 
                           class="bg-gradient-to-r from-green-600 to-green-700 text-white px-6 py-3 rounded-xl font-bold hover:from-green-500 hover:to-green-600 transition-all duration-300 shadow-lg hover:shadow-xl transform hover:-translate-y-0.5">
                            <svg class="w-5 h-5 inline mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"/>
                            </svg>
                            + Tambah Pelanggan
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

            <!-- Package Info Card -->
            <div class="bg-gray-800 rounded-3xl shadow-2xl p-8 mb-8 border border-gray-700 animate-slide-up">
                <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                    <div class="bg-gradient-to-r from-gray-700 to-gray-800 rounded-2xl p-6 border border-gray-600">
                        <h3 class="text-xl font-bold text-gray-100 mb-4">Informasi Paket</h3>
                        <div class="space-y-3 text-sm text-gray-300">
                            <p><strong class="text-blue-400">Nama:</strong> {{ $package->name }}</p>
                            <p><strong class="text-blue-400">Destinasi:</strong> {{ $package->destination }}</p>
                            <p><strong class="text-blue-400">Durasi:</strong> {{ $package->duration }}</p>
                            <p><strong class="text-blue-400">Harga:</strong> Rp {{ number_format($package->price, 0, ',', '.') }}</p>
                        </div>
                    </div>
                    <div class="bg-gradient-to-r from-gray-700 to-gray-800 rounded-2xl p-6 border border-gray-600">
                        <h3 class="text-xl font-bold text-gray-100 mb-4">Statistik Pelanggan</h3>
                        <div class="space-y-3 text-sm text-gray-300">
                            <p><strong class="text-green-400">Total Pelanggan:</strong> {{ $customers->total() }}</p>
                            <p><strong class="text-yellow-400">Status Pending:</strong> {{ $customers->where('status', 'pending')->count() }}</p>
                            <p><strong class="text-green-400">Status Confirmed:</strong> {{ $customers->where('status', 'confirmed')->count() }}</p>
                            <p><strong class="text-red-400">Status Cancelled:</strong> {{ $customers->where('status', 'cancelled')->count() }}</p>
                        </div>
                    </div>
                    <div class="bg-gradient-to-r from-gray-700 to-gray-800 rounded-2xl p-6 border border-gray-600">
                        <h3 class="text-xl font-bold text-gray-100 mb-4">Status Pembayaran</h3>
                        <div class="space-y-3 text-sm text-gray-300">
                            <p><strong class="text-green-400">Lunas:</strong> {{ $customers->filter(function($c) { return $c->payment_status === 'lunas'; })->count() }}</p>
                            <p><strong class="text-yellow-400">Dana Masuk:</strong> {{ $customers->filter(function($c) { return $c->payment_status === 'dana_masuk'; })->count() }}</p>
                            <p><strong class="text-red-400">Belum Bayar:</strong> {{ $customers->filter(function($c) { return $c->payment_status === 'belum_bayar'; })->count() }}</p>
                        </div>
                    </div>
                    <div class="bg-gradient-to-r from-gray-700 to-gray-800 rounded-2xl p-6 border border-gray-600">
                        <h3 class="text-xl font-bold text-gray-100 mb-4">Total Pembayaran</h3>
                        <div class="space-y-3 text-sm text-gray-300">
                            <p><strong class="text-purple-400">Total Bayar:</strong> Rp {{ number_format($customers->sum('total_payment'), 0, ',', '.') }}</p>
                            <p><strong class="text-green-400">Sudah Bayar:</strong> Rp {{ number_format($customers->sum('paid_amount'), 0, ',', '.') }}</p>
                            @php
                                $totalPayment = $customers->sum('total_payment');
                                $totalPaid = $customers->sum('paid_amount');
                                $remaining = $totalPayment - $totalPaid;
                                $excess = max(0, $totalPaid - $totalPayment);
                            @endphp
                            @if($excess > 0)
                                <p><strong class="text-green-400">Kelebihan:</strong> Rp {{ number_format($excess, 0, ',', '.') }}</p>
                            @elseif($remaining > 0)
                                <p><strong class="text-red-400">Sisa Bayar:</strong> Rp {{ number_format($remaining, 0, ',', '.') }}</p>
                            @else
                                <p><strong class="text-green-400">Status:</strong> Lunas</p>
                            @endif
                        </div>
                    </div>
                </div>
            </div>

            <!-- Customers Table -->
            <div class="bg-gray-800 rounded-3xl shadow-2xl overflow-hidden border border-gray-700 animate-slide-up">
                <div class="px-8 py-6 border-b border-gray-700">
                    <h2 class="text-2xl font-bold text-gray-100">Daftar Pelanggan</h2>
                </div>
                
                @if($customers->count() > 0)
                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-700">
                        <thead class="bg-gray-700">
                            <tr>
                                <th class="px-8 py-4 text-left text-sm font-semibold text-gray-300 uppercase tracking-wider">Nama</th>
                                <th class="px-8 py-4 text-left text-sm font-semibold text-gray-300 uppercase tracking-wider">Kontak</th>
                                <th class="px-8 py-4 text-left text-sm font-semibold text-gray-300 uppercase tracking-wider">Status</th>
                                <th class="px-8 py-4 text-left text-sm font-semibold text-gray-300 uppercase tracking-wider">Pembayaran</th>
                                <th class="px-8 py-4 text-left text-sm font-semibold text-gray-300 uppercase tracking-wider">Tanggal Travel</th>
                                <th class="px-8 py-4 text-left text-sm font-semibold text-gray-300 uppercase tracking-wider">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="bg-gray-800 divide-y divide-gray-700">
                            @foreach($customers as $customer)
                            <tr class="hover:bg-gray-700 transition-colors duration-200">
                                <td class="px-8 py-6 whitespace-nowrap">
                                    <div>
                                        <div class="text-lg font-semibold text-gray-100">{{ $customer->name }}</div>
                                        <div class="text-sm text-gray-400">{{ $customer->id_number ?: 'No ID' }}</div>
                                    </div>
                                </td>
                                <td class="px-8 py-6 whitespace-nowrap">
                                    <div>
                                        <div class="text-lg text-gray-100">{{ $customer->phone }}</div>
                                        <div class="text-sm text-gray-400">{{ $customer->email ?: '-' }}</div>
                                    </div>
                                </td>
                                <td class="px-8 py-6 whitespace-nowrap">
                                    <span class="px-4 py-2 text-sm font-bold rounded-full shadow-md {{ $customer->status_badge }}">
                                        {{ ucfirst($customer->status) }}
                                    </span>
                                </td>
                                <td class="px-8 py-6 whitespace-nowrap">
                                    <div>
                                        <div class="text-lg font-semibold text-gray-100">
                                            Rp {{ number_format($customer->paid_amount, 0, ',', '.') }}
                                        </div>
                                        <div class="text-sm text-gray-400">
                                            dari Rp {{ number_format($customer->total_payment, 0, ',', '.') }}
                                        </div>
                                        <div class="mt-2">
                                            <span class="px-3 py-1 text-xs font-bold rounded-full shadow-md {{ $customer->payment_status_badge }}">
                                                {{ $customer->payment_status_label }}
                                            </span>
                                            @if($customer->is_overpaid)
                                                <div class="text-xs text-green-400 mt-1">
                                                    +Rp {{ number_format($customer->excess_amount, 0, ',', '.') }}
                                                </div>
                                            @elseif($customer->remaining_amount > 0)
                                                <div class="text-xs text-red-400 mt-1">
                                                    -Rp {{ number_format($customer->remaining_amount, 0, ',', '.') }}
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                </td>
                                <td class="px-8 py-6 whitespace-nowrap text-lg text-gray-100">
                                    {{ $customer->travel_date ? $customer->travel_date->format('d/m/Y') : '-' }}
                                </td>
                                <td class="px-8 py-6 whitespace-nowrap text-sm font-medium">
                                    <div class="flex space-x-3">
                                        <a href="{{ route('admin.customers.show', $customer) }}" 
                                           class="bg-gradient-to-r from-blue-600 to-blue-700 text-white px-4 py-2 rounded-lg hover:from-blue-500 hover:to-blue-600 transition-all duration-300 font-medium shadow-md hover:shadow-lg transform hover:-translate-y-0.5">
                                            Detail
                                        </a>
                                        <a href="{{ route('admin.customers.edit', $customer) }}" 
                                           class="bg-gradient-to-r from-green-600 to-green-700 text-white px-4 py-2 rounded-lg hover:from-green-500 hover:to-green-600 transition-all duration-300 font-medium shadow-md hover:shadow-lg transform hover:-translate-y-0.5">
                                            Edit
                                        </a>
                                        <form action="{{ route('admin.customers.destroy', $customer) }}" method="POST" class="inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" 
                                                    class="bg-gradient-to-r from-red-600 to-red-700 text-white px-4 py-2 rounded-lg hover:from-red-500 hover:to-red-600 transition-all duration-300 font-medium shadow-md hover:shadow-lg transform hover:-translate-y-0.5"
                                                    onclick="return confirm('Apakah Anda yakin ingin menghapus data pelanggan ini?')">
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
                
                <div class="px-8 py-6 border-t border-gray-700">
                    {{ $customers->links() }}
                </div>
                @else
                <div class="px-8 py-16 text-center">
                    <div class="w-24 h-24 bg-gradient-to-br from-gray-700 to-gray-800 rounded-full flex items-center justify-center mx-auto mb-6">
                        <svg class="w-12 h-12 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197m13.5-9a2.5 2.5 0 11-5 0 2.5 2.5 0 015 0z"/>
                        </svg>
                    </div>
                    <h3 class="text-2xl font-bold text-gray-100 mb-4">Belum ada data pelanggan</h3>
                    <p class="text-gray-400 mb-8 text-lg">Belum ada data pelanggan untuk paket ini.</p>
                    <a href="{{ route('admin.customers.create', $package) }}" 
                       class="bg-gradient-to-r from-green-600 to-green-700 text-white px-8 py-4 rounded-2xl font-bold hover:from-green-500 hover:to-green-600 transition-all duration-300 shadow-lg hover:shadow-xl transform hover:-translate-y-1 inline-flex items-center">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"/>
                        </svg>
                        Tambah Pelanggan Pertama
                    </a>
                </div>
                @endif
            </div>

            <div class="mt-8">
                <a href="{{ route('admin.customers.index') }}" 
                   class="bg-gradient-to-r from-blue-600 to-blue-700 text-white px-6 py-3 rounded-xl font-bold hover:from-blue-500 hover:to-blue-600 transition-all duration-300 shadow-lg hover:shadow-xl transform hover:-translate-y-0.5 inline-flex items-center">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                    </svg>
                    Kembali ke Daftar Paket
                </a>
            </div>
        </div>
    </div>
</body>
</html> 