# Media Management System

## Overview
Sistem pengelolaan media untuk website Srikandi Travel yang memungkinkan admin untuk mengatur logo dan background dengan dukungan responsif untuk desktop (landscape), tablet, dan mobile (portrait).

## Fitur Utama

### 1. Logo Management
- **Travel Logo**: Logo khusus untuk mode travel
- **Umroh Logo**: Logo khusus untuk mode umroh
- **Format Support**: JPG, PNG, GIF, SVG
- **Max Size**: 5MB

### 2. Background Management
- **Desktop (Landscape)**: Rasio 16:9, minimal 1920x1080px
- **Tablet (Portrait)**: Rasio 4:3, minimal 1024x768px  
- **Mobile (Portrait)**: Rasio 9:16, minimal 720x1280px
- **Format Support**: JPG, PNG, GIF, WebP
- **Max Size**: 10MB

### 3. Responsive Background Detection
Sistem secara otomatis mendeteksi device type dan memilih background yang sesuai:
- **Desktop**: Background landscape untuk layar besar
- **Tablet**: Background portrait untuk tablet
- **Mobile**: Background portrait untuk smartphone

## Cara Mengakses

### Via Admin Panel
1. Login ke admin panel: `/admin/login`
2. Klik menu "Pengaturan Media" di dashboard
3. Atau akses langsung: `/admin/media`

### Via URL
```
http://localhost/admin/media
```

## Cara Penggunaan

### Upload Logo
1. Pilih file logo (JPG, PNG, GIF, SVG)
2. Klik "Upload Logo Travel" atau "Upload Logo Umroh"
3. Preview akan muncul setelah file dipilih
4. Klik "Simpan Pengaturan" untuk menyimpan

### Upload Background
1. Pilih device type (Desktop/Tablet/Mobile)
2. Pilih mode (Travel/Umroh)
3. Upload file background sesuai rasio yang disarankan
4. Preview akan muncul setelah file dipilih
5. Klik "Simpan Pengaturan" untuk menyimpan

### Hapus Media
1. Klik tombol "Hapus Logo" atau "Hapus Background"
2. Konfirmasi penghapusan
3. Media akan dihapus dari storage dan database

## Struktur File

### Storage Structure
```
storage/app/public/
├── logos/
│   ├── travel_logo.jpg
│   └── umroh_logo.png
└── backgrounds/
    ├── travel/
    │   ├── travel_bg_desktop.jpg
    │   ├── travel_bg_tablet.jpg
    │   └── travel_bg_mobile.jpg
    └── umroh/
        ├── umroh_bg_desktop.jpg
        ├── umroh_bg_tablet.jpg
        └── umroh_bg_mobile.jpg
```

### Settings File
```
storage/app/media_settings.json
```

## Technical Implementation

### Controller
- **File**: `app/Http/Controllers/AdminMediaController.php`
- **Methods**:
  - `index()`: Tampilkan halaman media management
  - `update()`: Upload dan simpan media
  - `deleteMedia()`: Hapus media

### Routes
```php
Route::get('/admin/media', [AdminMediaController::class, 'index'])->name('admin.media.index');
Route::post('/admin/media', [AdminMediaController::class, 'update'])->name('admin.media.update');
Route::delete('/admin/media', [AdminMediaController::class, 'deleteMedia'])->name('admin.media.delete');
```

### View
- **File**: `resources/views/admin/media/index.blade.php`
- **Features**:
  - Drag & drop upload
  - Image preview
  - Responsive design
  - Dark mode support

### SiteController Integration
- **Device Detection**: Otomatis deteksi device type
- **Responsive Background**: Pilih background sesuai device
- **Fallback System**: Gunakan default image jika custom image tidak ada

## Best Practices

### Image Optimization
1. **Desktop Background**: Gunakan gambar landscape berkualitas tinggi
2. **Tablet Background**: Optimalkan untuk rasio 4:3
3. **Mobile Background**: Optimalkan untuk rasio 9:16
4. **Logo**: Gunakan format SVG untuk kualitas terbaik

### File Naming
- **Logo**: `travel_logo.jpg`, `umroh_logo.png`
- **Background**: `travel_bg_desktop.jpg`, `umroh_bg_mobile.png`

### Performance Tips
1. Kompres gambar sebelum upload
2. Gunakan format WebP untuk background
3. Optimalkan ukuran file sesuai kebutuhan
4. Gunakan lazy loading untuk background

## Troubleshooting

### Common Issues

#### 1. Storage Link Error
```bash
php artisan storage:link
```

#### 2. Permission Error
```bash
chmod -R 755 storage/
chmod -R 755 public/storage/
```

#### 3. File Upload Error
- Periksa `php.ini` settings
- Pastikan `upload_max_filesize` dan `post_max_size` cukup
- Periksa folder permissions

#### 4. Background Tidak Muncul
- Periksa symbolic link storage
- Pastikan file tersimpan di lokasi yang benar
- Periksa media settings JSON file

### Debug Commands
```bash
# Check storage link
ls -la public/storage

# Check media settings
cat storage/app/media_settings.json

# Clear cache
php artisan cache:clear
php artisan config:clear
```

## Security Considerations

1. **File Validation**: Hanya format gambar yang diizinkan
2. **Size Limitation**: Maksimal 10MB untuk background, 5MB untuk logo
3. **Path Security**: File disimpan di storage yang aman
4. **Admin Authentication**: Hanya admin yang bisa akses

## Future Enhancements

1. **Image Cropping**: Tool untuk crop gambar sesuai rasio
2. **Bulk Upload**: Upload multiple file sekaligus
3. **Image Compression**: Auto-compress gambar saat upload
4. **CDN Integration**: Support untuk CDN
5. **Version Control**: History perubahan media
6. **Watermark**: Auto-add watermark pada background

## Support

Untuk bantuan teknis atau pertanyaan, silakan hubungi tim development. 