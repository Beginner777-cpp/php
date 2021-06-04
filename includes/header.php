<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Главная</title>
    <link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style/all.css">
    <link rel="stylesheet" href="style/style.css">
</head>

<body>
    <div class="wrap">
        <header class="header">
            <a href="/" class="logo">Creator: Abdigafurov Husan</a>
            <?php
            if (!$_SESSION['id']):
            ?>   
            <div class="singIn">
                <a href="/?route=login" class="singIn__link">Вход</a>
                <a href="/?route=registration" class="singIn__link">Регистрация</a>
            </div>
            <?php
            else: ?>
            <div class="user">
                <div class="user__profile">
                    <img src="<?=$userInfo['img_path']?>" alt="" class="user__profile-img">
                    <h4 class="user__profile-name"><?=$userInfo['name']?></h4>
                </div>
                <ul class="user__menu">
                    <li><a href="/?route=edit" class="user__menu-link"><i class="fal fa-cog"></i></i>Настройки</a></li>
                    <li><a href="includes/user-out.php" class="user__menu-link"><i class="far fa-external-link"></i>Выход</a></li>
                </ul>
            </div>
            <?php endif;?>
        </header>