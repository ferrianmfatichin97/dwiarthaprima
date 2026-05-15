<?php
require __DIR__ . '/../vendor/autoload.php';
$app = require_once __DIR__ . '/../bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

use App\Models\Service;
use Illuminate\Support\Str;

$services = Service::all();
foreach ($services as $s) {
    if (!$s->slug) {
        $s->slug = Str::slug($s->name);
        $s->save();
        echo "Fixed slug for: " . $s->name . "\n";
    }
}
echo "Done\n";
