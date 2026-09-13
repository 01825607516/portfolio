 <?php

ini_set('display_errors', 1);
error_reporting(E_ALL);

 
require __DIR__ . '/../vendor/autoload.php';

// ২. /tmp ফোল্ডারের অধীনে প্রয়োজনীয় ডিরেক্টরি তৈরি করুন
$dirs = [
    '/tmp/storage/bootstrap/cache',
    '/tmp/storage/framework/views',
    '/tmp/storage/framework/sessions',
    '/tmp/storage/framework/cache/data',
];

foreach ($dirs as $dir) {
    if (!file_exists($dir)) {
        mkdir($dir, 0777, true);
    }
}

// ৩. Environment settings
putenv('APP_STORAGE_PATH=/tmp/storage');
putenv('APP_CONFIG_CACHE=/tmp/storage/bootstrap/cache/config.php');
putenv('APP_SERVICES_CACHE=/tmp/storage/bootstrap/cache/services.php');
putenv('APP_PACKAGES_CACHE=/tmp/storage/bootstrap/cache/packages.php');
putenv('APP_ROUTES_CACHE=/tmp/storage/bootstrap/cache/routes.php');
putenv('VIEW_COMPILED_PATH=/tmp/storage/framework/views');

$_ENV['APP_STORAGE_PATH'] = '/tmp/storage';

// ৪. Laravel App Bootstrap করা
$app = require_once __DIR__ . '/../bootstrap/app.php';

// storagePath /tmp ফোল্ডারে নির্দেশ করা
$app->useStoragePath('/tmp/storage');

// ৫. Request হ্যান্ডেল করা
$kernel = $app->make(Illuminate\Contracts\Http\Kernel::class);

$response = $kernel->handle(
    $request = Illuminate\Http\Request::capture()
);

$response->send();

$kernel->terminate($request, $response);