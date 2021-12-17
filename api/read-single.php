<?php
include_once('../Config/Database.php');
include_once('../Models/Posts.php');
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');

 if(isset($_GET['id'])){
    $id = $_GET['id'];
 }
 


 


$database = new Database();
$db = $database->connect();

$post = new Posts($db);

$result = $post->readSingle($id);

$singlePost = $result->fetch(PDO::FETCH_ASSOC);


$postItem = array(
     'id' => $singlePost['id'],
    'Post Name' => $singlePost['post_name'],
   'Post Text' => $singlePost['post_text']
 );

 echo json_encode($postItem);




?>