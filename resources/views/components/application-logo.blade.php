@php
    $logoPath = public_path('images/logo.png');
    if (file_exists($logoPath)) {
        clearstatcache(true, $logoPath);
        $logoVersion = filemtime($logoPath);
    } else {
        $logoVersion = '1.0';
    }
@endphp
<img src="{{ asset('images/logo.png') }}?v={{ $logoVersion }}" {{ $attributes }}>

