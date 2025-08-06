# Cara Mengganti Gambar Background Hero Section

## Opsi 1: Upload Gambar ke Storage (Direkomendasikan)

### Langkah-langkah:

1. **Siapkan gambar Anda:**
   - Format: JPG, PNG, atau WebP (semua format didukung)
   - Ukuran: Minimal 1920x1080px (untuk kualitas baik)
   - Nama file: `travel-bg.jpg` (atau .png/.webp) dan `umroh-bg.jpg` (atau .png/.webp)

2. **Upload gambar ke direktori:**
   ```
   public/storage/hero/travel-bg.jpg    (untuk mode Travel)
   public/storage/hero/umroh-bg.jpg     (untuk mode Umroh)
   
   Atau dengan format lain:
   public/storage/hero/travel-bg.png    (untuk mode Travel)
   public/storage/hero/umroh-bg.png     (untuk mode Umroh)
   ```

3. **Pastikan direktori ada:**
   ```bash
   mkdir -p public/storage/hero
   ```

4. **Upload gambar Anda ke direktori tersebut**

## Opsi 2: Ganti URL Langsung di Kode

### Edit file: `resources/views/site/home.blade.php`

**Untuk Mode Travel (baris ~10):**
```html
<img src="URL_GAMBAR_ANDA_DISINI" 
     alt="Travel Background" 
     class="w-full h-full object-cover">
```

**Untuk Mode Umroh (baris ~16):**
```html
<img src="URL_GAMBAR_ANDA_DISINI" 
     alt="Umroh Background" 
     class="w-full h-full object-cover">
```

## Opsi 3: Ganti URL di Controller

### Edit file: `app/Http/Controllers/SiteController.php`

Cari bagian ini di method `index()`:
```php
$heroImages = [
    'travel' => asset('storage/hero/travel-bg.jpg') ?: 'URL_DEFAULT_TRAVEL',
    'umroh' => asset('storage/hero/umroh-bg.jpg') ?: 'URL_DEFAULT_UMROH'
];
```

Ganti `URL_DEFAULT_TRAVEL` dan `URL_DEFAULT_UMROH` dengan URL gambar Anda.

## Tips untuk Gambar Background:

1. **Ukuran yang disarankan:** 1920x1080px atau lebih besar
2. **Format:** JPG untuk foto, PNG untuk gambar dengan transparansi
3. **Kualitas:** Gunakan gambar berkualitas tinggi
4. **Kontras:** Pastikan teks putih tetap terbaca di atas gambar
5. **Tema:**
   - **Travel:** Gambar landscape, destinasi wisata, atau aktivitas travel
   - **Umroh:** Gambar Masjidil Haram, Masjid Nabawi, atau aktivitas ibadah

## Contoh URL Gambar Gratis:

### Travel:
- https://images.unsplash.com/photo-1488646953014-85cb44e25828
- https://images.unsplash.com/photo-1506905925346-21bda4d32df4
- https://images.unsplash.com/photo-1469474968028-56623f02e42e

### Umroh:
- https://images.unsplash.com/photo-1542810634-71277d95dcbb
- https://images.unsplash.com/photo-1519748174341-7c8c85c2c1b5
- https://images.unsplash.com/photo-1519748174341-7c8c85c2c1b5

## Setelah Mengganti Gambar:

1. **Clear cache browser** untuk melihat perubahan
2. **Test di kedua mode** (Travel dan Umroh)
3. **Pastikan gambar responsive** di mobile dan desktop

## Troubleshooting:

### Jika gambar tidak muncul:

1. **Periksa nama file:**
   - Pastikan nama file tepat: `travel-bg.png` atau `umroh-bg.png`
   - Periksa ekstensi file (PNG, JPG, dll)

2. **Periksa direktori:**
   ```bash
   dir public\storage\hero\
   ```

3. **Clear cache Laravel:**
   ```bash
   php artisan config:clear
   php artisan route:clear
   php artisan view:clear
   ```

4. **Periksa symbolic link:**
   ```bash
   php artisan storage:link
   ```

5. **Test akses langsung:**
   - Buka: `http://127.0.0.1:8000/storage/hero/travel-bg.png`
   - Jika tidak bisa diakses, ada masalah dengan file atau symbolic link

### Format yang didukung:
- JPG/JPEG
- PNG  
- WebP 