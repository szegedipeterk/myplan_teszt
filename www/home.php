<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Awesome project</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="src/css/style.css">
</head>
<body>
<div class="container">
   <div class="loader"></div>

    <div class="d-flex justify-content-center my-5">
        <h1>Awesome B&W project</h1>
    </div>
    <form class="form-row" id="file-upload-form" action="#" method="post" enctype="multipart/upload">
        <div class="form-group col-md-12">
            <input type="file" class="btn btn-success btn-lg btn-block" id="image-input" name="image" accept=".jpg">
        </div>

        <div class="form-group col-md-6">
            <button id="submit-button" type="submit" class="btn btn-primary btn-block">Upload</button>
        </div>
        <div class="form-group col-md-6">
            <button id="reset" class="btn btn-warning btn-block">Reset</button>
        </div>
    </form>

    <div id="image-container" class="row">
    </div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="src/js/app.js"></script>

</body>
</html>