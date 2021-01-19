<?php
include_once '../action/BusinessFactory.php';
header('Content-type: application/json');
header('Access-Control-Allow-Origin: *');
$id = addslashes($_REQUEST["id"]);
$res = $service->archieve_offre($id);
echo json_encode("OK");
