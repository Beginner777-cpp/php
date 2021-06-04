<?php
include_once 'db.php';
delComment($_GET['id']);
header('Location:/?route=guest');
?>
