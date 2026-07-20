Add-Type -AssemblyName System.Drawing

$src = 'C:\Users\CIC\.gemini\antigravity-ide\brain\e7e95b97-0cd0-4872-a581-cb7845750ea3\media__1784533234362.png'
$dest = 'C:\Users\CIC\Downloads\KKSB\public\images\logo.png'

if (!(Test-Path -Path $src)) {
    Write-Output "Source image not found."
    exit 1
}

$bmp = [System.Drawing.Bitmap]::FromFile($src)
$minX = $bmp.Width
$maxX = 0
$minY = $bmp.Height
$maxY = 0

for ($y = 0; $y -lt $bmp.Height; $y++) {
    for ($x = 0; $x -lt $bmp.Width; $x++) {
        $pixel = $bmp.GetPixel($x, $y)
        if ($pixel.A -gt 20 -and ($pixel.R -lt 240 -or $pixel.G -lt 240 -or $pixel.B -lt 240)) {
            if ($x -lt $minX) { $minX = $x }
            if ($x -gt $maxX) { $maxX = $x }
            if ($y -lt $minY) { $minY = $y }
            if ($y -gt $maxY) { $maxY = $y }
        }
    }
}

if ($maxX -gt $minX -and $maxY -gt $minY) {
    $pad = 10
    $cropX = [Math]::Max(0, $minX - $pad)
    $cropY = [Math]::Max(0, $minY - $pad)
    $cropW = [Math]::Min($bmp.Width - $cropX, ($maxX - $minX) + ($pad * 2))
    $cropH = [Math]::Min($bmp.Height - $cropY, ($maxY - $minY) + ($pad * 2))

    $rect = New-Object System.Drawing.Rectangle($cropX, $cropY, $cropW, $cropH)
    $cropped = $bmp.Clone($rect, $bmp.PixelFormat)
    $bmp.Dispose()
    $cropped.Save($dest, [System.Drawing.Imaging.ImageFormat]::Png)
    $cropped.Dispose()
    Write-Output "Successfully auto-cropped whitespace and saved logo.png ($cropW by $cropH)"
} else {
    $bmp.Dispose()
    Copy-Item -Path $src -Destination $dest -Force
    Write-Output "Copied logo.png directly"
}
