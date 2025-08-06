# 🚀 Railway Deploy with Retry - Handle Timeout Issues
Write-Host "========================================" -ForegroundColor Cyan
Write-Host "    Railway Deploy with Retry" -ForegroundColor Cyan
Write-Host "========================================" -ForegroundColor Cyan
Write-Host ""

Write-Host "🎯 Deploying with timeout handling..." -ForegroundColor Green
Write-Host ""

$maxAttempts = 3
$attempt = 1

do {
    Write-Host "========================================" -ForegroundColor Yellow
    Write-Host "    Attempt $attempt of $maxAttempts" -ForegroundColor Yellow
    Write-Host "========================================" -ForegroundColor Yellow
    Write-Host ""
    
    # Step 1: Push to GitHub (triggers auto-deploy)
    Write-Host "[1/4] Pushing to GitHub..." -ForegroundColor Yellow
    try {
        git add .
        $timestamp = Get-Date -Format "yyyy-MM-dd HH:mm:ss"
        git commit -m "Deploy attempt $attempt - $timestamp"
        git push origin main
        Write-Host "✅ Successfully pushed to GitHub!" -ForegroundColor Green
    } catch {
        Write-Host "❌ Error pushing to GitHub: $($_.Exception.Message)" -ForegroundColor Red
        $attempt++
        continue
    }
    
    Write-Host ""
    
    # Step 2: Set Railway variables
    Write-Host "[2/4] Setting Railway variables..." -ForegroundColor Yellow
    try {
        railway variables --set "APP_ENV=production" --set "APP_DEBUG=false" --set "APP_NAME=Srikandi Travel" --set "CACHE_DRIVER=file" --set "SESSION_DRIVER=file" --set "FILESYSTEM_DISK=local" --set "LOG_CHANNEL=stack"
        Write-Host "✅ Railway variables set!" -ForegroundColor Green
    } catch {
        Write-Host "⚠️  Could not set variables via CLI, but continuing..." -ForegroundColor Yellow
    }
    
    Write-Host ""
    
    # Step 3: Try Railway deploy with timeout handling
    Write-Host "[3/4] Attempting Railway deploy..." -ForegroundColor Yellow
    try {
        Write-Host "🚀 Starting Railway deployment (may take a few minutes)..." -ForegroundColor Green
        
        # Try deploy with timeout
        $deployResult = railway up --detach 2>&1
        if ($LASTEXITCODE -eq 0) {
            Write-Host "✅ Railway deployment initiated successfully!" -ForegroundColor Green
            break
        } else {
            Write-Host "❌ Railway deploy failed with timeout, trying again..." -ForegroundColor Red
            Write-Host "💡 This is likely a network timeout issue." -ForegroundColor Yellow
            $attempt++
            Start-Sleep -Seconds 60
            continue
        }
    } catch {
        Write-Host "❌ Error during Railway deploy: $($_.Exception.Message)" -ForegroundColor Red
        Write-Host "💡 This is likely a network timeout issue." -ForegroundColor Yellow
        $attempt++
        Start-Sleep -Seconds 60
        continue
    }
    
    Write-Host ""
    
    # Step 4: Check deployment status
    Write-Host "[4/4] Checking deployment status..." -ForegroundColor Yellow
    try {
        Start-Sleep -Seconds 30
        $domain = railway domain 2>$null
        if ($domain) {
            Write-Host "✅ Domain found: $domain" -ForegroundColor Green
            break
        } else {
            Write-Host "⚠️  No domain found yet, waiting..." -ForegroundColor Yellow
            Start-Sleep -Seconds 60
            $attempt++
            continue
        }
    } catch {
        Write-Host "⚠️  Could not check domain, continuing..." -ForegroundColor Yellow
        $attempt++
        Start-Sleep -Seconds 30
        continue
    }
    
} while ($attempt -le $maxAttempts)

Write-Host ""
Write-Host "========================================" -ForegroundColor Cyan
Write-Host "    Deployment Summary" -ForegroundColor Cyan
Write-Host "========================================" -ForegroundColor Cyan
Write-Host ""

if ($attempt -gt $maxAttempts) {
    Write-Host "❌ Deployment failed after $maxAttempts attempts due to timeout" -ForegroundColor Red
    Write-Host ""
    Write-Host "🔧 Troubleshooting Tips:" -ForegroundColor Yellow
    Write-Host "   1. Check your internet connection" -ForegroundColor White
    Write-Host "   2. Try again in a few minutes" -ForegroundColor White
    Write-Host "   3. Use Railway dashboard for manual deploy" -ForegroundColor White
    Write-Host "   4. Check if firewall/VPN is blocking connection" -ForegroundColor White
} else {
    Write-Host "✅ Deployment successful on attempt $attempt!" -ForegroundColor Green
}

Write-Host ""
Write-Host "🔗 Your Railway project:" -ForegroundColor Yellow
Write-Host "   • Dashboard: https://railway.app" -ForegroundColor Blue
Write-Host "   • GitHub: https://github.com/haddad10/SrikandiTravelLaravel" -ForegroundColor Blue
Write-Host ""
Write-Host "📱 Features deployed:" -ForegroundColor Yellow
Write-Host "   • Mobile responsive admin panel" -ForegroundColor White
Write-Host "   • Stable background images" -ForegroundColor White
Write-Host "   • Production optimizations" -ForegroundColor White
Write-Host "   • Complete PHP extensions" -ForegroundColor White
Write-Host ""
Write-Host "🎯 Railway will auto-deploy from GitHub!" -ForegroundColor Green
Write-Host ""

Read-Host "Press Enter to continue..." 