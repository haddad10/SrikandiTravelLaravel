# 🔧 Panduan Manual Fix Laravel

## Masalah: Directory Listing Muncul

### Solusi 1: Akses Langsung ke Public
Coba akses:
- http://localhost/SrikandiTravelLaravel/public
- http://127.0.0.1/SrikandiTravelLaravel/public

### Solusi 2: Konfigurasi Virtual Host
1. Buka Laragon
2. Klik "Apache" > "sites-enabled"
3. Buat virtual host baru:
```
<VirtualHost *:80>
    DocumentRoot "C:/laragon/www/SrikandiTravelLaravel/public"
    ServerName srikanditravel.local
    <Directory "C:/laragon/www/SrikandiTravelLaravel/public">
        AllowOverride All
        Require all granted
    </Directory>
</VirtualHost>
```

### Solusi 3: Restart Apache
1. Stop Apache di Laragon
2. Start Apache lagi
3. Cek apakah mod_rewrite aktif

### Solusi 4: Cek File .htaccess
Pastikan file .htaccess ada di:
- Root folder: .htaccess
- Public folder: public/.htaccess

## Credentials
- Admin: srikanditravel@gmail.com / Bismillah@111
- Database: srikandi_user / Srikandi123!
