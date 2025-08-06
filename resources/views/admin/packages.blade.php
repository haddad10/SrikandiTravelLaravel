<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kelola Paket - Admin Panel</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body class="bg-gray-100">
    <!-- Navigation -->
    <nav class="bg-white shadow-lg">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16">
                <div class="flex items-center">
                    <div class="flex-shrink-0">
                        <h1 class="text-xl font-bold text-gray-800">Admin Panel</h1>
                    </div>
                </div>
                <div class="flex items-center space-x-4">
                    <span class="text-gray-700">Selamat datang, Admin</span>
                    <button onclick="logout()" class="bg-red-600 hover:bg-red-700 text-white px-4 py-2 rounded-lg text-sm">
                        <i class="fas fa-sign-out-alt mr-2"></i>Logout
                    </button>
                </div>
            </div>
        </div>
    </nav>

    <div class="flex">
        <!-- Sidebar -->
        <div class="w-64 bg-white shadow-lg min-h-screen">
            <div class="p-4">
                <nav class="space-y-2">
                    <a href="/admin/dashboard" class="flex items-center px-4 py-2 text-gray-700 hover:bg-gray-100 rounded-lg">
                        <i class="fas fa-tachometer-alt mr-3"></i>
                        Dashboard
                    </a>
                    <a href="/admin/paket" class="flex items-center px-4 py-2 text-gray-700 bg-blue-100 rounded-lg">
                        <i class="fas fa-suitcase mr-3"></i>
                        Kelola Paket
                    </a>
                    <a href="/admin/jadwal" class="flex items-center px-4 py-2 text-gray-700 hover:bg-gray-100 rounded-lg">
                        <i class="fas fa-calendar mr-3"></i>
                        Kelola Jadwal
                    </a>
                    <a href="/admin/galeri" class="flex items-center px-4 py-2 text-gray-700 hover:bg-gray-100 rounded-lg">
                        <i class="fas fa-images mr-3"></i>
                        Kelola Galeri
                    </a>
                    <a href="/admin/pendaftaran" class="flex items-center px-4 py-2 text-gray-700 hover:bg-gray-100 rounded-lg">
                        <i class="fas fa-users mr-3"></i>
                        Data Pendaftaran
                    </a>
                </nav>
            </div>
        </div>

        <!-- Main Content -->
        <div class="flex-1 p-8">
            <div class="flex justify-between items-center mb-8">
                <div>
                    <h1 class="text-3xl font-bold text-gray-800 mb-2">Kelola Paket</h1>
                    <p class="text-gray-600">Kelola paket perjalanan dan umroh</p>
                </div>
                <button onclick="openAddModal()" class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-3 rounded-lg font-semibold">
                    <i class="fas fa-plus mr-2"></i>Tambah Paket
                </button>
            </div>

            <!-- Mode Toggle -->
            <div class="mb-6">
                <div class="flex space-x-4">
                    <button id="travelMode" onclick="switchMode('travel')" class="px-4 py-2 bg-blue-600 text-white rounded-lg font-semibold">
                        Mode Travel
                    </button>
                    <button id="umrohMode" onclick="switchMode('umroh')" class="px-4 py-2 bg-gray-300 text-gray-700 rounded-lg font-semibold">
                        Mode Umroh
                    </button>
                </div>
            </div>

            <!-- Package List -->
            <div class="bg-white rounded-lg shadow">
                <div class="p-6">
                    <div class="overflow-x-auto">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">ID</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Gambar</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nama Paket</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Tujuan</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Harga</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Durasi</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Aksi</th>
                                </tr>
                            </thead>
                            <tbody id="packageTableBody" class="bg-white divide-y divide-gray-200">
                                <!-- Data will be loaded here -->
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Add/Edit Modal -->
    <div id="packageModal" class="fixed inset-0 bg-black bg-opacity-50 hidden flex items-center justify-center z-50">
        <div class="bg-white rounded-lg max-w-4xl w-full mx-4 max-h-screen overflow-y-auto">
            <div class="p-6">
                <div class="flex justify-between items-center mb-6">
                    <h2 id="modalTitle" class="text-2xl font-bold text-gray-800">Tambah Paket Baru</h2>
                    <button onclick="closeModal()" class="text-gray-500 hover:text-gray-700 text-2xl">
                        <i class="fas fa-times"></i>
                    </button>
                </div>

                <form id="packageForm" class="space-y-4">
                    <input type="hidden" id="packageId" name="id">
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <label for="nama" class="block text-sm font-medium text-gray-700 mb-2">Nama Paket</label>
                            <input type="text" id="nama" name="nama" required
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                        </div>
                        
                        <div>
                            <label for="tujuan" class="block text-sm font-medium text-gray-700 mb-2">Tujuan</label>
                            <input type="text" id="tujuan" name="tujuan" required
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                        </div>
                        
                        <div>
                            <label for="harga" class="block text-sm font-medium text-gray-700 mb-2">Harga</label>
                            <input type="text" id="harga" name="harga" required
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                                placeholder="Rp 2.500.000">
                        </div>
                        
                        <div>
                            <label for="durasi" class="block text-sm font-medium text-gray-700 mb-2">Durasi</label>
                            <input type="text" id="durasi" name="durasi" required
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                                placeholder="3 Hari 2 Malam">
                        </div>
                    </div>
                    
                    <!-- Image Upload Section -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <label for="gambar" class="block text-sm font-medium text-gray-700 mb-2">URL Gambar atau Upload File</label>
                            <input type="text" id="gambar" name="gambar" required
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent mb-2"
                                placeholder="/images/paket.jpg atau upload file"
                                onchange="updateImagePreview()">
                            
                            <!-- File Upload -->
                            <div class="border-2 border-dashed border-gray-300 rounded-lg p-4 text-center hover:border-blue-400 transition-colors">
                                <input type="file" id="imageFile" accept="image/*" class="hidden" onchange="handleFileUpload(event)">
                                <label for="imageFile" class="cursor-pointer">
                                    <i class="fas fa-cloud-upload-alt text-3xl text-gray-400 mb-2"></i>
                                    <p class="text-sm text-gray-600">Klik untuk upload gambar atau drag & drop</p>
                                    <p class="text-xs text-gray-500 mt-1">Maksimal 5MB (JPG, PNG, GIF)</p>
                                </label>
                            </div>
                            
                            <!-- Upload Progress -->
                            <div id="uploadProgress" class="hidden mt-2">
                                <div class="w-full bg-gray-200 rounded-full h-2">
                                    <div id="progressBar" class="bg-blue-600 h-2 rounded-full transition-all duration-300" style="width: 0%"></div>
                                </div>
                                <p id="uploadStatus" class="text-sm text-gray-600 mt-1">Mengupload...</p>
                            </div>
                        </div>
                        
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Preview Gambar</label>
                            <div class="w-full h-32 bg-gray-100 border-2 border-dashed border-gray-300 rounded-lg flex items-center justify-center overflow-hidden">
                                <img id="imagePreview" src="" alt="Preview" class="max-w-full max-h-full object-cover hidden">
                                <div id="noImageText" class="text-gray-500 text-center">
                                    <i class="fas fa-image text-2xl mb-2"></i>
                                    <p>Gambar akan muncul di sini</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div>
                        <label for="deskripsi" class="block text-sm font-medium text-gray-700 mb-2">Deskripsi</label>
                        <textarea id="deskripsi" name="deskripsi" rows="4" required
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent"></textarea>
                    </div>
                    
                    <div>
                        <label for="fasilitas" class="block text-sm font-medium text-gray-700 mb-2">Fasilitas (pisahkan dengan koma)</label>
                        <textarea id="fasilitas" name="fasilitas" rows="3" required
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                            placeholder="Hotel 3 bintang, Makan 3x sehari, Transport AC"></textarea>
                    </div>
                    
                    <div class="flex justify-end space-x-3 pt-4">
                        <button type="button" onclick="closeModal()"
                            class="px-6 py-2 bg-gray-300 text-gray-700 rounded-lg font-semibold hover:bg-gray-400">
                            Batal
                        </button>
                        <button type="submit" id="submitBtn"
                            class="px-6 py-2 bg-blue-600 text-white rounded-lg font-semibold hover:bg-blue-700">
                            Simpan
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        let currentMode = 'travel';
        let packages = [];
        let editingPackageId = null;

        // Load packages
        async function loadPackages() {
            try {
                const response = await fetch(`/api/paket/${currentMode}`);
                packages = await response.json();
                renderPackages();
            } catch (error) {
                console.error('Error loading packages:', error);
            }
        }

        // Render packages table
        function renderPackages() {
            const tbody = document.getElementById('packageTableBody');
            tbody.innerHTML = packages.map(paket => `
                <tr>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">${paket.id}</td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        ${paket.gambar && paket.gambar.trim() !== '' ? 
                            `<img src="${paket.gambar}" alt="${paket.nama}" class="w-12 h-12 object-cover rounded-lg">` : 
                            `<div class="w-12 h-12 bg-gray-200 rounded-lg flex items-center justify-center">
                                <i class="fas fa-image text-gray-400"></i>
                            </div>`
                        }
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">${paket.nama || 'N/A'}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">${paket.tujuan || 'N/A'}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">${paket.harga || 'N/A'}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">${paket.durasi || 'N/A'}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                        <button onclick="editPackage(${paket.id})" class="text-blue-600 hover:text-blue-900 mr-3">
                            <i class="fas fa-edit"></i> Edit
                        </button>
                        <button onclick="deletePackage(${paket.id})" class="text-red-600 hover:text-red-900">
                            <i class="fas fa-trash"></i> Hapus
                        </button>
                    </td>
                </tr>
            `).join('');
        }

        // Switch mode
        function switchMode(mode) {
            currentMode = mode;
            
            // Update button styles
            document.getElementById('travelMode').className = mode === 'travel' 
                ? 'px-4 py-2 bg-blue-600 text-white rounded-lg font-semibold'
                : 'px-4 py-2 bg-gray-300 text-gray-700 rounded-lg font-semibold';
            
            document.getElementById('umrohMode').className = mode === 'umroh'
                ? 'px-4 py-2 bg-blue-600 text-white rounded-lg font-semibold'
                : 'px-4 py-2 bg-gray-300 text-gray-700 rounded-lg font-semibold';
            
            loadPackages();
        }

        // Open add modal
        function openAddModal() {
            editingPackageId = null;
            document.getElementById('modalTitle').textContent = 'Tambah Paket Baru';
            document.getElementById('packageForm').reset();
            document.getElementById('packageId').value = '';
            document.getElementById('submitBtn').textContent = 'Simpan';
            clearImagePreview();
            document.getElementById('packageModal').classList.remove('hidden');
        }

        // Edit package
        function editPackage(id) {
            const paket = packages.find(p => p.id === id);
            if (paket) {
                editingPackageId = parseInt(id); // Ensure it's a number
                document.getElementById('modalTitle').textContent = 'Edit Paket';
                document.getElementById('packageId').value = paket.id;
                document.getElementById('nama').value = paket.nama || '';
                document.getElementById('tujuan').value = paket.tujuan || '';
                document.getElementById('harga').value = paket.harga || '';
                document.getElementById('durasi').value = paket.durasi || '';
                document.getElementById('gambar').value = paket.gambar || '';
                document.getElementById('deskripsi').value = paket.deskripsi || '';
                document.getElementById('fasilitas').value = Array.isArray(paket.fasilitas) ? paket.fasilitas.join(', ') : '';
                document.getElementById('submitBtn').textContent = 'Update';
                updateImagePreview();
                document.getElementById('packageModal').classList.remove('hidden');
            }
        }

        // Update image preview
        function updateImagePreview() {
            const imageUrl = document.getElementById('gambar').value;
            const imagePreview = document.getElementById('imagePreview');
            const noImageText = document.getElementById('noImageText');
            
            if (imageUrl && imageUrl.trim() !== '') {
                imagePreview.src = imageUrl;
                imagePreview.classList.remove('hidden');
                noImageText.classList.add('hidden');
            } else {
                clearImagePreview();
            }
        }

        // Clear image preview
        function clearImagePreview() {
            const imagePreview = document.getElementById('imagePreview');
            const noImageText = document.getElementById('noImageText');
            
            imagePreview.src = '';
            imagePreview.classList.add('hidden');
            noImageText.classList.remove('hidden');
        }

        // Handle file upload
        async function handleFileUpload(event) {
            const file = event.target.files[0];
            if (!file) return;

            // Validate file type
            if (!file.type.startsWith('image/')) {
                alert('Hanya file gambar yang diperbolehkan!');
                return;
            }

            // Validate file size (5MB)
            if (file.size > 5 * 1024 * 1024) {
                alert('Ukuran file maksimal 5MB!');
                return;
            }

            // Show upload progress
            const uploadProgress = document.getElementById('uploadProgress');
            const progressBar = document.getElementById('progressBar');
            const uploadStatus = document.getElementById('uploadStatus');
            
            uploadProgress.classList.remove('hidden');
            progressBar.style.width = '0%';
            uploadStatus.textContent = 'Mengupload...';

            try {
                const formData = new FormData();
                formData.append('image', file);

                const response = await fetch('/api/upload-image', {
                    method: 'POST',
                    body: formData
                });

                if (response.ok) {
                    const result = await response.json();
                    
                    // Update progress
                    progressBar.style.width = '100%';
                    uploadStatus.textContent = 'Upload berhasil!';
                    
                    // Update image URL field
                    document.getElementById('gambar').value = result.imageUrl;
                    updateImagePreview();
                    
                    // Hide progress after 2 seconds
                    setTimeout(() => {
                        uploadProgress.classList.add('hidden');
                    }, 2000);
                    
                } else {
                    throw new Error('Upload failed');
                }
            } catch (error) {
                console.error('Upload error:', error);
                progressBar.style.width = '0%';
                uploadStatus.textContent = 'Upload gagal!';
                alert('Gagal mengupload gambar. Silakan coba lagi.');
                
                setTimeout(() => {
                    uploadProgress.classList.add('hidden');
                }, 3000);
            }
        }

        // Drag and drop functionality
        function setupDragAndDrop() {
            const dropZone = document.querySelector('.border-dashed');
            const fileInput = document.getElementById('imageFile');

            dropZone.addEventListener('dragover', (e) => {
                e.preventDefault();
                dropZone.classList.add('border-blue-400', 'bg-blue-50');
            });

            dropZone.addEventListener('dragleave', (e) => {
                e.preventDefault();
                dropZone.classList.remove('border-blue-400', 'bg-blue-50');
            });

            dropZone.addEventListener('drop', (e) => {
                e.preventDefault();
                dropZone.classList.remove('border-blue-400', 'bg-blue-50');
                
                const files = e.dataTransfer.files;
                if (files.length > 0) {
                    fileInput.files = files;
                    handleFileUpload({ target: { files: files } });
                }
            });
        }

        // Delete package
        async function deletePackage(id) {
            if (confirm('Apakah Anda yakin ingin menghapus paket ini?')) {
                try {
                    console.log('Deleting package:', id, 'from mode:', currentMode);
                    const response = await fetch(`/api/admin/paket/${currentMode}/${id}`, {
                        method: 'DELETE'
                    });
                    
                    if (response.ok) {
                        await loadPackages(); // Reload the packages
                        alert('Paket berhasil dihapus');
                    } else {
                        const errorData = await response.json();
                        alert('Gagal menghapus paket: ' + (errorData.error || 'Unknown error'));
                    }
                } catch (error) {
                    console.error('Error deleting package:', error);
                    alert('Terjadi kesalahan saat menghapus paket');
                }
            }
        }

        // Close modal
        function closeModal() {
            document.getElementById('packageModal').classList.add('hidden');
            editingPackageId = null;
            
            // Reset file input
            document.getElementById('imageFile').value = '';
            
            // Hide upload progress
            document.getElementById('uploadProgress').classList.add('hidden');
        }

        // Handle form submission
        document.getElementById('packageForm').addEventListener('submit', async function(e) {
            e.preventDefault();
            
            const formData = new FormData(e.target);
            const packageData = {
                nama: formData.get('nama'),
                tujuan: formData.get('tujuan'),
                harga: formData.get('harga'),
                durasi: formData.get('durasi'),
                gambar: formData.get('gambar'),
                deskripsi: formData.get('deskripsi'),
                fasilitas: formData.get('fasilitas').split(',').map(f => f.trim()).filter(f => f !== '')
            };
            
            try {
                let url, method;
                
                if (editingPackageId) {
                    // Update existing package
                    url = `/api/admin/paket/${currentMode}/${editingPackageId}`;
                    method = 'PUT';
                    packageData.id = editingPackageId;
                    console.log('Updating package:', editingPackageId, 'with data:', packageData);
                } else {
                    // Create new package
                    url = `/api/admin/paket/${currentMode}`;
                    method = 'POST';
                    console.log('Creating new package with data:', packageData);
                }
                
                const response = await fetch(url, {
                    method: method,
                    headers: {
                        'Content-Type': 'application/json',
                    },
                    body: JSON.stringify(packageData)
                });
                
                if (response.ok) {
                    closeModal();
                    await loadPackages(); // Reload the packages
                    alert(editingPackageId ? 'Paket berhasil diperbarui' : 'Paket berhasil ditambahkan');
                } else {
                    const errorData = await response.json();
                    alert('Gagal menyimpan paket: ' + (errorData.error || 'Unknown error'));
                }
            } catch (error) {
                console.error('Error saving package:', error);
                alert('Terjadi kesalahan saat menyimpan paket');
            }
        });

        function logout() {
            if (confirm('Apakah Anda yakin ingin keluar?')) {
                fetch('/api/admin/logout', { method: 'POST' })
                    .then(() => {
                        window.location.href = '/admin/login';
                    })
                    .catch(() => {
                        window.location.href = '/admin/login';
                    });
            }
        }

        // Load packages when page loads
        document.addEventListener('DOMContentLoaded', function() {
            loadPackages();
            setupDragAndDrop();
        });
    </script>
</body>
</html> 