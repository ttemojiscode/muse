# ============================================================
#  WordPress One-Click Installer for Laragon
#  - Purana PHP code 'muse' folder se hata kar backup karega
#  - WordPress + Kadence Theme + Kadence Blocks
#  - Rank Math SEO + LiteSpeed Cache install karega
#  - Database 'muse_wp' banayega aur wp-config.php tayyar karega
# ============================================================
$ErrorActionPreference = 'Stop'
[Net.ServicePointManager]::SecurityProtocol = [Net.SecurityProtocolType]::Tls12

$wwwRoot = $PSScriptRoot
$target  = Join-Path $wwwRoot 'muse'
$backup  = Join-Path $wwwRoot 'muse-old-php-backup'
$dbName  = 'muse_wp'
$dbUser  = 'root'
$dbPass  = ''

Write-Host ""
Write-Host "============================================" -ForegroundColor Cyan
Write-Host "  WordPress Installer - Laragon (muse)" -ForegroundColor Cyan
Write-Host "============================================" -ForegroundColor Cyan
Write-Host "Ye script:"
Write-Host "  1. Purana PHP code muse folder se hata dega"
Write-Host "     (backup 'muse-old-php-backup' folder mein rahega)"
Write-Host "  2. WordPress install karega"
Write-Host "  3. Kadence Theme, Kadence Blocks, Rank Math"
Write-Host "     aur LiteSpeed Cache install karega"
Write-Host "  4. Database '$dbName' banayega"
Write-Host ""
$confirm = Read-Host "Aage barhna hai? (Y likh kar Enter karein)"
if ($confirm -ne 'Y' -and $confirm -ne 'y') { Write-Host "Cancel kar diya gaya."; pause; exit }

try {
    # --- 1. Purana code backup / remove ---
    if (Test-Path $target) {
        Write-Host "`n[1/6] Purana code backup kar raha hoon..." -ForegroundColor Yellow
        if (Test-Path $backup) { Remove-Item $backup -Recurse -Force }
        Move-Item $target $backup
        Write-Host "      Backup: $backup"
    }
    New-Item -ItemType Directory -Path $target -Force | Out-Null

    # --- 2. WordPress download ---
    $tmp = Join-Path $env:TEMP 'wp-installer-tmp'
    if (Test-Path $tmp) { Remove-Item $tmp -Recurse -Force }
    New-Item -ItemType Directory -Path $tmp -Force | Out-Null

    Write-Host "`n[2/6] WordPress download kar raha hoon (wordpress.org)..." -ForegroundColor Yellow
    Invoke-WebRequest 'https://wordpress.org/latest.zip' -OutFile (Join-Path $tmp 'wp.zip')
    Expand-Archive (Join-Path $tmp 'wp.zip') -DestinationPath (Join-Path $tmp 'wp') -Force
    Copy-Item (Join-Path $tmp 'wp\wordpress\*') -Destination $target -Recurse -Force
    Write-Host "      WordPress files muse folder mein aa gaye."

    # --- 3. Theme + Plugins download ---
    Write-Host "`n[3/6] Kadence Theme download kar raha hoon..." -ForegroundColor Yellow
    Invoke-WebRequest 'https://downloads.wordpress.org/theme/kadence.latest-stable.zip' -OutFile (Join-Path $tmp 'kadence.zip')
    Expand-Archive (Join-Path $tmp 'kadence.zip') -DestinationPath (Join-Path $target 'wp-content\themes') -Force

    $plugins = @{
        'kadence-blocks'  = 'https://downloads.wordpress.org/plugin/kadence-blocks.latest-stable.zip'
        'rank-math'       = 'https://downloads.wordpress.org/plugin/seo-by-rank-math.latest-stable.zip'
        'litespeed-cache' = 'https://downloads.wordpress.org/plugin/litespeed-cache.latest-stable.zip'
    }
    foreach ($name in $plugins.Keys) {
        Write-Host "      Plugin download: $name" -ForegroundColor Yellow
        $zip = Join-Path $tmp "$name.zip"
        Invoke-WebRequest $plugins[$name] -OutFile $zip
        Expand-Archive $zip -DestinationPath (Join-Path $target 'wp-content\plugins') -Force
    }
    Write-Host "      Theme aur teeno plugins install ho gaye (files)."

    # --- 4. Database banana (Laragon MySQL) ---
    Write-Host "`n[4/6] Database '$dbName' bana raha hoon..." -ForegroundColor Yellow
    $laragonRoot = Split-Path $wwwRoot -Parent
    $mysql = Get-ChildItem -Path (Join-Path $laragonRoot 'bin\mysql') -Recurse -Filter 'mysql.exe' -ErrorAction SilentlyContinue | Select-Object -First 1
    $dbDone = $false
    if ($mysql) {
        try {
            & $mysql.FullName -u $dbUser -e "CREATE DATABASE IF NOT EXISTS $dbName CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;"
            if ($LASTEXITCODE -eq 0) { $dbDone = $true; Write-Host "      Database tayyar hai." }
        } catch { }
    }
    if (-not $dbDone) {
        Write-Host "      [NOTE] Database khud nahi ban saka - Laragon chalu kar ke" -ForegroundColor Red
        Write-Host "      HeidiSQL / Laragon Database se '$dbName' naam ka database bana lein." -ForegroundColor Red
    }

    # --- 5. wp-config.php tayyar karna ---
    Write-Host "`n[5/6] wp-config.php bana raha hoon..." -ForegroundColor Yellow
    $config = Get-Content (Join-Path $target 'wp-config-sample.php') -Raw
    $config = $config -replace 'database_name_here', $dbName
    $config = $config -replace 'username_here', $dbUser
    $config = $config -replace 'password_here', $dbPass
    $chars = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789!@#$%^&*()-_=+'
    while ($config.Contains('put your unique phrase here')) {
        $salt = -join (1..64 | ForEach-Object { $chars[(Get-Random -Maximum $chars.Length)] })
        $config = [regex]::Replace($config, [regex]::Escape('put your unique phrase here'), $salt, 1)
    }
    [System.IO.File]::WriteAllText((Join-Path $target 'wp-config.php'), $config, (New-Object System.Text.UTF8Encoding($false)))
    Write-Host "      wp-config.php tayyar hai."

    Remove-Item $tmp -Recurse -Force -ErrorAction SilentlyContinue

    # --- 6. Done ---
    Write-Host "`n[6/6] INSTALLATION COMPLETE!" -ForegroundColor Green
    Write-Host "============================================" -ForegroundColor Green
    Write-Host "Ab ye karein:"
    Write-Host "  1. Laragon START karein (Start All)"
    Write-Host "  2. Browser mein kholein: http://muse.test"
    Write-Host "  3. WordPress wizard mein site ka naam aur apna"
    Write-Host "     admin username / password khud set karein"
    Write-Host "  4. wp-admin mein:"
    Write-Host "     Appearance > Themes > Kadence = Activate"
    Write-Host "     Plugins > Kadence Blocks, Rank Math aur"
    Write-Host "     LiteSpeed Cache = teeno Activate kar dein"
    Write-Host ""
    Write-Host "Note: LiteSpeed Cache local par server warning de sakta"
    Write-Host "hai - ye normal hai, plugin live LiteSpeed hosting par"
    Write-Host "poori tarah kaam karega."
    Write-Host "============================================" -ForegroundColor Green
}
catch {
    Write-Host "`n[ERROR] $($_.Exception.Message)" -ForegroundColor Red
    Write-Host "Internet check karein aur dobara script chalyein."
    Write-Host "Purana code backup folder mein mehfooz hai: $backup"
}
Write-Host ""
pause
