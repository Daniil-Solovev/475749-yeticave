<main>
    <nav class="nav">
        <ul class="nav__list container">
            <?php foreach ($category as $value ) :?>
                <li class="nav__item">
                    <a href="all-lots.html"><?= $value['cat_name'] ?></a>
                </li>
            <?php endforeach;?>
        </ul>
    </nav>
    <section class="rates container">
        <h2>Мои ставки</h2>
        <table class="rates__list">
            <?php foreach ($myBets as $bet): ?>
            <tr class="rates__item rates__item--win">  <!-- item win - ставка выйграла... rates__item--end - торги окончены -->
                <td class="rates__info">
                    <div class="rates__img">
                        <img src="<?= getLotById($bet['lot_id'], $openLots)['img']?>" width="54" height="40" alt="Сноуборд">
                    </div>
                    <h3 class="rates__title"><a href="lot.php?lot_id=<?= getLotById($bet['lot_id'], $openLots)['id']?>"><?= getLotById($bet['lot_id'], $openLots)['lot_name']?></a></h3>
                </td>
                <td class="rates__category">
                    <?= getCategoryById(getLotById($bet['lot_id'], $openLots)['category_id'], $category)['cat_name']?>
                </td>
                <td class="rates__timer">
                    <div class="timer timer--finishing ">07:13:34</div> <!-- timer--win - ставка выйграла.... timer--end - торги окончены -->
                </td>
                <td class="rates__price">
                    <?= $bet['sum']?> р
                </td>
                <td class="rates__time">
                    <?= time_left($bet['date'])?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
    </section>
</main>