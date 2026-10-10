<?php

use CodeIgniter\Boot;
use Config\Paths;

$minPhpVersion = '8.2';
if (version_compare(PHP_VERSION, $minPhpVersion, '<')) {
    http_response_code(503);
    echo "PHP {$minPhpVersion} or newer is required.";
    exit(1);
}

$publicDirectory = dirname(__DIR__) . DIRECTORY_SEPARATOR . 'public' . DIRECTORY_SEPARATOR;
define('FCPATH', $publicDirectory);
chdir($publicDirectory);

if (! getenv('app.baseURL') && getenv('VERCEL_URL')) {
    putenv('app.baseURL=https://' . getenv('VERCEL_URL') . '/');
}
putenv('app.indexPage=');

require dirname(__DIR__) . '/app/Config/Paths.php';

$paths = new Paths();
$paths->writableDirectory = sys_get_temp_dir() . DIRECTORY_SEPARATOR . 'codeigniter-writable';

foreach (['cache', 'debugbar', 'logs', 'session', 'uploads'] as $directory) {
    $path = $paths->writableDirectory . DIRECTORY_SEPARATOR . $directory;
    if (! is_dir($path)) {
        mkdir($path, 0775, true);
    }
}

require $paths->systemDirectory . '/Boot.php';

exit(Boot::bootWeb($paths));
