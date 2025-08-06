# Mobile Portrait Background Fix

## Overview
Modifikasi CSS untuk memastikan background image menggunakan orientasi **portrait** (tegak) saat diakses dari mobile device, baik dalam mode portrait maupun landscape.

## Masalah yang Diperbaiki

### 1. Background Landscape di Mobile
- Background image menggunakan orientasi landscape di mobile
- Gambar terlihat terpotong atau tidak optimal di mobile
- User experience kurang baik di mobile device

### 2. Fallback untuk Upload Gagal
- Jika upload image gagal, ada fallback gradient yang menarik
- Tidak ada background kosong saat image tidak bisa dimuat

## Solusi yang Diterapkan

### 1. CSS Mobile Portrait Focus
```css
/* Mobile Portrait Background Fix */
@media (max-width: 768px) {
    .hero-section img {
        object-fit: cover !important;
        object-position: center top !important; /* Focus on top for portrait */
    }
}
```

### 2. Mobile Landscape - Force Portrait Background
```css
@media (max-width: 768px) and (orientation: landscape) {
    .hero-section img {
        object-fit: cover !important;
        object-position: center top !important; /* Always focus on top */
        height: 100vh !important;
    }
}
```

### 3. Fallback Backgrounds untuk Mobile
```css
/* Travel mode fallback */
.hero-section .absolute.inset-0[data-mode="travel"] {
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
}

/* Umroh mode fallback */
.hero-section .absolute.inset-0[data-mode="umroh"] {
    background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);
}
```

### 4. JavaScript Fallback untuk Image Error
```html
<img src="{{ $heroImages['travel'] }}" 
     alt="Travel Background" 
     class="w-full h-full object-cover object-center"
     loading="eager"
     decoding="async"
     onerror="this.style.display='none'; this.parentElement.style.background='linear-gradient(135deg, #667eea 0%, #764ba2 100%)';">
```

## Perubahan Utama

### 1. Object Position
- **Sebelum:** `object-position: center`
- **Sesudah:** `object-position: center top` (focus pada bagian atas untuk portrait)

### 2. Mobile Landscape Handling
- Memaksa background menggunakan orientasi portrait bahkan dalam landscape mode
- Menggunakan `center top` untuk fokus pada bagian atas gambar

### 3. Fallback System
- Gradient fallback untuk travel mode (biru-ungu)
- Gradient fallback untuk umroh mode (pink-merah)
- JavaScript error handling untuk image yang gagal dimuat

### 4. Data Attributes
- Menambahkan `data-mode="travel"` dan `data-mode="umroh"`
- Memungkinkan CSS targeting yang lebih spesifik

## Keuntungan

### 1. Mobile Experience yang Lebih Baik
- Background selalu optimal untuk mobile
- Tidak ada gambar terpotong
- Responsif di semua ukuran mobile

### 2. Fallback yang Handal
- Tidak ada background kosong jika upload gagal
- Gradient yang menarik sebagai pengganti
- Error handling yang graceful

### 3. Performance
- Menggunakan `loading="eager"` untuk hero images
- `decoding="async"` untuk optimasi loading
- CSS yang efisien dengan `!important` untuk override

## Testing

### 1. Mobile Portrait Mode
- Buka website di mobile dalam mode portrait
- Background harus fokus pada bagian atas gambar
- Gambar harus cover seluruh viewport

### 2. Mobile Landscape Mode
- Rotate mobile ke landscape
- Background tetap menggunakan orientasi portrait
- Content tetap readable

### 3. Image Error Handling
- Simulasi image yang gagal dimuat
- Gradient fallback harus muncul
- Tidak ada background kosong

## Browser Support

### CSS Features
- `object-fit: cover` - Modern browsers
- `object-position: center top` - Modern browsers
- `@supports (height: 100dvh)` - Dynamic viewport units
- `backdrop-filter` - Modern browsers

### JavaScript Features
- `onerror` event handler - All browsers
- `style.display` manipulation - All browsers
- `parentElement` access - All browsers

## File yang Dimodifikasi

### 1. `resources/views/site/home.blade.php`
- Menambahkan CSS untuk mobile portrait focus
- Menambahkan fallback backgrounds
- Menambahkan JavaScript error handling
- Menambahkan data attributes

## Kesimpulan

Dengan modifikasi ini, website akan:
- ✅ Background selalu portrait di mobile
- ✅ Fallback yang menarik jika upload gagal
- ✅ Experience yang konsisten di semua device
- ✅ Performance yang optimal
- ✅ Error handling yang graceful

Mobile users akan mendapatkan experience yang jauh lebih baik dengan background yang selalu optimal untuk mobile device. 