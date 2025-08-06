@extends('layouts.app')

@section('title', 'Kebijakan Privasi - Srikandi Travel')

@section('content')
    <!-- Hero Section -->
    <section class="py-20">
        <!-- Travel Mode Hero -->
        <div x-show="mode === 'travel'" class="bg-gradient-to-r from-blue-600 to-green-600 text-white py-20">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
                <h1 class="text-4xl md:text-5xl font-bold mb-6">Kebijakan Privasi</h1>
                <p class="text-xl md:text-2xl max-w-3xl mx-auto">
                    Bagaimana kami melindungi dan menggunakan data pribadi Anda
                </p>
            </div>
        </div>
        
        <!-- Umroh Mode Hero -->
        <div x-show="mode === 'umroh'" class="bg-gradient-to-r from-orange-500 to-yellow-500 text-white py-20">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
                <h1 class="text-4xl md:text-5xl font-bold mb-6">Kebijakan Privasi</h1>
                <p class="text-xl md:text-2xl max-w-3xl mx-auto">
                    Bagaimana kami melindungi dan menggunakan data pribadi Anda
                </p>
            </div>
        </div>
    </section>

    <!-- Privacy Content -->
    <section class="py-16 bg-white dark:bg-gray-800 transition-colors duration-300">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="prose prose-lg dark:prose-invert max-w-none">
                <h2 class="text-2xl font-bold text-gray-900 dark:text-white mb-6 transition-colors duration-300">1. Informasi yang Kami Kumpulkan</h2>
                <div class="text-gray-600 dark:text-gray-300 space-y-4 transition-colors duration-300">
                    <p>
                        Kami mengumpulkan informasi yang Anda berikan secara langsung kepada kami, termasuk:
                    </p>
                    <ul class="list-disc pl-6 space-y-2">
                        <li>Informasi pribadi (nama, alamat email, nomor telepon)</li>
                        <li>Informasi perjalanan (destinasi, tanggal, preferensi)</li>
                        <li>Informasi pembayaran (data kartu kredit, rekening bank)</li>
                        <li>Dokumen perjalanan (paspor, visa, dokumen kesehatan)</li>
                    </ul>
                    <p>
                        Kami juga dapat mengumpulkan informasi secara otomatis melalui teknologi seperti cookies, 
                        log server, dan teknologi pelacakan lainnya.
                    </p>
                </div>

                <h2 class="text-2xl font-bold text-gray-900 dark:text-white mb-6 mt-8 transition-colors duration-300">2. Bagaimana Kami Menggunakan Informasi</h2>
                <div class="text-gray-600 dark:text-gray-300 space-y-4 transition-colors duration-300">
                    <p>
                        Kami menggunakan informasi yang kami kumpulkan untuk:
                    </p>
                    <ul class="list-disc pl-6 space-y-2">
                        <li>Memproses dan mengelola pemesanan perjalanan Anda</li>
                        <li>Mengirimkan konfirmasi dan informasi perjalanan</li>
                        <li>Memberikan layanan pelanggan dan dukungan</li>
                        <li>Mengirimkan penawaran dan promosi yang relevan</li>
                        <li>Meningkatkan layanan dan pengalaman pengguna</li>
                        <li>Mematuhi kewajiban hukum dan regulasi</li>
                    </ul>
                </div>

                <h2 class="text-2xl font-bold text-gray-900 dark:text-white mb-6 mt-8 transition-colors duration-300">3. Berbagi Informasi</h2>
                <div class="text-gray-600 dark:text-gray-300 space-y-4 transition-colors duration-300">
                    <p>
                        Kami dapat berbagi informasi Anda dengan:
                    </p>
                    <ul class="list-disc pl-6 space-y-2">
                        <li>Penyedia layanan perjalanan (maskapai, hotel, transportasi)</li>
                        <li>Penyedia layanan pembayaran dan asuransi</li>
                        <li>Pihak berwenang sesuai dengan kewajiban hukum</li>
                        <li>Mitra bisnis yang telah menyetujui kebijakan privasi yang ketat</li>
                    </ul>
                    <p>
                        Kami tidak akan menjual, menyewakan, atau memberikan data pribadi Anda kepada pihak ketiga 
                        untuk tujuan komersial tanpa persetujuan Anda.
                    </p>
                </div>

                <h2 class="text-2xl font-bold text-gray-900 dark:text-white mb-6 mt-8 transition-colors duration-300">4. Keamanan Data</h2>
                <div class="text-gray-600 dark:text-gray-300 space-y-4 transition-colors duration-300">
                    <p>
                        Kami menerapkan langkah-langkah keamanan teknis dan organisasi yang sesuai untuk melindungi 
                        data pribadi Anda dari akses, penggunaan, atau pengungkapan yang tidak sah.
                    </p>
                    <p>
                        Langkah-langkah keamanan yang kami terapkan meliputi:
                    </p>
                    <ul class="list-disc pl-6 space-y-2">
                        <li>Enkripsi data dalam transit dan saat istirahat</li>
                        <li>Kontrol akses yang ketat</li>
                        <li>Pemantauan keamanan secara berkala</li>
                        <li>Pelatihan karyawan tentang keamanan data</li>
                    </ul>
                </div>

                <h2 class="text-2xl font-bold text-gray-900 dark:text-white mb-6 mt-8 transition-colors duration-300">5. Penyimpanan Data</h2>
                <div class="text-gray-600 dark:text-gray-300 space-y-4 transition-colors duration-300">
                    <p>
                        Kami menyimpan data pribadi Anda selama diperlukan untuk memberikan layanan kepada Anda 
                        dan mematuhi kewajiban hukum. Data akan dihapus atau dianonimkan ketika tidak lagi diperlukan.
                    </p>
                    <p>
                        <span x-show="mode === 'travel'">
                            Data pemesanan perjalanan akan disimpan selama 5 tahun sesuai dengan regulasi perpajakan.
                        </span>
                        <span x-show="mode === 'umroh'">
                            Data pemesanan umroh akan disimpan selama 7 tahun sesuai dengan regulasi umroh dan perpajakan.
                        </span>
                    </p>
                </div>

                <h2 class="text-2xl font-bold text-gray-900 dark:text-white mb-6 mt-8 transition-colors duration-300">6. Hak Anda</h2>
                <div class="text-gray-600 dark:text-gray-300 space-y-4 transition-colors duration-300">
                    <p>
                        Anda memiliki hak untuk:
                    </p>
                    <ul class="list-disc pl-6 space-y-2">
                        <li>Mengakses data pribadi Anda yang kami simpan</li>
                        <li>Memperbaiki data yang tidak akurat atau tidak lengkap</li>
                        <li>Meminta penghapusan data pribadi Anda</li>
                        <li>Membatasi pemrosesan data Anda</li>
                        <li>Memindahkan data Anda ke penyedia layanan lain</li>
                        <li>Menolak pemrosesan data untuk tujuan tertentu</li>
                    </ul>
                    <p>
                        Untuk menggunakan hak-hak ini, silakan hubungi kami melalui informasi kontak yang tersedia.
                    </p>
                </div>

                <h2 class="text-2xl font-bold text-gray-900 dark:text-white mb-6 mt-8 transition-colors duration-300">7. Cookies dan Teknologi Pelacakan</h2>
                <div class="text-gray-600 dark:text-gray-300 space-y-4 transition-colors duration-300">
                    <p>
                        Website kami menggunakan cookies dan teknologi pelacakan serupa untuk:
                    </p>
                    <ul class="list-disc pl-6 space-y-2">
                        <li>Mengingat preferensi dan pengaturan Anda</li>
                        <li>Menganalisis penggunaan website</li>
                        <li>Memberikan konten yang dipersonalisasi</li>
                        <li>Meningkatkan keamanan website</li>
                    </ul>
                    <p>
                        Anda dapat mengontrol penggunaan cookies melalui pengaturan browser Anda. 
                        Namun, menonaktifkan cookies dapat mempengaruhi fungsionalitas website.
                    </p>
                </div>

                <h2 class="text-2xl font-bold text-gray-900 dark:text-white mb-6 mt-8 transition-colors duration-300">8. Perubahan Kebijakan</h2>
                <div class="text-gray-600 dark:text-gray-300 space-y-4 transition-colors duration-300">
                    <p>
                        Kami dapat memperbarui kebijakan privasi ini dari waktu ke waktu. 
                        Perubahan akan diposting di website kami dan akan berlaku efektif segera setelah diposting.
                    </p>
                    <p>
                        Kami akan memberitahu Anda tentang perubahan signifikan melalui email atau pemberitahuan di website.
                    </p>
                </div>

                <h2 class="text-2xl font-bold text-gray-900 dark:text-white mb-6 mt-8 transition-colors duration-300">9. Kontak Kami</h2>
                <div class="text-gray-600 dark:text-gray-300 space-y-4 transition-colors duration-300">
                    <p>
                        Jika Anda memiliki pertanyaan tentang kebijakan privasi ini atau ingin menggunakan hak privasi Anda, 
                        silakan hubungi kami:
                    </p>
                    <div class="mt-6 p-6 bg-gray-50 dark:bg-gray-700 rounded-lg transition-colors duration-300">
                        <div class="space-y-2">
                            <p><strong>Data Protection Officer:</strong></p>
                            <p>📞 +62 812-3456-7890</p>
                            <p>📧 privacy@srikanditravel.com</p>
                            <p>📍 Jl. Sudirman No. 123, Jakarta Pusat</p>
                        </div>
                    </div>
                </div>

                <div class="mt-12 p-6 bg-blue-50 dark:bg-blue-900 rounded-lg transition-colors duration-300">
                    <h3 class="text-lg font-semibold text-blue-900 dark:text-blue-100 mb-4 transition-colors duration-300">Terakhir Diperbarui</h3>
                    <p class="text-blue-700 dark:text-blue-200 transition-colors duration-300">
                        Kebijakan privasi ini terakhir diperbarui pada tanggal 1 Januari 2024.
                    </p>
                </div>
            </div>
        </div>
    </section>
@endsection 