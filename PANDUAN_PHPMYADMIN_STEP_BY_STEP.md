# 📋 Panduan Langkah Demi Langkah: Migrasi ke phpMyAdmin

## 🎯 **Tujuan: Memindahkan database dari SQLite ke MySQL dengan phpMyAdmin**

---

## **Langkah 1: Persiapan Awal**

### **1.1 Pastikan XAMPP/Laragon Berjalan**
- Buka XAMPP Control Panel
- Start **Apache** dan **MySQL**
- Pastikan status keduanya **Running** (hijau)

### **1.2 Buka phpMyAdmin**
- Buka browser
- Ketik: `http://localhost/phpmyadmin`
- Login dengan username: `root` (password kosong)

---

## **Langkah 2: Buat Database Baru**

### **2.1 Buat Database**
1. Di phpMyAdmin, klik **"New"** atau **"Baru"**
2. Masukkan nama database: `srikandi_travel`
3. Pilih collation: `utf8mb4_unicode_ci`
4. Klik **"Create"** atau **"Buat"**

### **2.2 Verifikasi Database**
- Database `srikandi_travel` akan muncul di sidebar kiri
- Klik database tersebut untuk memastikan kosong

---

## **Langkah 3: Jalankan Migration Laravel**

### **3.1 Update .env File**
```bash
# Copy file .env.mysql ke .env
copy .env.mysql .env
```

### **3.2 Jalankan Migration**
```bash
php artisan migrate:fresh
```

**Hasil yang diharapkan:**
- Tabel-tabel akan dibuat otomatis
- Struktur database siap

---

## **Langkah 4: Import Data (Jika Ada)**

### **4.1 Jika Ada File SQL**
1. Klik database `srikandi_travel`
2. Klik tab **"Import"** atau **"Impor"**
3. Klik **"Choose File"** atau **"Pilih File"**
4. Pilih file `migrate_data.sql` (jika ada)
5. Klik **"Go"** atau **"Jalankan"**

### **4.2 Jika Tidak Ada File SQL**
- Data akan kosong, bisa diisi manual atau melalui aplikasi

---

## **Langkah 5: Test Koneksi**

### **5.1 Test Aplikasi**
- Buka: `http://localhost/SrikandiTravelLaravel`
- Coba login admin: `srikanditravel@gmail.com` / `Bismillah@111`
- Test semua fitur

### **5.2 Verifikasi di phpMyAdmin**
- Refresh halaman phpMyAdmin
- Klik database `srikandi_travel`
- Lihat tabel-tabel yang sudah dibuat

---

## **Langkah 6: Keamanan Database**

### **6.1 Buat User Khusus (Opsional)**
```sql
-- Di phpMyAdmin, klik tab "SQL" dan jalankan:
CREATE USER 'srikandi_app'@'localhost' IDENTIFIED BY 'StrongPassword123!';
GRANT SELECT, INSERT, UPDATE, DELETE ON srikandi_travel.* TO 'srikandi_app'@'localhost';
FLUSH PRIVILEGES;
```

### **6.2 Update .env dengan User Baru**
```env
DB_USERNAME=srikandi_app
DB_PASSWORD=StrongPassword123!
```

---

## **Langkah 7: Backup Strategy**

### **7.1 Export Database**
1. Klik database `srikandi_travel`
2. Klik tab **"Export"** atau **"Ekspor"**
3. Pilih format: **SQL**
4. Klik **"Go"** atau **"Jalankan"**
5. File akan terdownload

### **7.2 Backup Otomatis (Opsional)**
```bash
# Buat script backup
mysqldump -u root -p srikandi_travel > backup_$(date +%Y%m%d).sql
```

---

## **Troubleshooting**

### **Error: "Access denied"**
- Pastikan MySQL berjalan
- Cek username/password di .env
- Coba restart XAMPP

### **Error: "Database not found"**
- Pastikan database `srikandi_travel` sudah dibuat
- Cek nama database di .env

### **Error: "Table not found"**
- Jalankan: `php artisan migrate:fresh`
- Pastikan semua migration berhasil

### **Error: "Connection refused"**
- Pastikan MySQL service berjalan
- Cek port 3306 tidak diblokir

---

## **Verifikasi Keamanan**

### **✅ Checklist Keamanan:**
- [ ] Database terpisah dari aplikasi
- [ ] User management aktif
- [ ] Password protection aktif
- [ ] Backup strategy siap
- [ ] Monitoring aktif
- [ ] Access control terpasang

### **✅ Keuntungan yang Didapat:**
- **Keamanan tinggi** - Database terpisah
- **Management mudah** - Interface visual
- **Backup otomatis** - Tidak manual
- **Performa optimal** - Untuk production
- **Scalable** - Handle banyak user

---

## **🎯 Status Akhir**

**Setelah mengikuti semua langkah di atas:**
- ✅ Database MySQL aktif
- ✅ phpMyAdmin bisa diakses
- ✅ Aplikasi Laravel terhubung
- ✅ Data aman tersimpan
- ✅ Backup strategy siap
- ✅ **AMAN untuk production!**

---

## **📞 Bantuan**

Jika ada error atau kesulitan:
1. Cek error message di browser
2. Cek log Laravel di `storage/logs/laravel.log`
3. Pastikan semua service berjalan
4. Restart XAMPP jika perlu 