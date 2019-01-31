<?php
include '../config/config.php';
include '../classes/database.php';
$id = $_GET['id'];
$db = new Database;
$comment = $_POST['comment'];
if ($comment) {
    $query = "INSERT INTO comments(post_id , content) VALUES
    (" . $id . ",'$comment');";
    $db->insert($query);

} else {

    header('Location:post.php?id=' . $id);

}