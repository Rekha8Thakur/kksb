$excludeList = @("node_modules", ".git", ".env", "kksb-deployment.zip", "kksb-deployment-full.zip", ".phpunit.result.cache")
$files = Get-ChildItem -Path . -Exclude $excludeList
Write-Host "Creating full deployment ZIP file (with vendor folder)..."
Compress-Archive -Path $files -DestinationPath .\kksb-deployment-full.zip -Force
Write-Host "Full ZIP file created successfully!"
