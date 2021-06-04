<main class="main">
            <section class="head">
                <h2 class="head__title"><?=$userInfo['name']?></h2>
                <?php
            date_default_timezone_set('Asia/Tashkent');
            $ru_months = array( 'Январь', 'Февраль', 'Март', 'Апрель', 'Май', 'Июнь', 'Июль', 'Август', 'Сентябрь', 'Октябрь', 'Ноябрь', 'Декабрь' );

            $day = date('d');
            $month = date('n');
            $month = $ru_months[$month-1];
            $year = date('Y');
        ?>

        <p class="head__date">Сегодня <?= $day ?> <?= $month ?> <?= $year ?> год</p>
        </section>
        <img class="edit_img" src="<?=$userInfo['img_path']?>" alt="">

        <form action="includes/user-edit-name.php" class="form edit_form" method="post">
            <fieldset>
                <legend class="edit_legend">Изменить имя</legend>
                <label class="form__label">
                    <span class="form__text">Введите имя</span>
                    <input type="text" class="form__input" name="name" autocomplete="off" required>
                </label>
                <button class="form__btn">Изменить</button>
            </fieldset>
                
        </form>
        <form action="includes/user-edit-login.php" class="form edit_form" method="post">
            <fieldset>
                <legend class="edit_legend">Изменить логин</legend>
                <label class="form__label">
                    <span class="form__text">Введите логин</span>
                    <input type="text" class="form__input" name="login" autocomplete="off" required>
                </label>
                <button class="form__btn">Изменить</button>
            </fieldset>
                
        </form>
        <form action="includes/user-edit-password.php" class="form edit_form" method="post">
            <fieldset>
                <legend class="edit_legend">Изменить пароль</legend>
                <label class="form__label">
                    <label class="form__label">
                        <span class="form__text">Пароль</span>
                        <input type="password" class="form__input" name="password" required>
                        <button type="button" class="form__eye"><i class="far fa-eye-slash"></i></button>
                    </label>
                </label>
                <button class="form__btn">Изменить</button>
            </fieldset>
                
        </form>
        <form action="includes/user-edit-photo.php" class="form edit_form" method="post"  enctype="multipart/form-data">
            <fieldset>
                <legend class="edit_legend">Изменить фотографию</legend>
                <input type="file" name="edit_photo[]" multiple accept="image/jpeg,image/png,image/gif" required>
                <button class="form__btn">Изменить</button>
            </fieldset>
                
        </form>
        <?php
        if ($_GET['error']=='del') {
            echo '<p>Нельзя удалять аву </p>';
        }
        ?>
        <form class="form_select_photo" action="" method="post">
        <?php
        $allPhotos = getPhotos();
        
        foreach ($allPhotos as $key=>$value):
        ?>
        <label for="">
            <img class="img_select" src="<?=$value['img_path']?>" alt="">
            <a href="includes/del_img.php/?del=<?=$value['img_id']?>" class="img_del">
            <i class="fas fa-trash"></i>
            </a>
        </label>
        
        <?php
        endforeach;
        ?>
        </form>


</main>