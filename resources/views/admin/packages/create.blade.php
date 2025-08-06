<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Paket - Admin</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
</head>
<body class="bg-gradient-to-br from-blue-50 to-indigo-100 min-h-screen">
    <!-- Navigation -->
    <nav class="bg-white shadow-lg border-b border-gray-200">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16">
                <div class="flex items-center">
                    <div class="flex-shrink-0">
                        <h1 class="text-2xl font-bold bg-gradient-to-r from-blue-600 to-purple-600 bg-clip-text text-transparent">
                            Srikandi Travel Admin
                        </h1>
                    </div>
                </div>
                
                <div class="flex items-center space-x-4">
                    <a href="{{ route('admin.dashboard') }}" class="text-gray-700 hover:text-blue-600 font-medium">Dashboard</a>
                    <a href="{{ route('admin.packages.index') }}" class="text-gray-700 hover:text-blue-600 font-medium">Paket</a>
                    <form action="{{ route('admin.logout') }}" method="POST" class="inline">
                        @csrf
                        <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded-lg hover:bg-red-600 transition-colors duration-200 font-medium">
                            Logout
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <div class="max-w-4xl mx-auto py-8 px-4 sm:px-6 lg:px-8">
        <!-- Page Header -->
        <div class="mb-8">
            <h1 class="text-4xl font-bold text-gray-900 mb-2">Tambah Paket Baru</h1>
            <p class="text-lg text-gray-600">Isi form di bawah untuk menambahkan paket baru</p>
        </div>

        @if($errors->any())
        <div class="bg-red-100 border border-red-400 text-red-700 px-6 py-4 rounded-lg mb-6">
            <div class="flex items-center">
                <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"></path>
                </svg>
                <span class="font-semibold">Terjadi kesalahan:</span>
            </div>
            <ul class="list-disc list-inside mt-2">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        <!-- Form -->
        <div class="bg-white rounded-xl shadow-lg p-8">
            <form action="{{ route('admin.packages.store') }}" method="POST" enctype="multipart/form-data" x-data="{ mode: 'travel' }">
                @csrf
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                    <!-- Left Column -->
                    <div class="space-y-6">
                        <div>
                            <label for="name" class="block text-sm font-semibold text-gray-700 mb-2">Nama Paket *</label>
                            <input type="text" name="name" id="name" value="{{ old('name') }}" required
                                   class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors"
                                   placeholder="Contoh: Paket Wisata Bali 3 Hari 2 Malam">
                        </div>

                        <div>
                            <label for="destination" class="block text-sm font-semibold text-gray-700 mb-2">Destinasi *</label>
                            <input type="text" name="destination" id="destination" value="{{ old('destination') }}" required
                                   class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors"
                                   placeholder="Contoh: Bali, Indonesia">
                        </div>

                        <div>
                            <label for="price" class="block text-sm font-semibold text-gray-700 mb-2">Harga *</label>
                            <div class="relative">
                                <span class="absolute left-3 top-3 text-gray-500">Rp</span>
                                <input type="text" name="price" id="price" value="{{ old('price') ? number_format((int)old('price'), 0, ',', '.') : '' }}" required
                                       class="w-full pl-12 pr-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors"
                                       placeholder="1500000"
                                       oninput="formatPrice(this)">
                            </div>
                            <p class="text-xs text-gray-500 mt-1">Masukkan angka dengan atau tanpa titik (contoh: 1500000 atau 1.500.000)</p>
                        </div>

                        <script>
                            function formatPrice(input) {
                                // Remove all non-numeric characters except dots
                                let value = input.value.replace(/[^0-9.]/g, '');
                                
                                // Remove all dots first
                                value = value.replace(/\./g, '');
                                
                                // Add dots for thousands separator
                                if (value.length > 3) {
                                    value = value.replace(/\B(?=(\d{3})+(?!\d))/g, '.');
                                }
                                
                                input.value = value;
                            }
                        </script>

                        <div>
                            <label for="duration" class="block text-sm font-semibold text-gray-700 mb-2">Durasi *</label>
                            <input type="text" name="duration" id="duration" value="{{ old('duration') }}" required
                                   class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors"
                                   placeholder="Contoh: 3 Hari 2 Malam">
                        </div>
                    </div>

                    <!-- Right Column -->
                    <div class="space-y-6">
                        <div>
                            <label for="mode" class="block text-sm font-semibold text-gray-700 mb-2">Mode *</label>
                            <select name="mode" id="mode" required onchange="toggleCategory()"
                                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors">
                                <option value="">Pilih Mode</option>
                                <option value="travel" {{ old('mode') == 'travel' ? 'selected' : '' }}>Travel</option>
                                <option value="umroh" {{ old('mode') == 'umroh' ? 'selected' : '' }}>Umroh</option>
                            </select>
                        </div>

                        <div id="categoryDiv" style="display: {{ old('mode') == 'travel' ? 'block' : 'none' }};">
                            <label for="category" class="block text-sm font-semibold text-gray-700 mb-2">Kategori</label>
                            <select name="category" id="category"
                                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors">
                                <option value="">Pilih Kategori</option>
                                <option value="domestik" {{ old('category') == 'domestik' ? 'selected' : '' }}>Domestik</option>
                                <option value="internasional" {{ old('category') == 'internasional' ? 'selected' : '' }}>Internasional</option>
                            </select>
                        </div>

                        <script>
                            function toggleCategory() {
                                const modeSelect = document.getElementById('mode');
                                const categoryDiv = document.getElementById('categoryDiv');
                                const categorySelect = document.getElementById('category');
                                
                                if (modeSelect.value === 'travel') {
                                    categoryDiv.style.display = 'block';
                                } else {
                                    categoryDiv.style.display = 'none';
                                    categorySelect.value = '';
                                }
                            }
                        </script>

                        <div>
                            <label for="image" class="block text-sm font-semibold text-gray-700 mb-2">Gambar Paket</label>
                            <div class="border-2 border-dashed border-gray-300 rounded-lg p-6 text-center hover:border-blue-400 transition-colors">
                                <svg class="mx-auto h-12 w-12 text-gray-400" stroke="currentColor" fill="none" viewBox="0 0 48 48">
                                    <path d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                                <div class="mt-4">
                                    <label for="image" class="cursor-pointer bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition-colors">
                                        Pilih Gambar
                                    </label>
                                    <input type="file" name="image" id="image" accept="image/*" class="hidden" onchange="previewImage(this)">
                                </div>
                                <p class="mt-2 text-sm text-gray-500">Format: JPG, PNG, GIF. Maksimal 10MB.</p>
                                
                                <!-- Image Preview -->
                                <div id="imagePreview" class="mt-4 hidden">
                                    <img id="previewImg" src="" alt="Preview" class="mx-auto max-w-full h-32 object-cover rounded-lg border">
                                    <p class="text-xs text-gray-500 mt-2">Preview gambar yang dipilih</p>
                                </div>
                            </div>
                        </div>

                        <script>
                            function previewImage(input) {
                                const preview = document.getElementById('imagePreview');
                                const previewImg = document.getElementById('previewImg');
                                
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
                        </script>

                        <div class="flex items-center">
                            <input type="checkbox" name="is_active" id="is_active" value="1" {{ old('is_active') ? 'checked' : '' }}
                                   class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300 rounded">
                            <label for="is_active" class="ml-3 block text-sm font-medium text-gray-900">Aktif</label>
                        </div>
                    </div>
                </div>

                <div class="mt-8">
                    <label for="description" class="block text-sm font-semibold text-gray-700 mb-2">Deskripsi Paket *</label>
                    <textarea name="description" id="description" rows="6" required
                              class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors"
                              placeholder="Jelaskan detail paket, fasilitas yang disediakan, dan informasi penting lainnya...">{{ old('description') }}</textarea>
                </div>

                <div class="mt-8 flex justify-end space-x-4">
                    <a href="{{ route('admin.packages.index') }}" 
                       class="bg-gray-300 text-gray-700 px-6 py-3 rounded-lg hover:bg-gray-400 transition-colors font-semibold">
                        Batal
                    </a>
                    <button type="submit" 
                            class="bg-gradient-to-r from-blue-600 to-blue-700 text-white px-8 py-3 rounded-lg hover:from-blue-700 hover:to-blue-800 transition-all duration-200 font-semibold shadow-lg hover:shadow-xl transform hover:scale-105">
                        <svg class="w-5 h-5 inline mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                        </svg>
                        Simpan Paket
                    </button>
                </div>
            </form>
        </div>
    </div>
</body>
</html> 