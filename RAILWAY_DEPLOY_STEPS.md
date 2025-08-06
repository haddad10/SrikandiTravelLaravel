# 🚀 Railway Deployment Steps - Srikandi Travel

## 📋 **Step-by-Step Deployment Guide**

### **Step 1: Create Railway Account**
1. Go to https://railway.app
2. Click "Sign Up" or "Get Started"
3. Sign up with GitHub account

### **Step 2: Create New Project**
1. Click "New Project"
2. Select "Deploy from GitHub repo"
3. Connect your GitHub account
4. Select repository: `haddad10/SrikandiTravelLaravel`

### **Step 3: Add MySQL Database**
1. In your Railway project, click "New Service"
2. Select "Database" → "MySQL"
3. Wait for database to be created
4. Copy database credentials

### **Step 4: Configure Environment Variables**
Add these environment variables in Railway:

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

### **Step 5: Deploy Commands**
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

### **Step 6: Post-Deployment Setup**
After deployment, run these commands in Railway console:

```bash
# Seed admin user
php artisan db:seed --class=AdminUserSeeder

# Set proper permissions
chmod -R 755 storage bootstrap/cache
```

## 🎯 **Deployment Checklist**

- [ ] Railway account created
- [ ] GitHub repository connected
- [ ] MySQL database added
- [ ] Environment variables configured
- [ ] Migrations run successfully
- [ ] Admin user seeded
- [ ] App accessible via Railway URL

## 🔗 **Useful Links**

- **Railway Dashboard:** https://railway.app
- **GitHub Repository:** https://github.com/haddad10/SrikandiTravelLaravel
- **GitHub Actions:** https://github.com/haddad10/SrikandiTravelLaravel/actions

## 🚀 **Ready to Deploy!**

Your Srikandi Travel Laravel application is ready for Railway deployment with:

- ✅ Mobile responsive admin panel
- ✅ Stable background images
- ✅ Production optimizations
- ✅ Database migrations
- ✅ Railway configuration files

**Follow the steps above to deploy your app!** 🎉 