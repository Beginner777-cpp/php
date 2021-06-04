<?php
include_once 'db.php';
$result = editComment($_GET['id'], $_GET['text'], $_GET['date']);
if ($result) {
    header('Location:/?route=guest');
}
?>