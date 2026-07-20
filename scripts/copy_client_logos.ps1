$srcDir = 'C:\Users\CIC\.gemini\antigravity-ide\brain\e7e95b97-0cd0-4872-a581-cb7845750ea3'
$destDir = 'C:\Users\CIC\Downloads\KKSB\public\images\clients'

if (!(Test-Path -Path $destDir)) {
    New-Item -ItemType Directory -Path $destDir -Force
}

$mapping = @{
    'media__1784539398839.png' = 'bare-bakers.png';
    'media__1784539398862.png' = 'blackberrys.png';
    'media__1784539398928.jpg' = 'devbhumi.jpg';
    'media__1784539398940.png' = 'mcdonalds.png';
    'media__1784539399004.jpg' = 'belgian-waffle.jpg';
    'media__1784539426858.jpg' = 'gigo-bytes.jpg';
    'media__1784539426885.png' = 'hero.png';
    'media__1784539426896.png' = 'hungry-point.png';
    'media__1784539426948.png' = 'swiggy.png';
    'media__1784539426985.jpg' = 'laxmanjee.jpg';
    'media__1784539437759.png' = 'lenovo.png';
    'media__1784539437769.jpg' = 'lg.jpg';
    'media__1784539437778.jpg' = 'liqo.jpg';
    'media__1784539437806.jpg' = 'maini.jpg';
    'media__1784539437842.jpg' = 'mehrus.jpg';
    'media__1784539450093.png' = 'nexa.png';
    'media__1784539450105.jpg' = 'nfci.jpg';
    'media__1784539450162.png' = 'paris-parker.png';
    'media__1784539450164.png' = 'peter-england.png';
    'media__1784539450238.png' = 'zomato.png';
    'media__1784539458426.png' = 'zorko.png';
}

foreach ($key in $mapping.Keys) {
    $src = Join-Path $srcDir $key
    $dest = Join-Path $destDir $mapping[$key]
    if (Test-Path -Path $src) {
        Copy-Item -Path $src -Destination $dest -Force
        Write-Output "Copied $key -> $($mapping[$key])"
    } else {
        Write-Output "Warning: File $key not found."
    }
}
