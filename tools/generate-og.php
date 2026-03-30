<?php

declare(strict_types=1);

// Generate a simple 1200x630 Open Graph image using the existing logo.
// Usage: php tools/generate-og.php

$root = dirname(__DIR__);
$logoPath = $root . DIRECTORY_SEPARATOR . 'public' . DIRECTORY_SEPARATOR . 'dap.png';
$outPath = $root . DIRECTORY_SEPARATOR . 'public' . DIRECTORY_SEPARATOR . 'og.png';

if (!file_exists($logoPath)) {
    fwrite(STDERR, "Logo not found at: {$logoPath}\n");
    exit(1);
}

$canvasWidth = 1200;
$canvasHeight = 630;
$canvas = imagecreatetruecolor($canvasWidth, $canvasHeight);
imagealphablending($canvas, true);
imagesavealpha($canvas, true);

// Background (deep navy)
$bg = imagecolorallocate($canvas, 11, 18, 32);
imagefilledrectangle($canvas, 0, 0, $canvasWidth, $canvasHeight, $bg);

// Subtle diagonal highlight
for ($i = 0; $i < $canvasWidth + $canvasHeight; $i += 2) {
    $alpha = (int) max(0, min(60, 60 - abs(($i - 650) / 12)));
    $c = imagecolorallocatealpha($canvas, 255, 255, 255, 127 - $alpha);
    imageline($canvas, $i, 0, $i - $canvasHeight, $canvasHeight, $c);
}

// Load logo and scale to fit.
$logo = imagecreatefrompng($logoPath);
if ($logo === false) {
    fwrite(STDERR, "Failed to read PNG: {$logoPath}\n");
    exit(1);
}

$logoW = imagesx($logo);
$logoH = imagesy($logo);
$maxW = 760;
$maxH = 420;
$scale = min($maxW / $logoW, $maxH / $logoH, 1.0);
$dstW = (int) round($logoW * $scale);
$dstH = (int) round($logoH * $scale);

$dstX = (int) round(($canvasWidth - $dstW) / 2);
$dstY = (int) round(($canvasHeight - $dstH) / 2);

imagecopyresampled($canvas, $logo, $dstX, $dstY, 0, 0, $dstW, $dstH, $logoW, $logoH);

imagepng($canvas, $outPath, 9);

imagedestroy($logo);
imagedestroy($canvas);

fwrite(STDOUT, "Generated: {$outPath}\n");

