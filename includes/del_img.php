<?php
include_once 'db.php';
$result = delPhoto($_GET['del']);

if($result){
    unlink('../'.$result['img_path']);
    header('Location:/?route=edit');
}
else{
    header('Location:/?route=edit&error=del');
}
?>