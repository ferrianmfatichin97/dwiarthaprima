<?php

$link = __DIR__ . '/public/storage';

if (is_link($link) || is_dir($link)) {
    echo "Deleting existing storage link/directory...\n";
    if (PHP_OS_FAMILY === 'Windows') {
        exec("rmdir /s /q \"$link\"");
    } else {
        exec("rm -rf \"$link\"");
    }
}

echo "Running php artisan storage:link...\n";
exec("php artisan storage:link", $output);
echo implode("\n", $output) . "\n";

echo "Done.\n";
