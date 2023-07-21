<?php
const MAX_IMAGE_WIDTH = 500; //px

if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_FILES["image"])) {
    $targetDir = "src/uploads/";
    $fileName = time();

    $targetFile = $targetDir . $fileName . '.jpg';

    $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

    if (!is_dir($targetDir)) {
        mkdir($targetDir);
    }

    if ($imageFileType !== "jpg") {
        http_response_code(400);
        echo "only jpg";
        exit;
    }

    uploadImage($_FILES["image"]["tmp_name"], $targetDir, $targetFile, $fileName);

}

function uploadImage($tmp, $dir, $file, $fileName)
{
    try {
        $image = new Imagick($tmp);
        $width = $image->getImageWidth();
        if ($width > MAX_IMAGE_WIDTH) {
            $height = $image->getImageHeight();
            $newHeight = ($height / $width) * MAX_IMAGE_WIDTH;
            $image->resizeImage(MAX_IMAGE_WIDTH, $newHeight, Imagick::FILTER_LANCZOS, 1);
            $image->writeImage($file);
        }

        createBWImage($dir, $fileName . '.jpg');

        http_response_code(200);
        echo $fileName;
    } catch (Exception $exception) {
        echo "404. error while uploading file!";
        die;
    }
}

function createBWImage($path, $fileName)
{
    try {
        $bwImage = new Imagick($path . $fileName);
        $bwImage->transformImageColorspace(Imagick::COLORSPACE_GRAY);
        $bwImage->writeImage($path . "bw_" . $fileName);
        $bwImage->destroy();
    } catch (ImagickException $e) {
        echo "Error while creating bw image " . $e->getMessage();
        die;
    }
}