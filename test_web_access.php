<?php
echo "=== TEST AKSES WEB SERVER ===\n\n";

// Test koneksi ke localhost
$urls = [
    "http://localhost",
    "http://localhost/SrikandiTravelLaravel",
    "http://localhost/phpmyadmin"
];

foreach ($urls as $url) {
    echo "Testing: $url\n";
    
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_TIMEOUT, 5);
    curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 5);
    
    $response = curl_exec($ch);
    $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    $error = curl_error($ch);
    curl_close($ch);
    
    if ($error) {
        echo "❌ Error: $error\n";
    } elseif ($httpCode == 200) {
        echo "✓ Berhasil (HTTP $httpCode)\n";
    } else {
        echo "⚠️ HTTP Code: $httpCode\n";
    }
    echo "\n";
}

echo "=== SOLUSI JIKA MASIH ERROR ===\n";
echo "1. Jalankan: start_laragon.bat\n";
echo "2. Pastikan Laragon berjalan\n";
echo "3. Cek Apache dan MySQL di Laragon\n";
echo "4. Restart Laragon jika perlu\n";
echo "5. Cek firewall Windows\n";
?>