<main class="main">
    <section class="head">
        <h2 class="head__title">Слайдер</h2>
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
    <div class="slider">
        <div class="slider__line">
            <?php
$files = scandir('img');
array_splice($files, 0, 2);
array_splice($files, count($files)-1, 1);

for ($i=0; $i < count($files); $i++) {
    echo "<img src='../img/$files[$i]'/>";
}
                    ?>
        </div>
        <div class="slider__controls">
            <button class="slider__prev slider__btn"><i class="far fa-chevron-left"></i></button>
            <button class="slider__next slider__btn"><i class="far fa-chevron-right"></i></button>
        </div>
    </div>
</main>