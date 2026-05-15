<?php

use App\Models\PageSetting;

require __DIR__ . '/../vendor/autoload.php';
$app = require_once __DIR__ . '/../bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Http\Kernel::class);
$kernel->handle(Illuminate\Http\Request::capture());

$settings = PageSetting::where('page', 'contact')->get();

echo "Stored Paths for Contact Page:\n";
foreach ($settings as $s) {
    echo "- {$s->key}: {$s->value}\n";
    if (strpos($s->key, 'image') !== false || strpos($s->key, 'video') !== false) {
        $exists = Storage::disk('public')->exists($s->value);
        echo "  Exists in Public Disk: " . ($exists ? 'YES' : 'NO') . "\n";
        echo "  Full Path: " . storage_path('app/public/' . $s->value) . "\n";
    }
}
