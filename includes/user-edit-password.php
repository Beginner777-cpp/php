<?php
include_once 'db.php';
editPassword($_POST['password']);
header("Location:/?route=edit");
?>