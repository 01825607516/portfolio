 <?php

// ১. /tmp ফোল্ডারের অধীনে প্রয়োজনীয় ডিরেক্টরিগুলো তৈরি করুন
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

// ২. এনভায়রনমেন্ট ভেরিয়েবল সেট করুন
putenv('APP_STORAGE_PATH=/tmp/storage');
putenv('APP_CONFIG_CACHE=/tmp/storage/bootstrap/cache/config.php');
putenv('APP_SERVICES_CACHE=/tmp/storage/bootstrap/cache/services.php');
putenv('APP_PACKAGES_CACHE=/tmp/storage/bootstrap/cache/packages.php');
putenv('APP_ROUTES_CACHE=/tmp/storage/bootstrap/cache/routes.php');
putenv('VIEW_COMPILED_PATH=/tmp/storage/framework/views');

$_ENV['APP_STORAGE_PATH'] = '/tmp/storage';

// ৩. Laravel Application ইনিশিয়ালাইজ করার পর Dynamic Storage Path সেট করুন
$app = require_once __DIR__ . '/../bootstrap/app.php';

// Laravel-এর storagePath পয়েন্টারটি /tmp/storage-এ রিডাইরেক্ট করা
$app->useStoragePath('/tmp/storage');

// ৪. রিকোয়েস্ট হ্যান্ডেল করুন
$kernel = $app->make(Illuminate\Contracts\Http\Kernel::class);

$response = $kernel->handle(
    $request = Illuminate\Http\Request::capture()
);

$response->send();

$kernel->terminate($request, $response);