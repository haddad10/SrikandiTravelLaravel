# 🔧 Panduan Troubleshooting Web Server

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
