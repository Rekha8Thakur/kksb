$excludeList = @("node_modules", "vendor", ".git", ".env", "kksb-deployment.zip", ".phpunit.result.cache")
$files = Get-ChildItem -Path . -Exclude $excludeList
Write-Host "Creating deployment ZIP file: kksb-deployment.zip..."
Compress-Archive -Path $files -DestinationPath .\kksb-deployment.zip -Force
Write-Host "ZIP file created successfully!"
