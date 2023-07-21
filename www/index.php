<?php

$request_uri = $_SERVER['REQUEST_URI'];

$pattern_bw = '#^/img/(\d+)/bw$#';
$pattern = '#^/img/(\d+)$#';

if (preg_match($pattern_bw, $request_uri, $matches)) {
    require __DIR__ . '/bwimage.php';
} elseif (preg_match($pattern, $request_uri, $matches)) {
    require __DIR__ . '/image.php';
} elseif ($request_uri == '/') {
    require __DIR__ . '/reset.php';

    require __DIR__ . '/home.php';
} else {
    echo '404';
    die;
}



