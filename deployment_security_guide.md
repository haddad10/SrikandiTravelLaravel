# Deployment Security Guide - Srikandi Travel

## 🔒 Keamanan Database

### 1. Migrasi dari SQLite ke MySQL/PostgreSQL

**Langkah-langkah:**

```bash
# 1. Install MySQL/PostgreSQL di server
# 2. Buat database baru
mysql -u root -p
CREATE DATABASE srikandi_travel;
CREATE USER 'srikandi_user'@'localhost' IDENTIFIED BY 'StrongPassword123!';
GRANT ALL PRIVILEGES ON srikandi_travel.* TO 'srikandi_user'@'localhost';
FLUSH PRIVILEGES;
```

**Update .env file:**
```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=srikandi_travel
DB_USERNAME=srikandi_user
DB_PASSWORD=StrongPassword123!
```

**Migrasi data:**
```bash
# Export data dari SQLite
php artisan tinker --execute="
use App\Models\AdminUser;
use App\Models\Customer;
use App\Models\Package;
use App\Models\Schedule;
use App\Models\Gallery;

echo 'Exporting data...' . PHP_EOL;
echo 'Admin users: ' . AdminUser::count() . PHP_EOL;
echo 'Customers: ' . Customer::count() . PHP_EOL;
echo 'Packages: ' . Package::count() . PHP_EOL;
echo 'Schedules: ' . Schedule::count() . PHP_EOL;
echo 'Galleries: ' . Gallery::count() . PHP_EOL;
"

# Jalankan migration di database baru
php artisan migrate:fresh
```

### 2. Environment Security

**Buat .env file:**
```env
APP_NAME="Srikandi Travel"
APP_ENV=production
APP_KEY=base64:YourAppKeyHere
APP_DEBUG=false
APP_URL=https://yourdomain.com

LOG_CHANNEL=stack
LOG_DEPRECATIONS_CHANNEL=null
LOG_LEVEL=error

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=srikandi_travel
DB_USERNAME=srikandi_user
DB_PASSWORD=StrongPassword123!

BROADCAST_DRIVER=log
CACHE_DRIVER=file
FILESYSTEM_DISK=local
QUEUE_CONNECTION=sync
SESSION_DRIVER=file
SESSION_LIFETIME=120

MEMCACHED_HOST=127.0.0.1

REDIS_HOST=127.0.0.1
REDIS_PASSWORD=null
REDIS_PORT=6379

MAIL_MAILER=smtp
MAIL_HOST=mailpit
MAIL_PORT=1025
MAIL_USERNAME=null
MAIL_PASSWORD=null
MAIL_ENCRYPTION=null
MAIL_FROM_ADDRESS="hello@example.com"
MAIL_FROM_NAME="${APP_NAME}"

AWS_ACCESS_KEY_ID=
AWS_SECRET_ACCESS_KEY=
AWS_DEFAULT_REGION=us-east-1
AWS_BUCKET=
AWS_USE_PATH_STYLE_ENDPOINT=false

PUSHER_APP_ID=
PUSHER_APP_KEY=
PUSHER_APP_SECRET=
PUSHER_HOST=
PUSHER_PORT=443
PUSHER_SCHEME=https
PUSHER_APP_CLUSTER=mt1

VITE_APP_NAME="${APP_NAME}"
VITE_PUSHER_APP_KEY="${PUSHER_APP_KEY}"
VITE_PUSHER_HOST="${PUSHER_HOST}"
VITE_PUSHER_PORT="${PUSHER_PORT}"
VITE_PUSHER_SCHEME="${PUSHER_SCHEME}"
VITE_PUSHER_APP_CLUSTER="${PUSHER_APP_CLUSTER}"
```

### 3. Server Security

**Firewall Configuration:**
```bash
# UFW Firewall
sudo ufw enable
sudo ufw allow 22/tcp
sudo ufw allow 80/tcp
sudo ufw allow 443/tcp
sudo ufw deny 3306/tcp
```

**SSL/HTTPS Setup:**
```bash
# Install Certbot
sudo apt install certbot python3-certbot-nginx

# Generate SSL certificate
sudo certbot --nginx -d yourdomain.com
```

### 4. Application Security

**Rate Limiting:**
```php
// app/Http/Kernel.php
protected $middlewareGroups = [
    'web' => [
        // ... existing middleware
        \App\Http\Middleware\RateLimitRequests::class,
    ],
];
```

**Admin Login Rate Limiting:**
```php
// routes/web.php
Route::post('/admin/login', [AdminAuthController::class, 'login'])
    ->name('admin.login.post')
    ->middleware('throttle:5,1'); // 5 attempts per minute
```

### 5. Backup Strategy

**Database Backup:**
```bash
#!/bin/bash
# backup.sh
DATE=$(date +%Y%m%d_%H%M%S)
mysqldump -u srikandi_user -p srikandi_travel > backup_$DATE.sql
gzip backup_$DATE.sql
# Upload to cloud storage
```

**File Backup:**
```bash
# Backup uploads
tar -czf uploads_backup_$DATE.tar.gz storage/app/public/
```

### 6. Monitoring & Logging

**Error Logging:**
```php
// config/logging.php
'channels' => [
    'stack' => [
        'driver' => 'stack',
        'channels' => ['single', 'slack'],
    ],
    'slack' => [
        'driver' => 'slack',
        'url' => env('LOG_SLACK_WEBHOOK_URL'),
        'username' => 'Srikandi Travel Logger',
        'emoji' => ':boom:',
        'level' => env('LOG_LEVEL', 'critical'),
    ],
],
```

### 7. Security Headers

**Add Security Middleware:**
```php
// app/Http/Middleware/SecurityHeaders.php
public function handle($request, Closure $next)
{
    $response = $next($request);
    
    $response->headers->set('X-Frame-Options', 'DENY');
    $response->headers->set('X-Content-Type-Options', 'nosniff');
    $response->headers->set('X-XSS-Protection', '1; mode=block');
    $response->headers->set('Referrer-Policy', 'strict-origin-when-cross-origin');
    $response->headers->set('Content-Security-Policy', "default-src 'self'");
    
    return $response;
}
```

### 8. Deployment Checklist

- [ ] Migrasi database ke MySQL/PostgreSQL
- [ ] Setup .env file dengan credentials yang aman
- [ ] Install SSL certificate
- [ ] Setup firewall
- [ ] Implementasi rate limiting
- [ ] Setup backup otomatis
- [ ] Setup monitoring
- [ ] Test semua fitur setelah deploy
- [ ] Backup data lama
- [ ] Update admin credentials

### 9. Post-Deployment Security

**Regular Security Tasks:**
- Update Laravel framework setiap bulan
- Update dependencies secara berkala
- Monitor error logs
- Backup database setiap hari
- Test restore backup setiap minggu
- Monitor server resources
- Update SSL certificate sebelum expired

### 10. Emergency Procedures

**Jika terjadi security breach:**
1. Segera backup database
2. Block akses ke server
3. Investigasi log files
4. Reset semua passwords
5. Update security configurations
6. Restore dari backup yang aman
7. Monitor untuk aktivitas mencurigakan 