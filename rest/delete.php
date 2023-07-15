<?php
$requestMethod = $_SERVER["REQUEST_METHOD"];
include('api/Rest.php');
$api = new Rest();
switch($requestMethod) {
    case 'GET':
        $kndId = '';
        if($_GET['id']) {
            $kndId = $_GET['id'];
        }
        $api->deleteToko($kndId);
        break;
    default:
        header("HTTP/1.0 405 Method Not Allowed");
    break;
}
?>