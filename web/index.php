<?php

use components\DB;
use components\DbCache;
use components\FileListWithCache;

spl_autoload_register(function($class) {
    include __DIR__ . '/../' . str_replace('\\', '/', $class) . '.php';
});

$config = require __DIR__ . '/../config/config.php';
DB::setConfig($config['db']);

$list = new FileListWithCache(
    $_SERVER['DOCUMENT_ROOT'],
    new DbCache(DB::getInstance())
);

if ($_GET['action'] === 'flush') {
    $list->flushCache();
}

$files = $list->get();
require __DIR__ . '/../views/index.php';
