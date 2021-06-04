<?php
include_once 'db.php';
editName($_POST['name']);
header("Location:/?route=edit");
?>