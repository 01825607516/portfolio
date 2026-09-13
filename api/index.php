 <?php

// ১. লেটেস্ট এরর ট্র্যাকিং
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// ২. অটোলোড ফাইল কানেক্ট
require __DIR__ . '/../vendor/autoload.php';

// ৩. Vercel Temp Storage তৈরি (স্টোরেজ ইস্যু এড়াতে)
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

// ৪. এনভায়রনমেন্ট পাথ সেটআপ
putenv('APP_ENV=production');
putenv('APP_DEBUG=true');
putenv('APP_KEY=base64:8XF7tn4kB/cCV4IH+2NHOFblswou0uKQ49Whz13IVJk=');
putenv('APP_STORAGE_PATH=/tmp/storage');
putenv('VIEW_COMPILED_PATH=/tmp/storage/framework/views');

// ৫. অ্যাপ্লিকেশন ইনস্ট্যান্স তৈরি
$app = require_once __DIR__ . '/../bootstrap/app.php';
$app->useStoragePath('/tmp/storage');

// ৬. রিকোয়েস্ট প্রসেসিং ও আউটপুট ডেলিভারি
$kernel = $app->make(Illuminate\Contracts\Http\Kernel::class);

$request = Illuminate\Http\Request::capture();
$response = $kernel->handle($request);

// রেসপন্স হেডার পাঠাল
foreach ($response->headers->allPreserveCaseWithoutCookies() as $name => $values) {
    foreach ($values as $value) {
        header($name . ': ' . $value, false);
    }
}

// কুকি হ্যান্ডলিং
foreach ($response->headers->getCookies() as $cookie) {
    header('Set-Cookie: ' . $cookie->asString(), false);
}

// এইচটিটিপি স্ট্যাটাস কোড সেট করা
http_response_code($response->getStatusCode());

// সরাসরি বডি প্রিন্ট করা (Blank page বন্ধ করার মূল ট্রিক)
echo $response->getContent();

$kernel->terminate($request, $response);