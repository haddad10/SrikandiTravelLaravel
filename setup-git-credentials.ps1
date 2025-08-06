# Setup Git Credentials for Auto Deployment
Write-Host "========================================" -ForegroundColor Cyan
Write-Host "    Git Credentials Setup" -ForegroundColor Cyan
Write-Host "========================================" -ForegroundColor Cyan
Write-Host ""

Write-Host "This script will help you setup git credentials for automatic deployment." -ForegroundColor Yellow
Write-Host ""

# Get GitHub Personal Access Token
Write-Host "Step 1: GitHub Personal Access Token" -ForegroundColor Green
Write-Host "1. Go to: https://github.com/settings/tokens" -ForegroundColor Blue
Write-Host "2. Click 'Generate new token (classic)'" -ForegroundColor Blue
Write-Host "3. Give it a name: 'Srikandi Travel Auto Deploy'" -ForegroundColor Blue
Write-Host "4. Select scopes: 'repo' and 'workflow'" -ForegroundColor Blue
Write-Host "5. Click 'Generate token'" -ForegroundColor Blue
Write-Host "6. Copy the token (you won't see it again!)" -ForegroundColor Blue
Write-Host ""

$token = Read-Host "Enter your GitHub Personal Access Token" -AsSecureString
$tokenPlain = [Runtime.InteropServices.Marshal]::PtrToStringAuto([Runtime.InteropServices.Marshal]::SecureStringToBSTR($token))

Write-Host ""

# Setup git credentials
Write-Host "Step 2: Setting up git credentials..." -ForegroundColor Green

# Configure git user
git config --global user.name "haddad10"
git config --global user.email "haddad10@gmail.com"

# Store credentials
Write-Host "Setting up credential storage..." -ForegroundColor Yellow
git config --global credential.helper store

Write-Host ""
Write-Host "Step 3: Testing connection..." -ForegroundColor Green

# Test push (this will store credentials)
try {
    Write-Host "Attempting to push to GitHub..." -ForegroundColor Yellow
    Write-Host "When prompted, use your Personal Access Token as password." -ForegroundColor Yellow
    Write-Host ""
    
    # Create a test file
    "Test file for credentials setup" | Out-File -FilePath "test-credentials.txt" -Encoding UTF8
    git add test-credentials.txt
    git commit -m "Test credentials setup"
    
    # Try to push (this will prompt for credentials)
    git push origin main
    
    # Clean up test file
    git reset --hard HEAD~1
    Remove-Item "test-credentials.txt" -ErrorAction SilentlyContinue
    
    Write-Host ""
    Write-Host "✅ Git credentials setup successful!" -ForegroundColor Green
    Write-Host "You can now use the auto-deploy scripts." -ForegroundColor Green
    
} catch {
    Write-Host ""
    Write-Host "❌ Error setting up credentials: $($_.Exception.Message)" -ForegroundColor Red
    Write-Host "Please check your Personal Access Token and try again." -ForegroundColor Yellow
}

Write-Host ""
Write-Host "========================================" -ForegroundColor Cyan
Write-Host "    Setup Complete!" -ForegroundColor Cyan
Write-Host "========================================" -ForegroundColor Cyan
Write-Host ""
Write-Host "Next steps:" -ForegroundColor Yellow
Write-Host "1. Run: .\auto-deploy.ps1" -ForegroundColor Blue
Write-Host "2. Setup Railway secrets (see RAILWAY_SECRETS_SETUP.md)" -ForegroundColor Blue
Write-Host "3. Deploy to Railway!" -ForegroundColor Blue
Write-Host ""

Read-Host "Press Enter to continue..." 