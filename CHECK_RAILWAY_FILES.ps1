# 🔍 Check Railway Files - Srikandi Travel
Write-Host "========================================" -ForegroundColor Cyan
Write-Host "    Check Railway Configuration Files" -ForegroundColor Cyan
Write-Host "========================================" -ForegroundColor Cyan
Write-Host ""

Write-Host "🔍 Checking Railway configuration files..." -ForegroundColor Green
Write-Host ""

# Check railway.toml
Write-Host "[1/6] Checking railway.toml..." -ForegroundColor Yellow
if (Test-Path "railway.toml") {
    Write-Host "✅ railway.toml exists" -ForegroundColor Green
    Get-Content "railway.toml" | Write-Host -ForegroundColor Gray
} else {
    Write-Host "❌ railway.toml missing" -ForegroundColor Red
}

Write-Host ""

# Check Procfile
Write-Host "[2/6] Checking Procfile..." -ForegroundColor Yellow
if (Test-Path "Procfile") {
    Write-Host "✅ Procfile exists" -ForegroundColor Green
    Get-Content "Procfile" | Write-Host -ForegroundColor Gray
} else {
    Write-Host "❌ Procfile missing" -ForegroundColor Red
}

Write-Host ""

# Check railway-start.sh
Write-Host "[3/6] Checking railway-start.sh..." -ForegroundColor Yellow
if (Test-Path "railway-start.sh") {
    Write-Host "✅ railway-start.sh exists" -ForegroundColor Green
    Get-Content "railway-start.sh" | Write-Host -ForegroundColor Gray
} else {
    Write-Host "❌ railway-start.sh missing" -ForegroundColor Red
}

Write-Host ""

# Check nixpacks.toml
Write-Host "[4/6] Checking nixpacks.toml..." -ForegroundColor Yellow
if (Test-Path "nixpacks.toml") {
    Write-Host "✅ nixpacks.toml exists" -ForegroundColor Green
    Get-Content "nixpacks.toml" | Write-Host -ForegroundColor Gray
} else {
    Write-Host "❌ nixpacks.toml missing" -ForegroundColor Red
}

Write-Host ""

# Check railway.json
Write-Host "[5/6] Checking railway.json..." -ForegroundColor Yellow
if (Test-Path "railway.json") {
    Write-Host "✅ railway.json exists" -ForegroundColor Green
    Get-Content "railway.json" | Write-Host -ForegroundColor Gray
} else {
    Write-Host "❌ railway.json missing" -ForegroundColor Red
}

Write-Host ""

# Check .railwayignore
Write-Host "[6/6] Checking .railwayignore..." -ForegroundColor Yellow
if (Test-Path ".railwayignore") {
    Write-Host "✅ .railwayignore exists" -ForegroundColor Green
    Get-Content ".railwayignore" | Write-Host -ForegroundColor Gray
} else {
    Write-Host "❌ .railwayignore missing" -ForegroundColor Red
}

Write-Host ""
Write-Host "========================================" -ForegroundColor Cyan
Write-Host "    Railway Files Check Complete" -ForegroundColor Cyan
Write-Host "========================================" -ForegroundColor Cyan
Write-Host ""

Write-Host "🎯 Next Steps:" -ForegroundColor Yellow
Write-Host "   1. Push to GitHub: git add . && git commit -m 'Fix Railway config' && git push" -ForegroundColor White
Write-Host "   2. Deploy via Railway Dashboard: https://railway.app" -ForegroundColor White
Write-Host "   3. Or try Railway CLI again: railway up" -ForegroundColor White
Write-Host ""

Write-Host "🔗 Your Railway project:" -ForegroundColor Yellow
Write-Host "   • Dashboard: https://railway.app" -ForegroundColor Blue
Write-Host "   • GitHub: https://github.com/haddad10/SrikandiTravelLaravel" -ForegroundColor Blue
Write-Host ""

Read-Host "Press Enter to continue..." 