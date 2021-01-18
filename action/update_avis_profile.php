<?php
include_once '../action/BusinessFactory.php';
header('Content-type: application/json');
header('Access-Control-Allow-Origin: *');

$id = addslashes($_REQUEST["id"]);
$avis = addslashes($_REQUEST["avis"]);
$res = $service->update_avis($id, $avis);
echo json_encode($res);
