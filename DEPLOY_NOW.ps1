# 🚀 Srikandi Travel - Deploy Now!
Write-Host "========================================" -ForegroundColor Cyan
Write-Host "    Srikandi Travel Auto Deploy" -ForegroundColor Cyan
Write-Host "========================================" -ForegroundColor Cyan
Write-Host ""

Write-Host "🎯 Deploying to Railway..." -ForegroundColor Green
Write-Host ""

# Step 1: Check current status
Write-Host "[1/4] Checking current status..." -ForegroundColor Yellow
$status = git status --porcelain
if ($status) {
    Write-Host "Found changes to deploy:" -ForegroundColor Green
    Write-Host $status -ForegroundColor Gray
} else {
    Write-Host "No changes to deploy." -ForegroundColor Green
}

Write-Host ""

# Step 2: Add all changes
Write-Host "[2/4] Adding all changes..." -ForegroundColor Yellow
try {
    git add .
    Write-Host "✅ Changes added successfully." -ForegroundColor Green
} catch {
    Write-Host "❌ Error adding changes: $($_.Exception.Message)" -ForegroundColor Red
    exit 1
}

Write-Host ""

# Step 3: Commit with timestamp
Write-Host "[3/4] Committing changes..." -ForegroundColor Yellow
try {
    $timestamp = Get-Date -Format "yyyy-MM-dd HH:mm:ss"
    $commitMessage = "🚀 Auto deploy: Srikandi Travel Laravel with mobile responsive admin panel - $timestamp"
    git commit -m $commitMessage
    Write-Host "✅ Changes committed successfully." -ForegroundColor Green
} catch {
    Write-Host "❌ Error committing changes: $($_.Exception.Message)" -ForegroundColor Red
    exit 1
}

Write-Host ""

# Step 4: Push to GitHub (triggers Railway deployment)
Write-Host "[4/4] Pushing to GitHub..." -ForegroundColor Yellow
try {
    git push origin main
    Write-Host "✅ Successfully pushed to GitHub!" -ForegroundColor Green
    Write-Host "🚀 Railway deployment triggered!" -ForegroundColor Green
} catch {
    Write-Host "❌ Error pushing to GitHub: $($_.Exception.Message)" -ForegroundColor Red
    Write-Host "💡 Make sure you have set up git credentials." -ForegroundColor Yellow
    Write-Host "   Run: .\setup-git-credentials.ps1" -ForegroundColor Blue
    exit 1
}

Write-Host ""
Write-Host "========================================" -ForegroundColor Cyan
Write-Host "    🎉 Deployment Complete!" -ForegroundColor Cyan
Write-Host "========================================" -ForegroundColor Cyan
Write-Host ""
Write-Host "✅ Your changes have been pushed to GitHub" -ForegroundColor Green
Write-Host "🚀 Railway will automatically deploy your updates" -ForegroundColor Green
Write-Host ""
Write-Host "📱 Features deployed:" -ForegroundColor Yellow
Write-Host "   • Mobile responsive admin panel" -ForegroundColor White
Write-Host "   • Stable background images" -ForegroundColor White
Write-Host "   • Production optimizations" -ForegroundColor White
Write-Host "   • Automatic deployment workflow" -ForegroundColor White
Write-Host ""
Write-Host "🔗 Check deployment status:" -ForegroundColor Yellow
Write-Host "   • Railway: https://railway.app" -ForegroundColor Blue
Write-Host "   • GitHub: https://github.com/haddad10/SrikandiTravelLaravel" -ForegroundColor Blue
Write-Host "   • Actions: https://github.com/haddad10/SrikandiTravelLaravel/actions" -ForegroundColor Blue
Write-Host ""
Write-Host "🎯 Your Srikandi Travel Laravel app is now live!" -ForegroundColor Green
Write-Host ""

Read-Host "Press Enter to continue..." 