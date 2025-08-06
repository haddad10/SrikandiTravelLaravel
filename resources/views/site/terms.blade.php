@extends('layouts.app')

@section('title', 'Syarat & Ketentuan - Srikandi Travel')

@section('content')
    <!-- Hero Section -->
    <section class="py-20">
        <!-- Travel Mode Hero -->
        <div x-show="mode === 'travel'" class="bg-gradient-to-r from-blue-600 to-green-600 text-white py-20">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
                <h1 class="text-4xl md:text-5xl font-bold mb-6">Syarat & Ketentuan</h1>
                <p class="text-xl md:text-2xl max-w-3xl mx-auto">Ketentuan layanan Srikandi Tour And Travel</p>
            </div>
        </div>
        
        <!-- Umroh Mode Hero -->
        <div x-show="mode === 'umroh'" class="bg-gradient-to-r from-orange-500 to-yellow-500 text-white py-20">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
                <h1 class="text-4xl md:text-5xl font-bold mb-6">Syarat & Ketentuan</h1>
                <p class="text-xl md:text-2xl max-w-3xl mx-auto">Ketentuan layanan Srikandi Umroh</p>
            </div>
        </div>
    </section>

    <!-- Terms Content -->
    <section class="py-16 bg-white dark:bg-gray-800 transition-colors duration-300">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="prose prose-lg dark:prose-invert max-w-none">
                <h2 class="text-2xl font-bold text-gray-900 dark:text-white mb-6 transition-colors duration-300">1. Ketentuan Umum</h2>
                <div class="text-gray-600 dark:text-gray-300 space-y-4 transition-colors duration-300">
                    <p>
                        Dengan menggunakan layanan kami, Anda menyetujui untuk mematuhi semua syarat dan ketentuan yang berlaku. 
                        Syarat dan ketentuan ini berlaku untuk semua layanan yang disediakan oleh Srikandi Travel.
                    </p>
                    <p>
                        Kami berhak untuk mengubah syarat dan ketentuan ini sewaktu-waktu tanpa pemberitahuan terlebih dahulu. 
                        Perubahan akan berlaku efektif segera setelah diposting di website kami.
                    </p>
                </div>

                <h2 class="text-2xl font-bold text-gray-900 dark:text-white mb-6 mt-8 transition-colors duration-300">2. Pemesanan dan Pembayaran</h2>
                <div class="text-gray-600 dark:text-gray-300 space-y-4 transition-colors duration-300">
                    <p>
                        Semua pemesanan harus dilakukan melalui website resmi kami atau melalui agen resmi kami.
                        Pembayaran dapat dilakukan melalui transfer bank, pembayaran online, atau pembayaran tunai di kantor kami.
                    </p>
                    <p>
                        <span x-show="mode === 'travel'">
                            Untuk paket wisata, pembayaran DP minimal 30% dari total harga paket harus dilakukan saat pemesanan.
                            Pelunasan harus dilakukan minimal 7 hari sebelum keberangkatan.
                        </span>
                        <span x-show="mode === 'umroh'">
                            Untuk paket umroh, pembayaran DP minimal 50% dari total harga paket harus dilakukan saat pemesanan.
                            Pelunasan harus dilakukan minimal 14 hari sebelum keberangkatan.
                        </span>
                    </p>
                    <p>
                        Harga yang ditampilkan sudah termasuk pajak dan biaya administrasi yang berlaku.
                    </p>
                </div>

                <h2 class="text-2xl font-bold text-gray-900 dark:text-white mb-6 mt-8 transition-colors duration-300">3. Pembatalan dan Refund</h2>
                <div class="text-gray-600 dark:text-gray-300 space-y-4 transition-colors duration-300">
                    <p>
                        Pembatalan dapat dilakukan dengan pemberitahuan tertulis kepada kami.
                        Kebijakan refund mengikuti ketentuan berikut:
                    </p>
                    <ul class="list-disc pl-6 space-y-2">
                        <li>Pembatalan 30 hari sebelum keberangkatan: refund 80% dari total pembayaran</li>
                        <li>Pembatalan 15-29 hari sebelum keberangkatan: refund 50% dari total pembayaran</li>
                        <li>Pembatalan 7-14 hari sebelum keberangkatan: refund 25% dari total pembayaran</li>
                        <li>Pembatalan kurang dari 7 hari: tidak ada refund</li>
                    </ul>
                    <p>
                        Refund akan diproses dalam waktu 14 hari kerja setelah permintaan disetujui.
                    </p>
                </div>

                <h2 class="text-2xl font-bold text-gray-900 dark:text-white mb-6 mt-8 transition-colors duration-300">4. Tanggung Jawab</h2>
                <div class="text-gray-600 dark:text-gray-300 space-y-4 transition-colors duration-300">
                    <p>
                        <span x-show="mode === 'travel'">
                            Kami bertanggung jawab atas layanan yang kami sediakan sesuai dengan paket yang dipilih.
                            Namun, kami tidak bertanggung jawab atas kejadian di luar kendali kami seperti bencana alam, 
                            kerusuhan, atau kebijakan pemerintah yang mempengaruhi perjalanan.
                        </span>
                        <span x-show="mode === 'umroh'">
                            Kami bertanggung jawab atas layanan umroh yang kami sediakan sesuai dengan paket yang dipilih.
                            Namun, kami tidak bertanggung jawab atas kejadian di luar kendali kami seperti bencana alam, 
                            kerusuhan, atau kebijakan pemerintah yang mempengaruhi perjalanan umroh.
                        </span>
                    </p>
                    <p>
                        Peserta bertanggung jawab untuk mematuhi semua peraturan yang berlaku di destinasi tujuan,
                        termasuk peraturan imigrasi, kesehatan, dan keamanan.
                    </p>
                </div>

                <h2 class="text-2xl font-bold text-gray-900 dark:text-white mb-6 mt-8 transition-colors duration-300">5. Dokumen Perjalanan</h2>
                <div class="text-gray-600 dark:text-gray-300 space-y-4 transition-colors duration-300">
                    <p>
                        Peserta bertanggung jawab untuk menyediakan dokumen perjalanan yang valid dan lengkap,
                        termasuk paspor, visa (jika diperlukan), dan dokumen kesehatan yang diperlukan.
                    </p>
                    <p>
                        <span x-show="mode === 'travel'">
                            Untuk perjalanan internasional, paspor harus berlaku minimal 6 bulan setelah tanggal kembali.
                        </span>
                        <span x-show="mode === 'umroh'">
                            Untuk perjalanan umroh, paspor harus berlaku minimal 6 bulan setelah tanggal kembali.
                            Visa umroh akan diurus oleh kami sesuai dengan ketentuan yang berlaku.
                        </span>
                    </p>
                </div>

                <h2 class="text-2xl font-bold text-gray-900 dark:text-white mb-6 mt-8 transition-colors duration-300">6. Asuransi</h2>
                <div class="text-gray-600 dark:text-gray-300 space-y-4 transition-colors duration-300">
                    <p>
                        <span x-show="mode === 'travel'">
                            Semua peserta akan mendapatkan asuransi perjalanan sesuai dengan paket yang dipilih.
                            Detail asuransi akan diberikan sebelum keberangkatan.
                        </span>
                        <span x-show="mode === 'umroh'">
                            Semua peserta umroh akan mendapatkan asuransi perjalanan dan asuransi kesehatan sesuai dengan paket yang dipilih.
                            Detail asuransi akan diberikan sebelum keberangkatan.
                        </span>
                    </p>
                </div>

                <h2 class="text-2xl font-bold text-gray-900 dark:text-white mb-6 mt-8 transition-colors duration-300">7. Komunikasi</h2>
                <div class="text-gray-600 dark:text-gray-300 space-y-4 transition-colors duration-300">
                    <p>
                        Semua komunikasi resmi akan dilakukan melalui email, WhatsApp, atau telepon yang terdaftar.
                        Peserta wajib memberikan informasi kontak yang valid dan aktif.
                    </p>
                </div>

                <h2 class="text-2xl font-bold text-gray-900 dark:text-white mb-6 mt-8 transition-colors duration-300">8. Penyelesaian Sengketa</h2>
                <div class="text-gray-600 dark:text-gray-300 space-y-4 transition-colors duration-300">
                    <p>
                        Setiap sengketa yang timbul akan diselesaikan melalui musyawarah dan mufakat.
                        Jika tidak tercapai kesepakatan, sengketa akan diselesaikan melalui pengadilan yang berwenang.
                    </p>
                </div>

                <div class="mt-12 p-6 bg-gray-50 dark:bg-gray-700 rounded-lg transition-colors duration-300">
                    <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-4 transition-colors duration-300">Kontak untuk Pertanyaan</h3>
                    <div class="text-gray-600 dark:text-gray-300 space-y-2 transition-colors duration-300">
                        <p>Jika Anda memiliki pertanyaan tentang syarat dan ketentuan ini, silakan hubungi kami:</p>
                        <p>📞 +62 812-3456-7890</p>
                        <p>📧 info@srikanditravel.com</p>
                        <p>📍 Jl. Sudirman No. 123, Jakarta Pusat</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection 