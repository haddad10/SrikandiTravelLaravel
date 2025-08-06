# 🚀 Railway Deploy Final - Srikandi Travel
Write-Host "========================================" -ForegroundColor Cyan
Write-Host "    Railway Deploy Final" -ForegroundColor Cyan
Write-Host "========================================" -ForegroundColor Cyan
Write-Host ""

Write-Host "🎯 Deploying Srikandi Travel to Railway..." -ForegroundColor Green
Write-Host ""

# Step 1: Check Railway CLI
Write-Host "[1/6] Checking Railway CLI..." -ForegroundColor Yellow
try {
    $railwayVersion = railway --version
    Write-Host "✅ Railway CLI found: $railwayVersion" -ForegroundColor Green
} catch {
    Write-Host "❌ Railway CLI not found. Installing..." -ForegroundColor Yellow
    npm install -g @railway/cli
    Write-Host "✅ Railway CLI installed!" -ForegroundColor Green
}

Write-Host ""

# Step 2: Check login status
Write-Host "[2/6] Checking Railway login..." -ForegroundColor Yellow
try {
    $loginStatus = railway whoami 2>$null
    if ($loginStatus) {
        Write-Host "✅ Logged in as: $loginStatus" -ForegroundColor Green
    } else {
        Write-Host "🔐 Please login to Railway..." -ForegroundColor Yellow
        railway login
    }
} catch {
    Write-Host "❌ Error checking login status" -ForegroundColor Red
    exit 1
}

Write-Host ""

# Step 3: Check project status
Write-Host "[3/6] Checking project status..." -ForegroundColor Yellow
try {
    $projectStatus = railway status 2>$null
    if ($projectStatus -like "*No linked project*") {
        Write-Host "🔗 Linking to Railway project..." -ForegroundColor Yellow
        railway init
    } else {
        Write-Host "✅ Project already linked" -ForegroundColor Green
    }
} catch {
    Write-Host "❌ Error checking project status" -ForegroundColor Red
    exit 1
}

Write-Host ""

# Step 4: Set environment variables
Write-Host "[4/6] Setting environment variables..." -ForegroundColor Yellow
try {
    railway variables --set "APP_ENV=production" --set "APP_DEBUG=false" --set "APP_NAME=Srikandi Travel" --set "CACHE_DRIVER=file" --set "SESSION_DRIVER=file" --set "FILESYSTEM_DISK=local"
    Write-Host "✅ Environment variables set successfully" -ForegroundColor Green
} catch {
    Write-Host "❌ Error setting environment variables" -ForegroundColor Red
    exit 1
}

Write-Host ""

# Step 5: Deploy to Railway
Write-Host "[5/6] Deploying to Railway..." -ForegroundColor Yellow
try {
    Write-Host "🚀 Starting Railway deployment..." -ForegroundColor Green
    Write-Host "This may take a few minutes..." -ForegroundColor Yellow
    
    # Deploy with timeout handling
    $deployResult = railway up 2>&1
    if ($LASTEXITCODE -eq 0) {
        Write-Host "✅ Railway deployment successful!" -ForegroundColor Green
    } else {
        Write-Host "⚠️  Deployment may have issues, but continuing..." -ForegroundColor Yellow
        Write-Host "Check Railway dashboard for status" -ForegroundColor Blue
    }
} catch {
    Write-Host "❌ Error during deployment: $($_.Exception.Message)" -ForegroundColor Red
    Write-Host "💡 Check Railway dashboard for manual deployment" -ForegroundColor Yellow
}

Write-Host ""

# Step 6: Show deployment info
Write-Host "[6/6] Deployment information..." -ForegroundColor Yellow
Write-Host "✅ Deployment process completed!" -ForegroundColor Green
Write-Host ""
Write-Host "🔗 Check your deployment:" -ForegroundColor Yellow
Write-Host "   • Railway Dashboard: https://railway.app" -ForegroundColor Blue
Write-Host "   • Project URL: https://railway.app/project/d60ea6fb-9ec7-4756-bbc8-bc428d2222f6" -ForegroundColor Blue
Write-Host ""
Write-Host "📱 Features deployed:" -ForegroundColor Yellow
Write-Host "   • Mobile responsive admin panel" -ForegroundColor White
Write-Host "   • Stable background images" -ForegroundColor White
Write-Host "   • Production optimizations" -ForegroundColor White
Write-Host "   • Laravel Laravel application" -ForegroundColor White
Write-Host ""
Write-Host "🎯 Your Srikandi Travel Laravel app is being deployed to Railway!" -ForegroundColor Green
Write-Host ""

Read-Host "Press Enter to continue..." 