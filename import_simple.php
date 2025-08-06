<?php
// Simple Migration Script
echo "=== IMPORT OTOMATIS KE MYSQL ===\n\n";

// Cek apakah MySQL berjalan
$mysqli = new mysqli("localhost", "root", "", "");

if ($mysqli->connect_error) {
    echo "❌ Error: Tidak bisa koneksi ke MySQL\n";
    echo "Pastikan XAMPP/Laragon berjalan dan MySQL aktif\n";
    echo "Error: " . $mysqli->connect_error . "\n";
    exit;
}

echo "✓ Koneksi MySQL berhasil\n\n";

// Baca file SQL
$sqlFile = "simple_migrate_data.sql";
if (!file_exists($sqlFile)) {
    echo "❌ Error: File simple_migrate_data.sql tidak ditemukan\n";
    exit;
}

$sql = file_get_contents($sqlFile);
echo "✓ File SQL berhasil dibaca\n\n";

// Jalankan query
if ($mysqli->multi_query($sql)) {
    echo "✓ Import data berhasil!\n";
    echo "✓ Database srikandi_travel siap digunakan\n\n";
} else {
    echo "❌ Error import: " . $mysqli->error . "\n";
}

$mysqli->close();

echo "=== SELESAI ===\n";
echo "Sekarang Anda bisa:\n";
echo "1. Jalankan: php artisan migrate:fresh\n";
echo "2. Buka: http://localhost/SrikandiTravelLaravel\n";
echo "3. Login admin: srikanditravel@gmail.com / Bismillah@111\n";
echo "4. Test semua fitur\n";
echo "5. Buka phpMyAdmin: http://localhost/phpmyadmin\n";
echo "6. Lihat database srikandi_travel\n";
?>