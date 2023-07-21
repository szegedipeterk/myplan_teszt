<?php

$request = explode("/", $_SERVER['REQUEST_URI']);
$imageId = $request[2];

if (!is_file("src/uploads/{$imageId}.jpg")) {
    echo "Image not found!";
    http_response_code(400);
} else {
    echo "<img class='uploaded-image' data-id='{$imageId}' data-bw='false' src='/src/uploads/{$imageId}.jpg' >";
}
