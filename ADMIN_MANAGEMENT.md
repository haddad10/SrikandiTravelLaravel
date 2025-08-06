# Admin Management Guide

## 🔐 Keamanan Dashboard Admin

Dashboard admin sudah terlindungi dengan sistem login yang aman:

### ✅ Proteksi yang Sudah Diterapkan:
- **Middleware Protection**: Semua route admin dilindungi dengan `auth:admin` middleware
- **Session-based Authentication**: Menggunakan Laravel session untuk keamanan
- **Separate Guard**: Admin menggunakan guard terpisah dari user biasa
- **Redirect Protection**: Jika belum login, otomatis redirect ke halaman login

### 🛡️ Cara Akses Dashboard Admin:
1. Buka: `http://127.0.0.1:8000/admin/login`
2. Masukkan username dan password admin
3. Setelah login berhasil, akses dashboard di: `http://127.0.0.1:8000/admin/dashboard`

---

## 👤 Cara Mengganti Username dan Password Admin

### **Metode 1: Menggunakan Command (Direkomendasikan)**

#### **A. Lihat Admin yang Ada:**
```bash
php artisan admin:list
```

#### **B. Ganti Username/Password:**
```bash
# Interactive mode (akan diminta input)
php artisan admin:change-credentials

# Atau langsung dengan parameter
php artisan admin:change-credentials --username=newadmin --password=newpassword123
```

#### **C. Buat Admin Baru:**
```bash
# Interactive mode
php artisan admin:create

# Atau langsung dengan parameter
php artisan admin:create --username=admin2 --password=password123 --email=admin2@example.com --name="Admin Kedua"
```

### **Metode 2: Menggunakan Tinker**

```bash
php artisan tinker
```

```php
// Lihat admin yang ada
$admin = App\Models\AdminUser::first();
echo $admin->username;

// Ganti username
$admin->username = 'newadmin';
$admin->save();

// Ganti password
$admin->password = Hash::make('newpassword123');
$admin->save();
```

### **Metode 3: Edit Database Langsung**

```bash
php artisan tinker
```

```php
// Update username dan password
App\Models\AdminUser::where('username', 'admin')->update([
    'username' => 'newadmin',
    'password' => Hash::make('newpassword123')
]);
```

---

## 📋 Command yang Tersedia

### **1. List Admin Users**
```bash
php artisan admin:list
```
**Fungsi:** Menampilkan semua admin yang ada dalam tabel

### **2. Change Admin Credentials**
```bash
php artisan admin:change-credentials
```
**Fungsi:** Mengganti username dan password admin yang ada

**Options:**
- `--username=newusername` - Ganti username
- `--password=newpassword` - Ganti password

### **3. Create New Admin**
```bash
php artisan admin:create
```
**Fungsi:** Membuat admin user baru

**Options:**
- `--username=username` - Username baru
- `--password=password` - Password baru
- `--email=email` - Email (opsional)
- `--name=name` - Nama lengkap (opsional)

---

## 🔧 Troubleshooting

### **Jika Tidak Bisa Login:**

1. **Periksa apakah admin ada:**
   ```bash
   php artisan admin:list
   ```

2. **Jika tidak ada admin, buat baru:**
   ```bash
   php artisan admin:create
   ```

3. **Reset password admin:**
   ```bash
   php artisan admin:change-credentials
   ```

4. **Clear cache:**
   ```bash
   php artisan config:clear
   php artisan cache:clear
   php artisan view:clear
   ```

### **Jika Lupa Password:**

1. **Reset via command:**
   ```bash
   php artisan admin:change-credentials
   ```

2. **Atau reset via tinker:**
   ```bash
   php artisan tinker
   ```
   ```php
   $admin = App\Models\AdminUser::first();
   $admin->password = Hash::make('passwordbaru123');
   $admin->save();
   ```

---

## 📊 Struktur Database Admin

### **Tabel: admin_users**
- `id` - Primary key
- `username` - Username untuk login
- `email` - Email admin (opsional)
- `password` - Password yang di-hash
- `name` - Nama lengkap admin
- `role` - Role admin (admin/super_admin)
- `is_active` - Status aktif (1/0)
- `email_verified_at` - Waktu verifikasi email
- `remember_token` - Token untuk "remember me"
- `created_at` - Waktu dibuat
- `updated_at` - Waktu diupdate

---

## 🚀 Tips Keamanan

### **1. Password yang Kuat:**
- Minimal 8 karakter
- Kombinasi huruf besar, kecil, angka, dan simbol
- Contoh: `Admin@2024!`

### **2. Username yang Aman:**
- Hindari username yang mudah ditebak
- Jangan gunakan: admin, administrator, root
- Contoh: `srikandi_admin`, `travel_manager`

### **3. Backup Credentials:**
- Simpan username dan password di tempat yang aman
- Gunakan password manager
- Jangan share credentials via email atau chat

---

## 📞 Default Admin Credentials

**Username:** `admin`  
**Password:** `admin123`  
**Email:** `admin@srikanditravel.com`

**⚠️ PENTING:** Ganti password default ini segera setelah setup! 