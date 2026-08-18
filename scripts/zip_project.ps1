# Temporarily rename SQLite database so it isn't included in the ZIP
$dbPath = ".\database\database.sqlite"
$dbExists = Test-Path $dbPath
if ($dbExists) {
    Rename-Item $dbPath "database.sqlite.temp"
}

# Exclude directories we don't want to upload/overwrite (vendor, node_modules, storage, etc.)
$excludeList = @("node_modules", "vendor", ".git", ".env", "kksb-deployment.zip", "kksb-deployment-full.zip", ".phpunit.result.cache", "storage")
$files = Get-ChildItem -Path . -Exclude $excludeList -Force

Write-Host "Creating deployment ZIP file: kksb-deployment.zip..."
Compress-Archive -Path $files -DestinationPath .\kksb-deployment.zip -Force

# Restore the SQLite database locally
if ($dbExists) {
    Rename-Item ".\database\database.sqlite.temp" "database.sqlite"
}

Write-Host "ZIP file created successfully!"
