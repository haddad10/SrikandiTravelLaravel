@echo off
echo Starting Laragon...
echo.

REM Cek apakah Laragon sudah berjalan
tasklist /FI "IMAGENAME eq Laragon.exe" 2>NUL | find /I /N "Laragon.exe">NUL
if "%ERRORLEVEL%"=="0" (
    echo Laragon sudah berjalan
) else (
    echo Starting Laragon...
    start "" "C:\laragon\laragon.exe"
    timeout /t 5 /nobreak > nul
)

REM Start Apache
echo Starting Apache...
net start Apache2.4 2>nul
if %ERRORLEVEL%==0 (
    echo ✓ Apache started
) else (
    echo Apache mungkin sudah berjalan
)

REM Start MySQL
echo Starting MySQL...
net start MySQL8.0 2>nul
if %ERRORLEVEL%==0 (
    echo ✓ MySQL started
) else (
    echo MySQL mungkin sudah berjalan
)

echo.
echo === STATUS ===
netstat -an | findstr ":80"
netstat -an | findstr ":3306"

echo.
echo Sekarang coba akses:
echo http://localhost/SrikandiTravelLaravel
echo http://localhost/phpmyadmin
pause