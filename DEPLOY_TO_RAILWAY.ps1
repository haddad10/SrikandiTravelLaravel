# 🚀 Deploy to Railway - Srikandi Travel
Write-Host "========================================" -ForegroundColor Cyan
Write-Host "    Deploy to Railway" -ForegroundColor Cyan
Write-Host "========================================" -ForegroundColor Cyan
Write-Host ""

Write-Host "🎯 Deploying Srikandi Travel to Railway..." -ForegroundColor Green
Write-Host ""

# Step 1: Check git status
Write-Host "[1/4] Checking git status..." -ForegroundColor Yellow
$status = git status --porcelain
if ($status) {
    Write-Host "Found changes to deploy:" -ForegroundColor Green
    Write-Host $status -ForegroundColor Gray
} else {
    Write-Host "No changes to deploy." -ForegroundColor Green
}

Write-Host ""

# Step 2: Add and commit changes
Write-Host "[2/4] Adding and committing changes..." -ForegroundColor Yellow
try {
    git add .
    $timestamp = Get-Date -Format "yyyy-MM-dd HH:mm:ss"
    $commitMessage = "Deploy to Railway: Srikandi Travel Laravel - $timestamp"
    git commit -m $commitMessage
    Write-Host "✅ Changes committed successfully." -ForegroundColor Green
} catch {
    Write-Host "❌ Error committing changes: $($_.Exception.Message)" -ForegroundColor Red
    exit 1
}

Write-Host ""

# Step 3: Push to GitHub
Write-Host "[3/4] Pushing to GitHub..." -ForegroundColor Yellow
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

# Step 4: Railway deployment instructions
Write-Host "[4/4] Railway deployment setup..." -ForegroundColor Yellow
Write-Host "✅ Code pushed to GitHub successfully!" -ForegroundColor Green
Write-Host ""
Write-Host "🚀 Next steps for Railway deployment:" -ForegroundColor Yellow
Write-Host ""
Write-Host "1. Go to: https://railway.app" -ForegroundColor Blue
Write-Host "2. Click 'New Project'" -ForegroundColor Blue
Write-Host "3. Select 'Deploy from GitHub repo'" -ForegroundColor Blue
Write-Host "4. Connect your GitHub account" -ForegroundColor Blue
Write-Host "5. Select repository: haddad10/SrikandiTravelLaravel" -ForegroundColor Blue
Write-Host "6. Railway will automatically deploy your app!" -ForegroundColor Blue
Write-Host ""

Write-Host "========================================" -ForegroundColor Cyan
Write-Host "    🎉 Deployment Ready!" -ForegroundColor Cyan
Write-Host "========================================" -ForegroundColor Cyan
Write-Host ""
Write-Host "✅ Code pushed to GitHub" -ForegroundColor Green
Write-Host "🚀 Ready for Railway deployment" -ForegroundColor Green
Write-Host "📱 Mobile responsive admin panel ready" -ForegroundColor Green
Write-Host ""
Write-Host "🔗 Links:" -ForegroundColor Yellow
Write-Host "   • Railway: https://railway.app" -ForegroundColor Blue
Write-Host "   • GitHub: https://github.com/haddad10/SrikandiTravelLaravel" -ForegroundColor Blue
Write-Host "   • Actions: https://github.com/haddad10/SrikandiTravelLaravel/actions" -ForegroundColor Blue
Write-Host ""
Write-Host "🎯 Your Srikandi Travel Laravel app is ready for Railway!" -ForegroundColor Green
Write-Host ""

Read-Host "Press Enter to continue..." 