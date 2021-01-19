<?php
include_once '../action/BusinessFactory.php';


$fname = addslashes($_POST["fname"]);
$lname = addslashes($_POST["lname"]);
$num = addslashes($_POST["num"]);
$email = addslashes($_POST["email"]);
$comment = addslashes($_POST["comment"]);

$target_dir = "./uploads/";
// uploads folder
$newName = uniqid() . "_" . basename($_FILES["imageUploader"]["name"]);
$target_file = $target_dir . $newName;

$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));



// Check if file already exists
if (file_exists($target_file)) {
    echo "Sorry, file already exists.";
    $uploadOk = 0;
}

// Check file size
if ($_FILES["imageUploader"]["size"] > 10000000) { // 10 Mo
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
}


// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
    // if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["imageUploader"]["tmp_name"], $target_file)) {
        //echo $req;
        //echo "The file " . htmlspecialchars(basename($_FILES["imageUploader"]["name"])) . " has been uploaded.";
        $service->apply_for_job($fname, $lname, $num, $email, $newName, $comment);
        header("Location: ../success_apply.php?email=" . $email);
        exit();
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}
