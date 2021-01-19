<?php
include_once '../action/BusinessFactory.php';

$id = addslashes($_POST["id"]);
$title = addslashes($_POST["title"]);
$comment = addslashes($_POST["comment"]);
$file_uploaded = false;
if (file_exists($_FILES['doc']['tmp_name']) || is_uploaded_file($_FILES['doc']['tmp_name'])) {


    $target_dir = "./uploads/offre_upploads/";
    // uploads folder
    $newName = uniqid() . "_" . basename($_FILES["doc"]["name"]);
    $target_file = $target_dir . $newName;

    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));



    // Check if file already exists
    if (file_exists($target_file)) {
        echo "Sorry, file already exists.";
        $uploadOk = 0;
    }

    // Check file size
    if ($_FILES["doc"]["size"] > 10000000) { // 10 Mo
        echo "Sorry, your file is too large.";
        $uploadOk = 0;
    }


    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
        // if everything is ok, try to upload file
    } else {
        if (move_uploaded_file($_FILES["doc"]["tmp_name"], $target_file)) {
            //echo $req;
            //echo "The file " . htmlspecialchars(basename($_FILES["doc"]["name"])) . " has been uploaded.";
            $service->modify_offre($id, $title, $newName, $comment);
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }
} else {
    $service->modify_offre($id, $title, 'no_file', $comment);
}
header("Location: ../profile_lists.php");
exit();
