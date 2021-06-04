<aside class="menu">
    <div class="menu__reviews">
        <span class="menu__reviews_span" data-href="https://proweb.uz/">
            <i class="far fa-chevron-right"></i>
        </span>
        <span class="menu__reviews_text">Оставить озыв</span>
    </div>
    <ul class="menu__list">
        <?php
foreach ($arrayPages as $page => $info):
            ?>

        <li><a href="/?route=<?= $page ?>" class="menu__list-link <?= $page == $route ? 'active' : null; ?>"><i class="<?= $info['page_icon'] ?>"></i>
                <?= $info['page_title'] ?>
            </a></li>
        <?php endforeach;?>
    </ul>
</aside>