<?php

require __DIR__ . '/../vendor/autoload.php';
$app = require_once __DIR__ . '/../bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Http\Kernel::class);
$kernel->handle(Illuminate\Http\Request::capture());

use App\Models\PageSetting;
use Illuminate\Support\Facades\Storage;

$keys = ['contact_image', 'contact_hero_image', 'contact_hero_video'];

echo "Generated URLs for Contact Page:\n";
foreach ($keys as $key) {
    $setting = PageSetting::where('page', 'contact')->where('key', $key)->first();
    if ($setting) {
        echo "- $key:\n";
        echo "  Value in DB: " . $setting->value . "\n";
        echo "  Generated URL: " . Storage::url($setting->value) . "\n";
    }
}

echo "\nApp Configuration:\n";
echo "- APP_URL: " . config('app.url') . "\n";
echo "- Filesystem Disk: " . config('filesystems.default') . "\n";
echo "- Public Disk Root: " . config('filesystems.disks.public.root') . "\n";
