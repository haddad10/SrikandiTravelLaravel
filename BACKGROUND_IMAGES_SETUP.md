# Background Images Setup Guide

## Overview
Panduan lengkap untuk menambahkan background images ke website Srikandi Travel & Umroh dengan versi yang berbeda untuk mobile (portrait) dan desktop (landscape).

## Struktur File Background

### 1. Lokasi File Images
```
public/images/backgrounds/
├── travel-desktop.jpg          # Desktop/Landscape version
├── travel-mobile-portrait.jpg  # Mobile Portrait version
├── umroh-desktop.jpg          # Desktop/Landscape version
└── umroh-mobile-portrait.jpg  # Mobile Portrait version
```

### 2. File CSS Background
```
public/css/backgrounds.css      # CSS untuk background images
```

## Cara Menambahkan Background Images

### Langkah 1: Siapkan Images

#### Untuk Travel Mode:
1. **Desktop Version** (`travel-desktop.jpg`):
   - Ukuran: 1920x1080px atau 2560x1440px
   - Format: JPG/JPEG
   - Orientasi: Landscape
   - Konten: Travel destinations, landmarks, adventure

2. **Mobile Portrait Version** (`travel-mobile-portrait.jpg`):
   - Ukuran: 1080x1920px atau 720x1280px
   - Format: JPG/JPEG
   - Orientasi: Portrait
   - Konten: Sama dengan desktop tapi dioptimasi untuk mobile

#### Untuk Umroh Mode:
1. **Desktop Version** (`umroh-desktop.jpg`):
   - Ukuran: 1920x1080px atau 2560x1440px
   - Format: JPG/JPEG
   - Orientasi: Landscape
   - Konten: Islamic landmarks, Kaaba, mosques

2. **Mobile Portrait Version** (`umroh-mobile-portrait.jpg`):
   - Ukuran: 1080x1920px atau 720x1280px
   - Format: JPG/JPEG
   - Orientasi: Portrait
   - Konten: Sama dengan desktop tapi dioptimasi untuk mobile

### Langkah 2: Upload Images

1. **Buat folder backgrounds:**
   ```bash
   mkdir -p public/images/backgrounds
   ```

2. **Upload images ke folder:**
   - Copy semua file images ke `public/images/backgrounds/`
   - Pastikan nama file sesuai dengan yang ada di CSS

### Langkah 3: Optimasi Images

#### Untuk Desktop:
```bash
# Optimasi untuk desktop (landscape)
convert travel-desktop.jpg -resize 1920x1080^ -gravity center -extent 1920x1080 travel-desktop-optimized.jpg
convert umroh-desktop.jpg -resize 1920x1080^ -gravity center -extent 1920x1080 umroh-desktop-optimized.jpg
```

#### Untuk Mobile:
```bash
# Optimasi untuk mobile (portrait)
convert travel-mobile-portrait.jpg -resize 1080x1920^ -gravity center -extent 1080x1920 travel-mobile-portrait-optimized.jpg
convert umroh-mobile-portrait.jpg -resize 1080x1920^ -gravity center -extent 1080x1920 umroh-mobile-portrait-optimized.jpg
```

## CSS Background System

### 1. File CSS (`public/css/backgrounds.css`)

```css
/* Travel Mode Backgrounds */
.hero-section.travel-mode {
    background-image: url('/images/backgrounds/travel-desktop.jpg');
    background-size: cover;
    background-position: center;
    background-repeat: no-repeat;
}

/* Umroh Mode Backgrounds */
.hero-section.umroh-mode {
    background-image: url('/images/backgrounds/umroh-desktop.jpg');
    background-size: cover;
    background-position: center;
    background-repeat: no-repeat;
}

/* Mobile Portrait Backgrounds */
@media (max-width: 768px) {
    .hero-section.travel-mode {
        background-image: url('/images/backgrounds/travel-mobile-portrait.jpg');
        background-position: center top;
    }
    
    .hero-section.umroh-mode {
        background-image: url('/images/backgrounds/umroh-mobile-portrait.jpg');
        background-position: center top;
    }
}
```

