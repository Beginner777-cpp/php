<?php
include_once 'db.php';
$userAuth = userAuth($_POST['login'], $_POST['pass']);
if ($userAuth) {
    // var_dump($_SESSION['id']);
    header('Location:/');
} else {
    header('Location:/?route=login&error=1');
}
?>