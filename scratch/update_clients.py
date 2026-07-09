import os
import shutil
from PIL import Image, ImageChops

brain_dir = r"C:\Users\CIC\.gemini\antigravity-ide\brain\65a1e8c0-7ff1-46c0-82e1-aed115f82d97"
dest_dir = r"public\images\clients"

# Make dest_dir
os.makedirs(dest_dir, exist_ok=True)

# Find the files starting with media__17836125 and media__17836126
prefixes = ["media__17836125", "media__17836126"]
client_files = []
for f in os.listdir(brain_dir):
    if any(f.startswith(p) for p in prefixes):
        client_files.append(os.path.join(brain_dir, f))

# Sort to maintain consistent ordering
client_files.sort()

print(f"Found {len(client_files)} client logos to process.")

def crop_and_save(src_path, dest_path):
    img = Image.open(src_path)
    img = img.convert('RGBA')
    
    # Bbox from alpha
    bbox = img.getbbox()
    
    if not bbox:
        # Bbox from white background
        rgb_img = img.convert('RGB')
        bg = Image.new('RGB', img.size, (255, 255, 255))
        diff = ImageChops.difference(rgb_img, bg)
        bbox = diff.getbbox()
        
    if bbox:
        padding = 10
        left = max(0, bbox[0] - padding)
        top = max(0, bbox[1] - padding)
        right = min(img.width, bbox[2] + padding)
        bottom = min(img.height, bbox[3] + padding)
        cropped_img = img.crop((left, top, right, bottom))
    else:
        cropped_img = img
        
    # Save as PNG
    cropped_img.save(dest_path, "PNG")

# Process each logo
db_entries = []
for idx, src_path in enumerate(client_files):
    filename = f"client_{idx + 1}.png"
    dest_path = os.path.join(dest_dir, filename)
    crop_and_save(src_path, dest_path)
    relative_path = f"images/clients/{filename}"
    db_entries.append(relative_path)
    print(f"Processed: {src_path} -> {dest_path}")

# Write a PHP seeding script to execute via Artisan
php_code = f"""<?php
use App\Models\Client;
Client::truncate();
$logos = {repr(db_entries)};
foreach ($logos as $idx => $logo) {{
    Client::create([
        'name' => 'Client ' . ($idx + 1),
        'logo' => $logo,
        'website_url' => '#',
        'order' => $idx + 1,
        'is_active' => true
    ]);
}}
"""

with open("scratch_seed_clients.php", "w") as f:
    f.write(php_code)

print("PHP Seeder script generated.")
