<main class="main">
    <section class="head">
        <h2 class="head__title">Регистрация в системе</h2>
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

    <form action="includes/user-reg.php" class="form" method="post" enctype="multipart/form-data">
        <label class="form__label">
            <span class="form__text">Логин</span>
            <input type="text" class="form__input" name="login" autocomplete="off">
        </label>
        <label class="form__label">
            <span class="form__text">Имя</span>
            <input type="text" class="form__input" name="name" autocomplete="off">
        </label>
        <label class="form__label">
            <span class="form__text">Пароль</span>
            <input type="password" class="form__input" name="pass">
            <button type="button" class="form__eye"><i class="far fa-eye-slash"></i></button>
        </label>
        <label class="form__label">
            <span class="form__text">Повторите пароль</span>
            <input type="password" class="form__input" name="confirmpass">
            <button type="button" class="form__eye"><i class="far fa-eye-slash"></i></button>
        </label>
        <span class="form__error">* Пароли не совподают</span>
        <p class="form_photo"><input type="file" name="photo" accept="image/jpeg,image/png,image/gif"></p>
        <button class="form__btn" disabled>Зарегистрироваться</button>
    </form>
</main>