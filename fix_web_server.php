<?php

echo "=== PERBAIKAN WEB SERVER ===\n\n";

// 1. Cek apakah Laragon berjalan
echo "1. Cek status Laragon...\n";

// Cek apakah Apache berjalan
$apacheRunning = false;
$output = shell_exec('netstat -an | findstr :80');
if (strpos($output, 'LISTENING') !== false) {
    $apacheRunning = true;
    echo "✓ Apache berjalan di port 80\n";
} else {
    echo "❌ Apache tidak berjalan di port 80\n";
}

// Cek apakah ada service di port lain
$output = shell_exec('netstat -an | findstr :8080');
if (strpos($output, 'LISTENING') !== false) {
    echo "✓ Ada service di port 8080\n";
}

$output = shell_exec('netstat -an | findstr :8000');
if (strpos($output, 'LISTENING') !== false) {
    echo "✓ Ada service di port 8000\n";
}

// 2. Buat script untuk start Laragon
echo "\n2. Membuat script untuk start Laragon...\n";

$startScript = '@echo off
echo Starting Laragon...
echo.

REM Cek apakah Laragon sudah berjalan
tasklist /FI "IMAGENAME eq Laragon.exe" 2>NUL | find /I /N "Laragon.exe">NUL
if "%ERRORLEVEL%"=="0" (
    echo Laragon sudah berjalan
) else (
    echo Starting Laragon...
    start "" "C:\laragon\laragon.exe"
    timeout /t 5 /nobreak > nul
)

REM Start Apache
echo Starting Apache...
net start Apache2.4 2>nul
if %ERRORLEVEL%==0 (
    echo ✓ Apache started
) else (
    echo Apache mungkin sudah berjalan
)

REM Start MySQL
echo Starting MySQL...
net start MySQL8.0 2>nul
if %ERRORLEVEL%==0 (
    echo ✓ MySQL started
) else (
    echo MySQL mungkin sudah berjalan
)

echo.
echo === STATUS ===
netstat -an | findstr ":80"
netstat -an | findstr ":3306"

echo.
echo Sekarang coba akses:
echo http://localhost/SrikandiTravelLaravel
echo http://localhost/phpmyadmin
pause';

file_put_contents('start_laragon.bat', $startScript);
echo "✓ Script start_laragon.bat telah dibuat\n";

// 3. Buat script untuk test akses
echo "\n3. Membuat script test akses...\n";
$testScript = '<?php
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
?>';

file_put_contents('test_web_access.php', $testScript);
echo "✓ Script test_web_access.php telah dibuat\n";

// 4. Buat panduan troubleshooting
echo "\n4. Membuat panduan troubleshooting...\n";
$troubleshootGuide = '# 🔧 Panduan Troubleshooting Web Server

## Masalah: ERR_CONNECTION_REFUSED

### Langkah 1: Start Laragon
1. Buka Laragon
2. Klik tombol "Start All"
3. Pastikan Apache dan MySQL berjalan (hijau)

### Langkah 2: Cek Port
```bash
netstat -an | findstr :80
netstat -an | findstr :3306
```

### Langkah 3: Test Akses
```bash
php test_web_access.php
```

### Langkah 4: Alternatif URL
Jika masih error, coba:
- http://localhost:8080/SrikandiTravelLaravel
- http://127.0.0.1/SrikandiTravelLaravel
- http://localhost:8000/SrikandiTravelLaravel

### Langkah 5: Restart Services
1. Stop Laragon
2. Restart komputer
3. Start Laragon lagi

### Langkah 6: Cek Firewall
1. Buka Windows Defender Firewall
2. Allow Laragon dan Apache
3. Allow port 80 dan 3306

## Credentials Database
- Username: srikandi_user
- Password: Srikandi123!
- Database: srikandi_travel

## Credentials Admin
- Email: srikanditravel@gmail.com
- Password: Bismillah@111
';

file_put_contents('TROUBLESHOOTING.md', $troubleshootGuide);
echo "✓ File TROUBLESHOOTING.md telah dibuat\n\n";

echo "=== PERBAIKAN SELESAI ===\n\n";
echo "Langkah selanjutnya:\n";
echo "1. Jalankan: start_laragon.bat\n";
echo "2. Jalankan: php test_web_access.php\n";
echo "3. Coba akses: http://localhost/SrikandiTravelLaravel\n";
echo "4. Jika masih error, lihat TROUBLESHOOTING.md\n\n";

echo "=== ALTERNATIF URL ===\n";
echo "Jika localhost tidak bisa:\n";
echo "- http://127.0.0.1/SrikandiTravelLaravel\n";
echo "- http://localhost:8080/SrikandiTravelLaravel\n";
echo "- http://localhost:8000/SrikandiTravelLaravel\n\n";

echo "=== CREDENTIALS ===\n";
echo "Admin: srikanditravel@gmail.com / Bismillah@111\n";
echo "Database: srikandi_user / Srikandi123!\n"; 