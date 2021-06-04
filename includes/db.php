<?php
function db()
{
    $dbname = 'id16121922_php_project777';
    $dbuser = 'id16121922_admin';
    $dbpass = 'He#/z(2#6,a\P5/';
    $dbhost = 'localhost';
    return new PDO("mysql:host=$dbhost;dbname=$dbname", $dbuser, $dbpass);
}

function userReg($login, $pass, $name, $photo)
{
    $login = strip_tags($login);
    $name = strip_tags($name);
    $pass = password_hash($pass, CRYPT_BLOWFISH);

    $db = db();
    $query = "INSERT INTO users (name, login, password) VALUE(?,?,?)";
    $create = $db->prepare($query);
    $result = $create->execute([$name, $login, $pass]);

    if ($result) {
        $userId = $db->lastInsertId();
        $imgQ = "INSERT INTO images (user_id, img_path, img_select) VALUE(?,?,?)";
        $imgP = $db->prepare($imgQ);
        $imgR = $imgP->execute([$userId, $photo, 1]);
    }
    return $result;
}

function userAuth($login, $password)
{
    $db = db();
    $query = "SELECT * FROM users INNER JOIN images using(user_id) WHERE login=?";
    $select = $db->prepare($query);
    $select->execute([$login]);
    $users = $select->fetch(PDO::FETCH_ASSOC);
    if ($users) {
        if (password_verify($password, $users['password'])) {
            session_start();
            $_SESSION['id'] = $users['user_id'];
            return true;
        }
    }
    return false;
}
function userInfo()
{
    session_start();
    $db = db();
    $query = "SELECT login, name, img_path from users INNER JOIN images using(user_id) WHERE user_id=?";
    $select = $db->prepare($query);
    $select->execute([$_SESSION["id"]]);
    $result = $select->fetch(PDO::FETCH_ASSOC);
    return $result;
}

function editName($name)
{
    session_start();
    $db = db();
    $query = "UPDATE users SET name=? WHERE user_id=?";
    $update = $db->prepare($query);
    $result = $update->execute([$name,$_SESSION['id']]);
    return $result;
}
function editLogin($login)
{
    session_start();
    $db = db();
    $query = "UPDATE users SET login=? WHERE user_id=?";
    $update = $db->prepare($query);
    $result = $update->execute([$login,$_SESSION['id']]);
    return $result;
}
function editPassword($password)
{
    $password = password_hash($password, CRYPT_BLOWFISH);
    session_start();
    $db = db();
    $query = "UPDATE users SET password=? WHERE user_id=?";
    $update = $db->prepare($query);
    $result = $update->execute([$password,$_SESSION['id']]);
    return $result;
}
function editPhoto($photo)
{
    session_start();
    $db = db();
    $query = "UPDATE images SET img_path=? WHERE user_id=?";
    $update = $db->prepare($query);
    $result = $update->execute([$photo,$_SESSION['id']]);
    return $result;
}
function userAddPhoto($path)
{
    session_start();
    $db = db();
    $query = "INSERT INTO images (user_id, img_path, img_select) VALUE(?,?,?)";
    $insert = $db->prepare($query);
    $result = $insert->execute([$_SESSION['id'],$path, 0]);
    return $result;
}

function getPhotos()
{
    session_start();
    $db = db();
    $query = "SELECT * FROM images WHERE user_id=?";
    $select = $db->prepare($query);
    $select->execute([$_SESSION['id']]);
    $result = $select->fetchAll(PDO::FETCH_ASSOC);
    return $result;
}
function delPhoto($img_id)
{
    $db = db();
    $query = "SELECT * FROM images where img_id = ?";
    $select = $db->prepare($query);
    $select->execute([$img_id]);
    $result = $select->fetch(PDO::FETCH_ASSOC);
    if ($result['img_select']!=1) {
        $query = "DELETE from images where img_id=? and img_select=?";
        $delete = $db->prepare($query);
        $delete->execute([$img_id, 0]);
        return $result;
    } else {
        return false;
    }
}

function addGuest($id, $name, $text, $date)
{
    $db =db();
    $query = "INSERT INTO guest (user_id, guest_name, guest_text, guest_date) VALUE (?,?,?,?)";
    $insert = $db->prepare($query);
    $result = $insert->execute([$id, $name,$text,$date]);
    $result;
}

function selectGuest()
{
    $db = db();
    $query = "SELECT * FROM guest";
    $select = $db->prepare($query);
    $select->execute();
    $result = $select->fetchAll(PDO::FETCH_ASSOC);
    return $result;
}
function getSelectedPhoto($id)
{
    $db = db();
    $query = "SELECT * FROM images WHERE user_id=? and img_select=?";
    $select = $db->prepare($query);
    $select->execute([$id, 1]);
    $result = $select->fetch(PDO::FETCH_ASSOC);
    return $result;
}

function delComment($id)
{
    $db = db();
    $query = "DELETE FROM guest WHERE guest_id=?";
    $delete = $db->prepare($query);
    $delete->execute([$id]);
}

function editComment($id, $text, $date)
{
    session_start();
    $db = db();
    $query = "UPDATE guest SET guest_text=?, guest_date=? WHERE guest_id=?";
    $update = $db->prepare($query);
    $result = $update->execute([$text, $date, $id]);
    return $result;
}
?>