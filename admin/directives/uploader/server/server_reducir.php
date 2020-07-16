<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: Authorization,Content-Type,Accept,Origin,User-Agent,DNT,Cache-Control,X-Mx-ReqToken,Keep-Alive,X-Requested-With,If-Modified-Since");
header('Access-Control-Allow-Methods: GET, POST, PUT');
//include_once 'class_sql.php';

//print_r($_POST);
$dir = filter_input(INPUT_POST, 'dir', FILTER_SANITIZE_SPECIAL_CHARS);
$target_dir = $dir;

//echo $target_dir;

if (!file_exists($target_dir)) {
    mkdir($target_dir, 0777, true);
}

$target_file = $target_dir . basename($_FILES["file"]["name"]);
//echo $target_file;
$uploadOk = 1;
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["file"]["tmp_name"]);
    if($check !== false) {
        echo "error -File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "error -File is not an image.";
        $uploadOk = 0;
    }
}
// Check if file already exists
if (file_exists($target_file)) {
    echo "error -Sorry, file already exists.";
    $uploadOk = 0;
}
// Check file size
if ($_FILES["fileToUpload"]["size"] > 5000000) {
    echo "error -Sorry, your file is too large.";
    $uploadOk = 0;
}
// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "mp4" && $imageFileType != "MP4"
&& $imageFileType != "gif" && $imageFileType != "JPG" && $imageFileType != "PNG" && $imageFileType != "GIF") {
    echo "error -Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "error -Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
        $origen = $target_file;
       // $destino = $target_dir ."articulo-". md5(basename($_FILES["file"]["name"])).".".$imageFileType;
        $destino = $target_dir ."articulo-". md5(basename($_FILES["file"]["name"])).".".$imageFileType;
            
            if (move_uploaded_file($_FILES["file"]["tmp_name"], $destino)) {
                echo "articulo-". md5(basename($_FILES["file"]["name"])).".".$imageFileType;
             } else {
                echo "error -Sorry, there was an error uploading your file.";
             }
        }



