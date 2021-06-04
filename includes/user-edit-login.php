<?php
include_once 'db.php';
editLogin($_POST['login']);
header("Location:/?route=edit");
?>