# 🚀 Railway Deployment Guide - Srikandi Travel

## 📋 Prerequisites

1. **GitHub Repository**: `https://github.com/haddad10/SrikandiTravelLaravel`
2. **Railway Account**: Sign up at https://railway.app
3. **Database**: MySQL database (Railway provides)

## 🚀 Deployment Steps

### 1. **Connect to Railway**

1. Go to https://railway.app
2. Click "New Project"
3. Select "Deploy from GitHub repo"
4. Connect your GitHub account
5. Select repository: `haddad10/SrikandiTravelLaravel`

### 2. **Configure Environment Variables**

Add these environment variables in Railway dashboard:

```bash
APP_NAME="Srikandi Travel"
APP_ENV=production
APP_DEBUG=false
APP_URL=https://your-app-name.railway.app

DB_CONNECTION=mysql
DB_HOST=your-mysql-host.railway.app
DB_PORT=3306
DB_DATABASE=railway
DB_USERNAME=root
DB_PASSWORD=your-mysql-password

CACHE_DRIVER=file
FILESYSTEM_DISK=local
SESSION_DRIVER=file
SESSION_LIFETIME=120
```

### 3. **Database Setup**

1. Add MySQL service in Railway
2. Get database credentials from Railway
3. Update environment variables with database info

### 4. **Deploy Commands**

Railway will automatically run these commands:

```bash
# Install dependencies
composer install --optimize-autoloader --no-dev

# Generate app key
php artisan key:generate

# Run migrations
php artisan migrate --force

# Cache optimization
php artisan config:cache
php artisan route:cache
php artisan view:cache
php artisan optimize

# Create storage link
php artisan storage:link
```

### 5. **Post-Deployment Setup**

After deployment, run these commands in Railway console:

```bash
# Seed admin user
php artisan db:seed --class=AdminUserSeeder

# Set proper permissions
chmod -R 755 storage bootstrap/cache
```

## 🔧 Configuration Files

### **railway.json**
```json
{
  "$schema": "https://railway.app/railway.schema.json",
  "build": {
    "builder": "NIXPACKS"
  },
  "deploy": {
    "numReplicas": 1,
    "restartPolicyType": "ON_FAILURE",
    "restartPolicyMaxRetries": 10
  }
}
```

### **nixpacks.toml**
```toml
[phases.setup]
nixPkgs = ["php", "composer", "mysql"]

[phases.install]
cmds = ["composer install --optimize-autoloader --no-dev"]

[phases.build]
cmds = [
    "php artisan config:cache",
    "php artisan route:cache", 
    "php artisan view:cache",
    "php artisan optimize"
]

[start]
cmd = "php artisan serve --host=0.0.0.0 --port=$PORT"
```

## 📱 Features Ready for Deployment

### ✅ **Mobile Responsive Admin Panel**
- Dashboard mobile responsive
- Packages management mobile responsive
- Touch-friendly buttons and tables

### ✅ **Stable Background Images**
- CSS backgrounds configured
- Mobile portrait backgrounds
- Fallback gradients

### ✅ **Production Optimized**
- Composer autoloader optimized
- Laravel cache optimized
- Routes and views cached

### ✅ **Database Ready**
- All migrations included
- Admin user seeder ready
- Models and relationships configured

## 🎯 **Deployment Checklist**

- [ ] GitHub repository connected
- [ ] Environment variables configured
- [ ] Database service added
- [ ] Migrations run successfully
- [ ] Admin user seeded
- [ ] Storage link created
- [ ] App accessible via Railway URL

## 🔗 **Useful Commands**

```bash
# View logs
railway logs

# Access console
railway shell

# Check status
railway status

# Redeploy
railway up
```

## 🚀 **Ready for Deployment!**

Your Srikandi Travel Laravel application is now ready for Railway deployment with:

- ✅ Mobile responsive admin panel
- ✅ Stable background images
- ✅ Production optimizations
- ✅ Database migrations
- ✅ Railway configuration files

**Deploy now and enjoy your mobile-responsive travel website!** 🎉 