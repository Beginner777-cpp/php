
        <main class="main">
            <section class="head">
                <h2 class="head__title">Контакты</h2>
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
            <secrion class="body">
                <h2 class="body__title">Адрес</h2>
                <p class="body__desc">г.Ташкент Метро Чиланзар, проспект Бунёдкор, дом 41</p>
            </secrion>
            <iframe class="map" src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d11996.05377272948!2d69.2000941!3d41.2650432!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x82d1d0a1630a1413!2zUFJPV0VCINCj0KfQldCR0J3Qq9CZINCm0JXQndCi0KAg0JIg0KLQkNCo0JrQldCd0KLQlQ!5e0!3m2!1sru!2s!4v1583230803859!5m2!1sru!2s" allowfullscreen=""></iframe>
        </main>
    </div>

    <script src="/js/script.js"></script>
</body>

</html>