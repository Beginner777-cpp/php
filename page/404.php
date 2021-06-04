<main class="main">
    <?php
            date_default_timezone_set('Asia/Tashkent');
            $ru_months = array( 'Январь', 'Февраль', 'Март', 'Апрель', 'Май', 'Июнь', 'Июль', 'Август', 'Сентябрь', 'Октябрь', 'Ноябрь', 'Декабрь' );

            $day = date('d');
            $month = date('n');
            $month = $ru_months[$month-1];
            $year = date('Y');
        ?>

    <p class="head__date">Сегодня <?= $day ?> <?= $month ?> <?= $year ?> год</p>
    <h1>Ошибка 404 / страница не найдена</h1>
</main>