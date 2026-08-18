# Temporarily rename SQLite database so it isn't included in the ZIP
$dbPath = ".\database\database.sqlite"
$dbExists = Test-Path $dbPath
if ($dbExists) {
    Rename-Item $dbPath "database.sqlite.temp"
}

# Exclude directories we don't want to upload/overwrite (node_modules, storage, etc. - keep vendor)
$excludeList = @("node_modules", ".git", ".env", "kksb-deployment.zip", "kksb-deployment-full.zip", ".phpunit.result.cache", "storage")
$files = Get-ChildItem -Path . -Exclude $excludeList -Force

Write-Host "Creating full deployment ZIP file (with vendor folder)..."
Compress-Archive -Path $files -DestinationPath .\kksb-deployment-full.zip -Force

# Restore the SQLite database locally
if ($dbExists) {
    Rename-Item ".\database\database.sqlite.temp" "database.sqlite"
}

Write-Host "Full ZIP file created successfully!"
