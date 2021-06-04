<?php
include_once 'includes/functions.php';
if (!file_exists("page/$route.php")) {
    $route = 404;
}
include_once 'includes/header.php';
include_once 'includes/aside.php';
include_once "page/$route.php";
include_once 'includes/footer.php';
?>
