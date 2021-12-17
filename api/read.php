<?php

header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');

include_once('../Models/Posts.php');
include_once('../Config/Database.php');

$database = new Database();
$db = $database->connect();

$post = new Posts($db);
$result = $post->read();

$postsArray = array();

foreach($result->fetchAll(PDO::FETCH_ASSOC) as $res){
    $postItem = array(
        'id' => $res['id'],
        'Post Name' => $res['post_name'],
        'Post Text' => $res['post_text']
    );
    array_push($postsArray, $postItem);
}

echo json_encode($postsArray);








?>