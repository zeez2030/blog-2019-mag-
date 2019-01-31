<?php
include '../classes/entry.php';

$entry = new Entry;

$author = $_POST['author'];
$title = $_POST['title'];
$content = $_POST['content'];

if (isset($author) && isset($title) && isset($content)) {
    $result = $entry->sqlInsertEntry($author, $title, $content);
    header('Location:../index.php');
}


?>