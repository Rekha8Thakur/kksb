<?php

$srcPath = 'C:/Users/CIC/.gemini/antigravity-ide/brain/e7e95b97-0cd0-4872-a581-cb7845750ea3/media__1784533234362.png';
$destPath = __DIR__ . '/../public/images/logo.png';

if (!file_exists($srcPath)) {
    echo "Source image not found.\n";
    exit(1);
}

$img = imagecreatefrompng($srcPath);
if (!$img) {
    echo "Failed to load PNG image.\n";
    exit(1);
}

// Convert palette/transparent image if needed, then crop white space
$cropped = imagecropauto($img, IMG_CROP_WHITE);
if ($cropped) {
    imagepng($cropped, $destPath);
    imagedestroy($cropped);
    echo "Successfully cropped whitespace and updated logo.png\n";
} else {
    // If auto crop white doesn't trigger, attempt threshold crop or save directly
    imagepng($img, $destPath);
    echo "Updated logo.png with original dimensions\n";
}

imagedestroy($img);
