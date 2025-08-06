@echo off
echo ========================================
echo    Srikandi Travel Auto Deploy
echo ========================================
echo.

echo [1/4] Checking git status...
git status

echo.
echo [2/4] Adding all changes...
git add .

echo.
echo [3/4] Committing changes...
git commit -m "Auto deploy: Update Srikandi Travel Laravel with mobile responsive admin panel"

echo.
echo [4/4] Pushing to GitHub...
git push origin main

echo.
echo ========================================
echo    Deployment Complete!
echo ========================================
echo.
echo Your changes have been pushed to GitHub.
echo Railway will automatically deploy the updates.
echo.
echo Check deployment status at:
echo https://railway.app
echo.
pause 