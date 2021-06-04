<?php
include_once 'db.php';
$photos = $_FILES["edit_photo"];
// var_dump($photo);
foreach ($photos['name'] as $key=>$name) {
    // var_dump($name);
    $rand_name = md5(time())."_$key";
    $photo_ext = '.'.pathinfo($name, PATHINFO_EXTENSION);
    $photo_name = !empty($photos)? userInfo()['login'].'-'.$rand_name . $photo_ext:'default.jpg';
    $dir_name = "img/users/$photo_name";
    $result = userAddPhoto($dir_name);
    // var_dump($result);
    
    if ($result) {
        if (!is_dir("../img/users")) {
            mkdir("../img/users");
        }
        move_uploaded_file($photos["tmp_name"][$key], "../$dir_name");
    }
    header("Location:/?route=edit");
}
?>
