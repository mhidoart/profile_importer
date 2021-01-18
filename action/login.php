<?php
include_once '../action/BusinessFactory.php';


$email = addslashes($_POST["email"]);
$pass = addslashes($_POST["pass"]);
$res = $service->login($email, $pass);
echo $res;

if ($res == 1) {
    header("Location: ../profile_lists.php");
    exit();
}
