<main>
    <nav class="nav">
        <ul class="nav__list container">
            <?php foreach ($categories as $category ) :?>
                <li class="nav__item">
                    <a href="all-lots.html"><?= $category['name'] ?></a>
                </li>
            <?php endforeach;?>
        </ul>
    </nav>
    <section class="rates container">
        <h2>Мои ставки</h2>
        <?php var_dump($_COOKIE['bets'])?>>
        <table class="rates__list">
            <tr class="rates__item rates__item--win">  <!-- item win - ставка выйграла... rates__item--end - торги окончены -->
                <td class="rates__info">
                    <div class="rates__img">
                        <img src="<?= 'null' ?>" width="54" height="40" alt="Сноуборд">
                    </div>
                    <h3 class="rates__title"><a href="lot.html"><?= 'null' ?></a></h3>
                </td>
                <td class="rates__category">
                    <?= 'null' ?>
                </td>
                <td class="rates__timer">
                    <div class="timer timer--finishing timer--win">07:13:34</div> <!-- timer--win - ставка выйграла.... timer--end - торги окончены -->
                </td>
                <td class="rates__price">
                    <?= 'null' ?> р
                </td>
                <td class="rates__time">
                    <?= 'null' ?>
                </td>
            </tr>
        </table>
    </section>
</main>