# 🚀 Quick Railway Deploy - Srikandi Travel
Write-Host "========================================" -ForegroundColor Cyan
Write-Host "    Quick Railway Deploy" -ForegroundColor Cyan
Write-Host "========================================" -ForegroundColor Cyan
Write-Host ""

Write-Host "🎯 Quick deployment to Railway..." -ForegroundColor Green
Write-Host ""

# Step 1: Push to GitHub (triggers Railway deployment)
Write-Host "[1/3] Pushing to GitHub..." -ForegroundColor Yellow
try {
    git add .
    git commit -m "Quick deploy: Srikandi Travel Laravel - $(Get-Date -Format 'yyyy-MM-dd HH:mm:ss')"
    git push origin main
    Write-Host "✅ Successfully pushed to GitHub!" -ForegroundColor Green
} catch {
    Write-Host "❌ Error pushing to GitHub: $($_.Exception.Message)" -ForegroundColor Red
    exit 1
}

Write-Host ""

# Step 2: Set Railway variables
Write-Host "[2/3] Setting Railway variables..." -ForegroundColor Yellow
try {
    railway variables --set "APP_ENV=production" --set "APP_DEBUG=false" --set "APP_NAME=Srikandi Travel"
    Write-Host "✅ Railway variables set!" -ForegroundColor Green
} catch {
    Write-Host "⚠️  Could not set variables via CLI, but continuing..." -ForegroundColor Yellow
}

Write-Host ""

# Step 3: Deploy info
Write-Host "[3/3] Deployment information..." -ForegroundColor Yellow
Write-Host "✅ Deployment process completed!" -ForegroundColor Green
Write-Host ""
Write-Host "🔗 Your Railway project:" -ForegroundColor Yellow
Write-Host "   • Dashboard: https://railway.app" -ForegroundColor Blue
Write-Host "   • Project: https://railway.app/project/d60ea6fb-9ec7-4756-bbc8-bc428d2222f6" -ForegroundColor Blue
Write-Host "   • GitHub: https://github.com/haddad10/SrikandiTravelLaravel" -ForegroundColor Blue
Write-Host ""
Write-Host "📱 Features ready:" -ForegroundColor Yellow
Write-Host "   • Mobile responsive admin panel" -ForegroundColor White
Write-Host "   • Stable background images" -ForegroundColor White
Write-Host "   • Production optimizations" -ForegroundColor White
Write-Host "   • Laravel application" -ForegroundColor White
Write-Host ""
Write-Host "🎯 Railway will automatically deploy from GitHub!" -ForegroundColor Green
Write-Host ""

Read-Host "Press Enter to continue..." 