<main class="main">
    <section class="head">
        <h2 class="head__title">Таблица умножения</h2>
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
    <form action="" class="form" method="post">
        <label class="form__label">
            <span class="form__text">Количество колонок</span>
            <input type="text" class="form__input" name="col">
        </label>
        <label class="form__label">
            <span class="form__text">Количество строк</span>
            <input type="text" class="form__input" name="row">
        </label>
        <button class="form__btn">Отправить</button>
    </form>
    <?php
$col = isset($_POST['col'])?$_POST['col']:0;
$row = isset($_POST['row'])?$_POST['row']:0;
echo "<div class='table'>";
for ($i=1; $i <= $row; $i++) {
    echo "<div class='table__row'>";
    for ($j=1; $j <= $col; $j++) {
        $res = $i*$j;
        echo "<div class='table__col'>$res</div>";
    }
    echo "</div>";
}
echo "</div>";
            ?>
</main>