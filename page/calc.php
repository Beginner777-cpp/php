
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
                    <span class="form__text">Число 1</span>
                    <input type="text" class="form__input" name="one" data-type="number">
                </label>
                <div class="form__mySelect">
                    <div class="form__select">
                        <div class="form__select-name">Выбирите знак</div>
                        <div class="form__select-option">
                            
                        </div>
                    </div>
                    <select name="symbol">
                        <option value="+">+</option>
                        <option value="-">-</option>
                        <option value="*">*</option>
                        <option value="/">/</option>
                    </select>
                </div>
                <label class="form__label">
                    <span class="form__text">Число 2</span>
                    <input type="text" class="form__input" name="two" data-type="number"> 
                </label>
                <button class="form__btn">Посчитать</button>
            </form>
            <?php
$one = $_POST['one'];
$two = $_POST['two'];
$symbol = $_POST['symbol'];
$result = $one;
switch ($symbol) {
    case '+':
        $result = $one + $two;
        break;
    case '-':
        $result = $one - $two;
        break;
    case '*':
        $result = $one * $two;
        break;
    case '/':
        $result = $one / $two;
        break;
    default:
}
echo "<h2 class='head__title calc_res'>Результат: $result</h2>";
            ?>
        </main>