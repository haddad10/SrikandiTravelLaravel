# 🚀 Fullstack Railway Deploy - Srikandi Travel
Write-Host "========================================" -ForegroundColor Cyan
Write-Host "    Fullstack Railway Deploy" -ForegroundColor Cyan
Write-Host "========================================" -ForegroundColor Cyan
Write-Host ""

Write-Host "🎯 Starting fullstack deployment..." -ForegroundColor Green
Write-Host ""

# Step 1: Build frontend assets locally
Write-Host "[1/5] Building frontend assets..." -ForegroundColor Yellow
try {
    Write-Host "Installing Node.js dependencies..." -ForegroundColor White
    npm install
    
    Write-Host "Building frontend assets..." -ForegroundColor White
    npm run build
    
    Write-Host "✅ Frontend assets built successfully!" -ForegroundColor Green
} catch {
    Write-Host "❌ Error building frontend: $($_.Exception.Message)" -ForegroundColor Red
    Write-Host "⚠️  Continuing with deployment..." -ForegroundColor Yellow
}

Write-Host ""

# Step 2: Optimize Laravel for production
Write-Host "[2/5] Optimizing Laravel for production..." -ForegroundColor Yellow
try {
    Write-Host "Clearing caches..." -ForegroundColor White
    php artisan cache:clear
    php artisan config:clear
    php artisan route:clear
    php artisan view:clear
    
    Write-Host "Optimizing for production..." -ForegroundColor White
    php artisan config:cache
    php artisan route:cache
    php artisan view:cache
    php artisan optimize
    
    Write-Host "✅ Laravel optimized successfully!" -ForegroundColor Green
} catch {
    Write-Host "❌ Error optimizing Laravel: $($_.Exception.Message)" -ForegroundColor Red
    Write-Host "⚠️  Continuing with deployment..." -ForegroundColor Yellow
}

Write-Host ""

# Step 3: Commit and push to GitHub
Write-Host "[3/5] Pushing to GitHub..." -ForegroundColor Yellow
try {
    git add .
    $timestamp = Get-Date -Format "yyyy-MM-dd HH:mm:ss"
    git commit -m "Fullstack deploy with optimized assets - $timestamp"
    git push origin main
    Write-Host "✅ Successfully pushed to GitHub!" -ForegroundColor Green
} catch {
    Write-Host "❌ Error pushing to GitHub: $($_.Exception.Message)" -ForegroundColor Red
    Read-Host "Press Enter to exit..."
    exit 1
}

Write-Host ""

# Step 4: Set Railway environment variables
Write-Host "[4/5] Setting Railway environment variables..." -ForegroundColor Yellow
try {
    railway variables --set "APP_ENV=production" --set "APP_DEBUG=false" --set "APP_NAME=Srikandi Travel" --set "CACHE_DRIVER=file" --set "SESSION_DRIVER=file" --set "FILESYSTEM_DISK=local" --set "LOG_CHANNEL=stack" --set "NODE_ENV=production"
    Write-Host "✅ Railway variables set!" -ForegroundColor Green
} catch {
    Write-Host "⚠️  Could not set variables via CLI, but continuing..." -ForegroundColor Yellow
}

Write-Host ""

# Step 5: Deploy to Railway with retry logic
Write-Host "[5/5] Deploying to Railway..." -ForegroundColor Yellow
Write-Host "🚀 This may take a few minutes..." -ForegroundColor Green

$attempts = 0
$maxAttempts = 3
$success = $false

do {
    $attempts++
    Write-Host "Attempt $attempts of $maxAttempts..." -ForegroundColor Yellow
    
    try {
        Write-Host "Starting Railway deployment..." -ForegroundColor White
        $result = railway up --detach 2>&1
        
        if ($LASTEXITCODE -eq 0) {
            Write-Host "✅ Railway deployment initiated successfully!" -ForegroundColor Green
            $success = $true
            break
        } else {
            Write-Host "❌ Railway deploy failed (attempt $attempts)" -ForegroundColor Red
            Write-Host "Error: $result" -ForegroundColor Red
            
            if ($attempts -lt $maxAttempts) {
                Write-Host "⏳ Waiting 60 seconds before retry..." -ForegroundColor Yellow
                Start-Sleep -Seconds 60
            }
        }
    } catch {
        Write-Host "❌ Error during Railway deploy: $($_.Exception.Message)" -ForegroundColor Red
        if ($attempts -lt $maxAttempts) {
            Write-Host "⏳ Waiting 60 seconds before retry..." -ForegroundColor Yellow
            Start-Sleep -Seconds 60
        }
    }
} while ($attempts -lt $maxAttempts)

Write-Host ""
Write-Host "========================================" -ForegroundColor Cyan
Write-Host "    Deployment Summary" -ForegroundColor Cyan
Write-Host "========================================" -ForegroundColor Cyan
Write-Host ""

if ($success) {
    Write-Host "✅ Fullstack deployment successful!" -ForegroundColor Green
    Write-Host ""
    Write-Host "🔗 Your Railway project:" -ForegroundColor Yellow
    Write-Host "   • Dashboard: https://railway.app" -ForegroundColor Blue
    Write-Host "   • GitHub: https://github.com/haddad10/SrikandiTravelLaravel" -ForegroundColor Blue
    Write-Host ""
    Write-Host "📱 Fullstack Features deployed:" -ForegroundColor Yellow
    Write-Host "   • Frontend assets optimized" -ForegroundColor White
    Write-Host "   • Laravel production optimizations" -ForegroundColor White
    Write-Host "   • Mobile responsive admin panel" -ForegroundColor White
    Write-Host "   • Complete PHP extensions" -ForegroundColor White
    Write-Host "   • Node.js build process" -ForegroundColor White
    Write-Host "   • Docker containerization" -ForegroundColor White
} else {
    Write-Host "❌ Deployment failed after $maxAttempts attempts" -ForegroundColor Red
    Write-Host ""
    Write-Host "🔧 Manual Deployment Options:" -ForegroundColor Yellow
    Write-Host "   1. Check Railway dashboard: https://railway.app" -ForegroundColor White
    Write-Host "   2. Try manual deploy from GitHub" -ForegroundColor White
    Write-Host "   3. Check internet connection" -ForegroundColor White
    Write-Host "   4. Verify Dockerfile configuration" -ForegroundColor White
}

Write-Host ""
Write-Host "🎯 Railway will auto-deploy from GitHub!" -ForegroundColor Green
Write-Host ""

Read-Host "Press Enter to continue..." 