### 2. Fallback System

```css
/* Fallback Gradients if images fail to load */
.hero-section.travel-mode.fallback {
    background-image: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
}

.hero-section.umroh-mode.fallback {
    background-image: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);
}
```

## Cara Kerja System

### 1. Responsive Background Selection
- **Desktop (>768px):** Menggunakan `travel-desktop.jpg` atau `umroh-desktop.jpg`
- **Mobile (≤768px):** Menggunakan `travel-mobile-portrait.jpg` atau `umroh-mobile-portrait.jpg`

### 2. Portrait Focus di Mobile
- Mobile selalu menggunakan `background-position: center top`
- Fokus pada bagian atas gambar untuk portrait orientation
- Bahkan dalam landscape mode, tetap menggunakan portrait background

### 3. Fallback System
- Jika image gagal dimuat, CSS akan menggunakan gradient fallback
- JavaScript mendeteksi jika background image tidak berhasil dimuat
- Menambahkan class `fallback` untuk mengaktifkan gradient

## Testing

### 1. Desktop Testing
```bash
# Buka di browser desktop
http://127.0.0.1:8000
```
- Background harus menggunakan desktop version
- Landscape orientation

### 2. Mobile Testing
```bash
# Buka di mobile device atau browser developer tools
# Set device to mobile viewport
```
- **Portrait Mode:** Background menggunakan mobile portrait version
- **Landscape Mode:** Background tetap menggunakan mobile portrait version
- Fokus pada bagian atas gambar

### 3. Fallback Testing
```bash
# Rename salah satu image file untuk test fallback
mv public/images/backgrounds/travel-desktop.jpg public/images/backgrounds/travel-desktop.jpg.bak
```
- Gradient fallback harus muncul
- Tidak ada background kosong

## Tips Optimasi

### 1. Image Size
- **Desktop:** Max 2MB, 1920x1080px
- **Mobile:** Max 1MB, 1080x1920px
- Gunakan format JPG untuk foto, PNG untuk graphics

### 2. Content Guidelines
- **Travel Mode:** Landmarks, destinations, adventure scenes
- **Umroh Mode:** Islamic architecture, Kaaba, mosques
- Pastikan text tetap readable di atas background

### 3. Performance
- Gunakan `loading="eager"` untuk hero images
- Implement lazy loading untuk images lainnya
- Optimasi file size dengan compression

## Troubleshooting

### 1. Background Tidak Muncul
```bash
# Check file permissions
chmod 644 public/images/backgrounds/*.jpg

# Check file exists
ls -la public/images/backgrounds/
```

### 2. Mobile Background Tidak Berubah
```bash
# Clear browser cache
# Check CSS media queries
# Verify file paths in CSS
```

### 3. Fallback Tidak Bekerja
```bash
# Check JavaScript console for errors
# Verify CSS fallback classes
# Test with renamed image files
```

## File yang Terlibat

### 1. CSS Files
- `public/css/backgrounds.css` - Background image definitions
- `resources/views/site/home.blade.php` - Hero section styling

### 2. Image Files
- `public/images/backgrounds/travel-desktop.jpg`
- `public/images/backgrounds/travel-mobile-portrait.jpg`
- `public/images/backgrounds/umroh-desktop.jpg`
- `public/images/backgrounds/umroh-mobile-portrait.jpg`

### 3. Template Files
- `resources/views/site/home.blade.php` - Hero section template

## Kesimpulan

Dengan system ini, Anda dapat:
- ✅ Menggunakan background yang berbeda untuk mobile dan desktop
- ✅ Mobile selalu menggunakan orientasi portrait
- ✅ Fallback yang handal jika image gagal dimuat
- ✅ Performance yang optimal dengan responsive images
- ✅ User experience yang konsisten di semua device

Sekarang Anda bisa menambahkan background images sesuai dengan kebutuhan website Anda! 