# Srikandi Travel Auto Deploy Script
Write-Host "========================================" -ForegroundColor Cyan
Write-Host "    Srikandi Travel Auto Deploy" -ForegroundColor Cyan
Write-Host "========================================" -ForegroundColor Cyan
Write-Host ""

# Step 1: Check git status
Write-Host "[1/5] Checking git status..." -ForegroundColor Yellow
try {
    $status = git status --porcelain
    if ($status) {
        Write-Host "Found changes to commit:" -ForegroundColor Green
        Write-Host $status -ForegroundColor Gray
    } else {
        Write-Host "No changes to commit." -ForegroundColor Green
    }
} catch {
    Write-Host "Error checking git status: $($_.Exception.Message)" -ForegroundColor Red
    exit 1
}

Write-Host ""

# Step 2: Add all changes
Write-Host "[2/5] Adding all changes..." -ForegroundColor Yellow
try {
    git add .
    Write-Host "Changes added successfully." -ForegroundColor Green
} catch {
    Write-Host "Error adding changes: $($_.Exception.Message)" -ForegroundColor Red
    exit 1
}

Write-Host ""

# Step 3: Commit changes
Write-Host "[3/5] Committing changes..." -ForegroundColor Yellow
try {
    $timestamp = Get-Date -Format "yyyy-MM-dd HH:mm:ss"
    $commitMessage = "Auto deploy: Update Srikandi Travel Laravel with mobile responsive admin panel - $timestamp"
    git commit -m $commitMessage
    Write-Host "Changes committed successfully." -ForegroundColor Green
} catch {
    Write-Host "Error committing changes: $($_.Exception.Message)" -ForegroundColor Red
    exit 1
}

Write-Host ""

# Step 4: Push to GitHub
Write-Host "[4/5] Pushing to GitHub..." -ForegroundColor Yellow
try {
    git push origin main
    Write-Host "Successfully pushed to GitHub!" -ForegroundColor Green
} catch {
    Write-Host "Error pushing to GitHub: $($_.Exception.Message)" -ForegroundColor Red
    Write-Host "Please check your GitHub credentials or Personal Access Token." -ForegroundColor Yellow
    exit 1
}

Write-Host ""

# Step 5: Deployment status
Write-Host "[5/5] Deployment initiated..." -ForegroundColor Yellow
Write-Host "Railway will automatically deploy your changes." -ForegroundColor Green

Write-Host ""
Write-Host "========================================" -ForegroundColor Cyan
Write-Host "    Deployment Complete!" -ForegroundColor Cyan
Write-Host "========================================" -ForegroundColor Cyan
Write-Host ""
Write-Host "Your changes have been pushed to GitHub." -ForegroundColor Green
Write-Host "Railway will automatically deploy the updates." -ForegroundColor Green
Write-Host ""
Write-Host "Check deployment status at:" -ForegroundColor Yellow
Write-Host "https://railway.app" -ForegroundColor Blue
Write-Host ""
Write-Host "GitHub repository:" -ForegroundColor Yellow
Write-Host "https://github.com/haddad10/SrikandiTravelLaravel" -ForegroundColor Blue
Write-Host ""

Read-Host "Press Enter to continue..." 