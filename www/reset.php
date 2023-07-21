<?php

$path = __DIR__ . '/src/uploads/';
$files = scandir($path);
$files = array_diff(scandir($path), array('.', '..'));

foreach ($files as $file) {
    try {
        unlink($path . $file);
    } catch (Exception $exception) {
        var_dump($exception);
        die;
    }
}
