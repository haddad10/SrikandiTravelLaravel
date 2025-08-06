# Logo Setup Guide

## 🎨 Cara Menambahkan Logo

### **1. Siapkan Logo Anda:**

#### **Untuk Mode Travel:**
- **Nama file:** `travel-logo.jpg` (atau .png, .svg, .webp)
- **Ukuran yang disarankan:** 200x80px atau 300x120px
- **Format:** JPG, PNG (transparan), SVG, atau WebP
- **Upload ke:** `public/storage/logos/travel-logo.jpg`

#### **Untuk Mode Umroh:**
- **Nama file:** `umroh-logo.jpg` (atau .png, .svg, .webp)
- **Ukuran yang disarankan:** 200x80px atau 300x120px
- **Format:** JPG, PNG (transparan), SVG, atau WebP
- **Upload ke:** `public/storage/logos/umroh-logo.jpg`

### **2. Upload Logo:**

```bash
# Pastikan direktori ada
mkdir -p public/storage/logos

# Upload logo Anda ke direktori tersebut
# travel-logo.jpg untuk mode Travel
# umroh-logo.jpg untuk mode Umroh
```

### **3. Format Logo yang Didukung:**

#### **PNG (Direkomendasikan):**
- ✅ Background transparan
- ✅ Kualitas tinggi
- ✅ Ukuran file optimal

#### **JPG/JPEG:**
- ✅ Kualitas tinggi
- ❌ Tidak ada background transparan
- ✅ Ukuran file kecil

#### **SVG (Terbaik untuk web):**
- ✅ Scalable (tidak blur di zoom)
- ✅ Ukuran file sangat kecil
- ✅ Background transparan
- ✅ Kualitas sempurna di semua ukuran

### **4. Ukuran Logo yang Optimal:**

#### **Desktop:**
- **Width:** 250px - 400px
- **Height:** 100px - 160px
- **Aspect Ratio:** 2.5:1 atau 3:1

#### **Mobile:**
- **Width:** 200px - 300px
- **Height:** 80px - 120px
- **Aspect Ratio:** 2.5:1 atau 3:1

### **5. Tips Desain Logo:**

#### **Untuk Mode Travel:**
- Warna: Biru, hijau, atau kombinasi
- Elemen: Globe, pesawat, suitcase, atau landmark
- Style: Modern, profesional, travel-themed

#### **Untuk Mode Umroh:**
- Warna: Orange, kuning, atau kombinasi
- Elemen: Masjid, Ka'bah, atau elemen islami
- Style: Religius, elegan, umroh-themed

### **6. Cara Kerja Logo:**

#### **Mode Travel:**
- Logo akan muncul di sebelah kiri teks "Srikandi Tour And Travel"
- Jika logo tidak ada, hanya teks yang muncul
- Logo menggunakan class `h-16 w-auto` untuk responsive (lebih besar)
- Klik nama perusahaan akan mengarahkan ke beranda

#### **Mode Umroh:**
- Logo akan muncul di sebelah kiri teks "Srikandi Umroh"
- Jika logo tidak ada, hanya teks yang muncul
- Logo menggunakan class `h-16 w-auto` untuk responsive (lebih besar)
- Klik nama perusahaan akan mengarahkan ke beranda

### **7. Fallback System:**

Jika logo tidak ditemukan:
- ✅ Teks nama perusahaan tetap muncul
- ✅ Tidak ada error di console
- ✅ Layout tidak rusak
- ✅ Responsif di semua device

### **8. Test Logo:**

1. **Upload logo** ke direktori yang benar
2. **Refresh browser** (Ctrl+F5)
3. **Test di kedua mode** (Travel dan Umroh)
4. **Test responsive** di mobile dan desktop

### **9. Troubleshooting:**

#### **Jika logo tidak muncul:**
1. **Periksa nama file:** Pastikan nama file tepat
2. **Periksa direktori:** `public/storage/logos/`
3. **Periksa symbolic link:** `php artisan storage:link`
4. **Clear cache:** `php artisan view:clear`

#### **Jika logo terlalu besar/kecil:**
- Edit CSS di `resources/views/layouts/app.blade.php`
- Ubah class `h-16` menjadi `h-12` (lebih kecil) atau `h-20` (lebih besar)

### **10. Contoh Struktur File:**

```
public/storage/logos/
├── travel-logo.jpg    (Logo untuk mode Travel)
├── umroh-logo.jpg     (Logo untuk mode Umroh)
└── favicon.ico        (Favicon website)
```

---

## 🚀 Setelah Upload Logo:

1. **Logo akan otomatis muncul** di navigation bar
2. **Logo akan berubah** sesuai mode (Travel/Umroh)
3. **Logo responsive** di semua ukuran layar
4. **Fallback system** memastikan website tetap berfungsi

**Logo Anda sekarang siap digunakan!** 🎨 