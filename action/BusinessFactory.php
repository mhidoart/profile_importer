<?php
include_once '../dao/Database.php';

include_once '../controller/MainController.php';

function open($dataSource, $username, $password)
{
    global $service;
    global $db;
    $db = new Database($dataSource, $username, $password);
    // $accountDao = new AccountDao($db);
    // $chatRoomDao = new ChatRoomDao($db);

    $service = new MainController($db);

    return $service;
}
open('profile_importer', 'root', '');
//open('assabban_tf', 'assabban_xana', '@Edf6c19a25');
