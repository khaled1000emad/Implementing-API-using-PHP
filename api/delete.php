<?php
include_once('../config/Database.php');
include_once('../models/Posts.php');

header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: DELETE');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods, Authorization, X-Requested-With');



$database = new Database();
$db = $database->connect();
$postObj = new Posts($db);


if(isset($_GET['name'])){
    $name = $_GET['name'];
}

if($postObj->delete($name)){
    echo json_encode(array('message' => 'Post Deleted'));
}
else{
    echo json_encode(array('message' => 'Post Not Deleted'));
}








?>