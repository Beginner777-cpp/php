<?php
include_once 'db.php';
session_start();
date_default_timezone_set('Asia/Tashkent');
if ($_SESSION['id']) {
    addGuest($_SESSION['id'], $_POST['name'], $_POST['descr'], date('H:i d.m.y'));
} else {
    addGuest(0, $_POST['name'], $_POST['descr'], date('H:i d.m.y'));
}
header('Location:/?route=guest');
?>
