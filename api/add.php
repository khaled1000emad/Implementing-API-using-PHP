<?php
include_once('../config/Database.php');
include_once('../models/Posts.php');

header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods, Authorization, X-Requested-With');



$database = new Database();
$db = $database->connect();
$postObj = new Posts($db);

$data = json_decode(file_get_contents('php://input'));

$pname = $data->postName;
$ptext = $data->postText;

if($postObj->add($pname, $ptext)){
    echo json_encode(array('messge' => "Post Added Succefully"));
}
else{
    echo json_encode(array('message'=>'Post Not Created'));
}



?>