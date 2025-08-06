# Media Troubleshooting Guide

## Masalah: Media Tidak Tampil Setelah Upload

### 1. Periksa File Media Settings

**Langkah 1**: Periksa file `storage/app/media_settings.json`
```bash
cat storage/app/media_settings.json
```

**Contoh yang benar**:
```json
{
    "travel_logo": "logos/k7z57EzQ41RrXwXK1tS4McCKUpNr14n5QP5t8HmN.png",
    "umroh_logo": "logos/Av6ncv8VxarZOKKHm5Og9uontVtC5feFeEMgDWZP.png",
    "travel_bg_desktop": "backgrounds/travel/GuNSx9IhgkJIRKID6hAJIEWWYtodh8YX57WrSmSJ.jpg",
    "travel_bg_tablet": "backgrounds/travel/Af8mZXCrJBKq6HVEwmZcSsaxjPbiNRudDUf3TelI.png",
    "travel_bg_mobile": "backgrounds/travel/6sMjYMPghef0mofuoI2HNk5VO59Ya6aVPEzCQnZF.png",
    "umroh_bg_desktop": "backgrounds/umroh/HhYrpmyE0ktHX5HqttaJGuiMvcwgVLgIjYfu6uze.jpg",
    "umroh_bg_tablet": "backgrounds/umroh/qhX59ThzuLCacciTcgFT5E6sm4aMkoMQ4Osyt4eK.png",
    "umroh_bg_mobile": "backgrounds/umroh/G5Hu225QoTQB9F9w3mu4qXW9cHSsVIjNMyK7vPAP.png"
}
```

### 2. Periksa File Storage

**Langkah 2**: Periksa apakah file ada di storage
```bash
# Periksa logo
dir storage\app\public\logos

# Periksa background travel
dir storage\app\public\backgrounds\travel

# Periksa background umroh
dir storage\app\public\backgrounds\umroh
```

### 3. Periksa Public Storage

**Langkah 3**: Periksa apakah file sudah tersalin ke public storage
```bash
# Periksa public storage
dir public\storage\logos
dir public\storage\backgrounds\travel
dir public\storage\backgrounds\umroh
```

### 4. Copy Files ke Public Storage

**Langkah 4**: Jika file tidak ada di public storage, jalankan command:
```bash
php artisan storage:copy
```

### 5. Debug Media Settings

**Langkah 5**: Akses debug endpoint untuk memeriksa pengaturan
```
http://localhost/debug-media
```

Response akan menampilkan:
- Media settings yang aktif
- Device type yang terdeteksi
- User agent
- Status keberadaan background

### 6. Periksa Device Detection

**Langkah 6**: Periksa apakah device detection berfungsi

**Desktop**: `desktop`
**Tablet**: `tablet` 
**Mobile**: `mobile`

### 7. Periksa URL File

**Langkah 7**: Coba akses file langsung
```
http://localhost/storage/logos/k7z57EzQ41RrXwXK1tS4McCKUpNr14n5QP5t8HmN.png
http://localhost/storage/backgrounds/travel/GuNSx9IhgkJIRKID6hAJIEWWYtodh8YX57WrSmSJ.jpg
```

### 8. Clear Cache

**Langkah 8**: Clear cache Laravel
```bash
php artisan cache:clear
php artisan config:clear
php artisan view:clear
```

### 9. Periksa Permission

**Langkah 9**: Periksa permission folder
```bash
# Windows
icacls storage\app\public /grant Everyone:F /T
icacls public\storage /grant Everyone:F /T

# Linux/Mac
chmod -R 755 storage/
chmod -R 755 public/storage/
```

### 10. Restart Web Server

**Langkah 10**: Restart web server
```bash
# Laragon
# Klik kanan pada Laragon -> Restart All

# XAMPP
# Stop Apache dan MySQL, kemudian Start lagi
```

## Solusi Cepat

### Jika semua file sudah ada tapi tidak tampil:

1. **Jalankan copy command**:
```bash
php artisan storage:copy
```

2. **Clear cache**:
```bash
php artisan cache:clear
```

3. **Restart web server**

4. **Akses debug endpoint**:
```
http://localhost/debug-media
```

### Jika file tidak ada di storage:

1. **Upload ulang file** melalui admin panel
2. **Periksa error log** di `storage/logs/laravel.log`
3. **Periksa upload_max_filesize** di `php.ini`

## Common Issues

### Issue 1: File tidak tersimpan
**Solusi**: Periksa permission folder storage

### Issue 2: File tersimpan tapi tidak tampil
**Solusi**: Jalankan `php artisan storage:copy`

### Issue 3: Background tidak sesuai device
**Solusi**: Periksa device detection di debug endpoint

### Issue 4: Logo tidak muncul
**Solusi**: Periksa path di media settings JSON

## Debug Commands

```bash
# Periksa media settings
php artisan tinker --execute="echo json_encode(json_decode(file_get_contents(storage_path('app/media_settings.json'))), JSON_PRETTY_PRINT);"

# Periksa device detection
php artisan tinker --execute="echo app('App\Http\Controllers\SiteController')->getDeviceType();"

# Copy files
php artisan storage:copy

# Clear cache
php artisan cache:clear
```

## Support

Jika masalah masih berlanjut, silakan:
1. Periksa error log: `storage/logs/laravel.log`
2. Akses debug endpoint: `http://localhost/debug-media`
3. Hubungi tim development dengan informasi debug 