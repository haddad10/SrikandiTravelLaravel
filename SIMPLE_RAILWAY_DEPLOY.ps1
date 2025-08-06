# 🚀 Simple Railway Deploy - Srikandi Travel
Write-Host "========================================" -ForegroundColor Cyan
Write-Host "    Simple Railway Deploy" -ForegroundColor Cyan
Write-Host "========================================" -ForegroundColor Cyan
Write-Host ""

Write-Host "🎯 Starting deployment process..." -ForegroundColor Green
Write-Host ""

# Step 1: Push to GitHub
Write-Host "[1/3] Pushing to GitHub..." -ForegroundColor Yellow
try {
    git add .
    $timestamp = Get-Date -Format "yyyy-MM-dd HH:mm:ss"
    git commit -m "Deploy with fixed Dockerfile - $timestamp"
    git push origin main
    Write-Host "✅ Successfully pushed to GitHub!" -ForegroundColor Green
} catch {
    Write-Host "❌ Error pushing to GitHub: $($_.Exception.Message)" -ForegroundColor Red
    Read-Host "Press Enter to exit..."
    exit 1
}

Write-Host ""

# Step 2: Try Railway deploy
Write-Host "[2/3] Attempting Railway deploy..." -ForegroundColor Yellow
Write-Host "🚀 This may take a few minutes..." -ForegroundColor Green

$attempts = 0
$maxAttempts = 3

do {
    $attempts++
    Write-Host "Attempt $attempts of $maxAttempts..." -ForegroundColor Yellow
    
    try {
        $result = railway up --detach 2>&1
        if ($LASTEXITCODE -eq 0) {
            Write-Host "✅ Railway deployment initiated successfully!" -ForegroundColor Green
            break
        } else {
            Write-Host "❌ Railway deploy failed (attempt $attempts)" -ForegroundColor Red
            if ($attempts -lt $maxAttempts) {
                Write-Host "⏳ Waiting 30 seconds before retry..." -ForegroundColor Yellow
                Start-Sleep -Seconds 30
            }
        }
    } catch {
        Write-Host "❌ Error during Railway deploy: $($_.Exception.Message)" -ForegroundColor Red
        if ($attempts -lt $maxAttempts) {
            Write-Host "⏳ Waiting 30 seconds before retry..." -ForegroundColor Yellow
            Start-Sleep -Seconds 30
        }
    }
} while ($attempts -lt $maxAttempts)

Write-Host ""

# Step 3: Show results
Write-Host "[3/3] Deployment Summary" -ForegroundColor Yellow
Write-Host "========================================" -ForegroundColor Cyan

if ($attempts -le $maxAttempts -and $LASTEXITCODE -eq 0) {
    Write-Host "✅ Deployment successful!" -ForegroundColor Green
    Write-Host ""
    Write-Host "🔗 Your Railway project:" -ForegroundColor Yellow
    Write-Host "   • Dashboard: https://railway.app" -ForegroundColor Blue
    Write-Host "   • GitHub: https://github.com/haddad10/SrikandiTravelLaravel" -ForegroundColor Blue
    Write-Host ""
    Write-Host "📱 Features deployed:" -ForegroundColor Yellow
    Write-Host "   • Fixed Dockerfile (no more composer errors)" -ForegroundColor White
    Write-Host "   • Mobile responsive admin panel" -ForegroundColor White
    Write-Host "   • Complete PHP extensions" -ForegroundColor White
    Write-Host "   • Production optimizations" -ForegroundColor White
} else {
    Write-Host "❌ Deployment failed after $maxAttempts attempts" -ForegroundColor Red
    Write-Host ""
    Write-Host "🔧 Manual Deployment Options:" -ForegroundColor Yellow
    Write-Host "   1. Check Railway dashboard: https://railway.app" -ForegroundColor White
    Write-Host "   2. Try manual deploy from GitHub" -ForegroundColor White
    Write-Host "   3. Check internet connection" -ForegroundColor White
}

Write-Host ""
Write-Host "🎯 Railway will auto-deploy from GitHub!" -ForegroundColor Green
Write-Host ""

Read-Host "Press Enter to continue..." 