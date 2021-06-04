<?php
include_once 'db.php';
$photo = $_FILES["photo"];
$rand_name = md5(time());

$photo_ext = '.'.pathinfo($photo['name'], PATHINFO_EXTENSION);
$photo_name = !empty($photo)? $_POST['login'].'-'.$rand_name . $photo_ext:'default.jpg';

$dir_name = "img/users/$photo_name";

$userReg = userReg($_POST['login'], $_POST['pass'], $_POST['name'], $dir_name);

if ($photo and $userReg) {
    if (!is_dir("../img/users")) {
        mkdir("../img/users");
    }
    move_uploaded_file($photo["tmp_name"], "../$dir_name");
}
header("Location:/?route=login");
?>