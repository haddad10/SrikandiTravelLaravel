# 🚀 Auto Railway Deploy - Srikandi Travel
Write-Host "========================================" -ForegroundColor Cyan
Write-Host "    Auto Railway Deployment" -ForegroundColor Cyan
Write-Host "========================================" -ForegroundColor Cyan
Write-Host ""

Write-Host "🎯 Setting up automatic Railway deployment..." -ForegroundColor Green
Write-Host ""

# Step 1: Check if Railway CLI is installed
Write-Host "[1/6] Checking Railway CLI..." -ForegroundColor Yellow
try {
    $railwayVersion = railway --version 2>$null
    if ($railwayVersion) {
        Write-Host "✅ Railway CLI found: $railwayVersion" -ForegroundColor Green
    } else {
        Write-Host "❌ Railway CLI not found. Installing..." -ForegroundColor Yellow
        npm install -g @railway/cli
        Write-Host "✅ Railway CLI installed successfully!" -ForegroundColor Green
    }
} catch {
    Write-Host "❌ Error with Railway CLI: $($_.Exception.Message)" -ForegroundColor Red
    Write-Host "💡 Please install Railway CLI manually: npm install -g @railway/cli" -ForegroundColor Yellow
    exit 1
}

Write-Host ""

# Step 2: Check git status
Write-Host "[2/6] Checking git status..." -ForegroundColor Yellow
$status = git status --porcelain
if ($status) {
    Write-Host "Found changes to deploy:" -ForegroundColor Green
    Write-Host $status -ForegroundColor Gray
} else {
    Write-Host "No changes to deploy." -ForegroundColor Green
}

Write-Host ""

# Step 3: Add and commit changes
Write-Host "[3/6] Adding and committing changes..." -ForegroundColor Yellow
try {
    git add .
    $timestamp = Get-Date -Format "yyyy-MM-dd HH:mm:ss"
    $commitMessage = "🚀 Auto Railway deploy: Srikandi Travel Laravel - $timestamp"
    git commit -m $commitMessage
    Write-Host "✅ Changes committed successfully." -ForegroundColor Green
} catch {
    Write-Host "❌ Error committing changes: $($_.Exception.Message)" -ForegroundColor Red
    exit 1
}

Write-Host ""

# Step 4: Push to GitHub
Write-Host "[4/6] Pushing to GitHub..." -ForegroundColor Yellow
try {
    git push origin main
    Write-Host "✅ Successfully pushed to GitHub!" -ForegroundColor Green
} catch {
    Write-Host "❌ Error pushing to GitHub: $($_.Exception.Message)" -ForegroundColor Red
    Write-Host "💡 Make sure you have set up git credentials." -ForegroundColor Yellow
    Write-Host "   Run: .\setup-git-credentials.ps1" -ForegroundColor Blue
    exit 1
}

Write-Host ""

# Step 5: Deploy to Railway
Write-Host "[5/6] Deploying to Railway..." -ForegroundColor Yellow
try {
    Write-Host "🚀 Starting Railway deployment..." -ForegroundColor Green
    
    # Check if logged in to Railway
    $railwayStatus = railway status 2>$null
    if ($railwayStatus -like "*not logged in*" -or $railwayStatus -like "*error*") {
        Write-Host "🔐 Please login to Railway first:" -ForegroundColor Yellow
        Write-Host "   railway login" -ForegroundColor Blue
        Write-Host "   Then run this script again." -ForegroundColor Blue
        exit 1
    }
    
    # Deploy to Railway
    railway up
    Write-Host "✅ Railway deployment initiated!" -ForegroundColor Green
    
} catch {
    Write-Host "❌ Error deploying to Railway: $($_.Exception.Message)" -ForegroundColor Red
    Write-Host "💡 Please check your Railway configuration." -ForegroundColor Yellow
    exit 1
}

Write-Host ""

# Step 6: Post-deployment setup
Write-Host "[6/6] Post-deployment setup..." -ForegroundColor Yellow
Write-Host "After Railway deployment completes, run these commands:" -ForegroundColor Green
Write-Host ""
Write-Host "1. Open Railway console and run:" -ForegroundColor Yellow
Write-Host "   php artisan migrate --force" -ForegroundColor Blue
Write-Host "   php artisan db:seed --class=AdminUserSeeder" -ForegroundColor Blue
Write-Host "   chmod -R 755 storage bootstrap/cache" -ForegroundColor Blue
Write-Host ""

Write-Host "========================================" -ForegroundColor Cyan
Write-Host "    🎉 Auto Deployment Complete!" -ForegroundColor Cyan
Write-Host "========================================" -ForegroundColor Cyan
Write-Host ""
Write-Host "✅ Changes pushed to GitHub" -ForegroundColor Green
Write-Host "🚀 Railway deployment triggered" -ForegroundColor Green
Write-Host "📱 Mobile responsive admin panel ready" -ForegroundColor Green
Write-Host ""
Write-Host "🔗 Check deployment status:" -ForegroundColor Yellow
Write-Host "   • Railway: https://railway.app" -ForegroundColor Blue
Write-Host "   • GitHub: https://github.com/haddad10/SrikandiTravelLaravel" -ForegroundColor Blue
Write-Host "   • Actions: https://github.com/haddad10/SrikandiTravelLaravel/actions" -ForegroundColor Blue
Write-Host ""
Write-Host "🎯 Your Srikandi Travel Laravel app is deploying to Railway!" -ForegroundColor Green
Write-Host ""

Read-Host "Press Enter to continue..." 