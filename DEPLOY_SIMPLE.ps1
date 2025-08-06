# 🚀 Simple Railway Deploy
Write-Host "========================================" -ForegroundColor Cyan
Write-Host "    Simple Railway Deploy" -ForegroundColor Cyan
Write-Host "========================================" -ForegroundColor Cyan
Write-Host ""

Write-Host "🎯 Pushing to GitHub for Railway auto-deploy..." -ForegroundColor Green
Write-Host ""

# Push to GitHub
Write-Host "[1/2] Pushing to GitHub..." -ForegroundColor Yellow
try {
    git add .
    git commit -m "Fix Railway deployment - $(Get-Date -Format 'yyyy-MM-dd HH:mm:ss')"
    git push origin main
    Write-Host "✅ Successfully pushed to GitHub!" -ForegroundColor Green
} catch {
    Write-Host "❌ Error pushing to GitHub: $($_.Exception.Message)" -ForegroundColor Red
    exit 1
}

Write-Host ""

# Show deployment info
Write-Host "[2/2] Deployment information..." -ForegroundColor Yellow
Write-Host "✅ Code pushed to GitHub!" -ForegroundColor Green
Write-Host "🚀 Railway will auto-deploy from GitHub" -ForegroundColor Green
Write-Host ""
Write-Host "🔗 Your Railway project:" -ForegroundColor Yellow
Write-Host "   • Dashboard: https://railway.app" -ForegroundColor Blue
Write-Host "   • Project: https://railway.app/project/547a439f-9a44-4bea-9619-6aeb16649691" -ForegroundColor Blue
Write-Host "   • GitHub: https://github.com/haddad10/SrikandiTravelLaravel" -ForegroundColor Blue
Write-Host ""
Write-Host "📱 Features ready:" -ForegroundColor Yellow
Write-Host "   • Mobile responsive admin panel" -ForegroundColor White
Write-Host "   • Stable background images" -ForegroundColor White
Write-Host "   • Production optimizations" -ForegroundColor White
Write-Host "   • SQLite database configuration" -ForegroundColor White
Write-Host ""
Write-Host "🎯 Railway will automatically deploy your app!" -ForegroundColor Green
Write-Host ""

Read-Host "Press Enter to continue..." 