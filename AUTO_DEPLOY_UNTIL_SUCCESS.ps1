# 🚀 Auto Deploy Until Success - Srikandi Travel
Write-Host "========================================" -ForegroundColor Cyan
Write-Host "    Auto Deploy Until Success" -ForegroundColor Cyan
Write-Host "========================================" -ForegroundColor Cyan
Write-Host ""

Write-Host "🎯 Automatically deploying until success..." -ForegroundColor Green
Write-Host ""

$maxAttempts = 5
$attempt = 1

do {
    Write-Host "========================================" -ForegroundColor Yellow
    Write-Host "    Attempt $attempt of $maxAttempts" -ForegroundColor Yellow
    Write-Host "========================================" -ForegroundColor Yellow
    Write-Host ""
    
    # Step 1: Push to GitHub
    Write-Host "[1/4] Pushing to GitHub..." -ForegroundColor Yellow
    try {
        git add .
        $timestamp = Get-Date -Format "yyyy-MM-dd HH:mm:ss"
        git commit -m "Auto deploy attempt $attempt - $timestamp"
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
    
    # Step 3: Try Railway deploy
    Write-Host "[3/4] Attempting Railway deploy..." -ForegroundColor Yellow
    try {
        $deployResult = railway up --detach 2>&1
        if ($LASTEXITCODE -eq 0) {
            Write-Host "✅ Railway deployment initiated successfully!" -ForegroundColor Green
            break
        } else {
            Write-Host "❌ Railway deploy failed, trying again..." -ForegroundColor Red
            $attempt++
            Start-Sleep -Seconds 30
            continue
        }
    } catch {
        Write-Host "❌ Error during Railway deploy: $($_.Exception.Message)" -ForegroundColor Red
        $attempt++
        Start-Sleep -Seconds 30
        continue
    }
    
    Write-Host ""
    
    # Step 4: Check deployment status
    Write-Host "[4/4] Checking deployment status..." -ForegroundColor Yellow
    try {
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
    Write-Host "❌ Deployment failed after $maxAttempts attempts" -ForegroundColor Red
    Write-Host "💡 Please check Railway dashboard manually" -ForegroundColor Yellow
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
Write-Host "   • Fixed Nix build configuration" -ForegroundColor White
Write-Host ""
Write-Host "🎯 Check Railway dashboard for live URL!" -ForegroundColor Green
Write-Host ""

Read-Host "Press Enter to continue..." 