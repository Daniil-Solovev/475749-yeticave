<main>
    <nav class="nav">
        <ul class="nav__list container">
            <?php foreach ( $category as $value ) :?>
                <li class="nav__item">
                    <a href="all-lots.html"><?= $value['cat_name'] ?></a>
                </li>
            <?php endforeach;?>
        </ul>
    </nav>
    <section class="lot-item container">
        <?php if (isset($lot)): ?>
        <h2><?=$lot['lot_name']?></h2>
        <div class="lot-item__content">
            <div class="lot-item__left">
                <div class="lot-item__image">
                    <img src="<?=$lot['img']?>" width="730" height="548" alt="Сноуборд">
                </div>
                <p class="lot-item__category">Категория: <span><?=getCategoryById($lot['category_id'], $category)['cat_name']?></span></p>
                <p class="lot-item__description"><?= $lot['description']?></p>
            </div>
            <div class="lot-item__right">
                <?php if (isset($authorizedUser) && checkValidBet($myBets, $_SESSION['user']['id'], $_GET['lot_id'])) :?>
                <div class="lot-item__state">
                    <div class="lot-item__timer timer">
                        <?=lot_time_remaining($lot['lot_date']);?>
                    </div>
                    <div class="lot-item__cost-state">
                        <div class="lot-item__rate">
                            <span class="lot-item__amount">Текущая цена</span>
                            <span class="lot-item__cost"><?=$lot['lot_rate']?></span>
                        </div>
                        <div class="lot-item__min-cost">
                            Мин. ставка <span><?=$lot['lot_step']?></span>
                        </div>
                    </div>
                    <form class="lot-item__form" action="" method="post">
                        <p class="lot-item__form-item">
                            <label for="cost">Ваша ставка</label>
                            <input id="cost" type="number" name="cost" placeholder="12 000">
                        </p>
                        <button type="submit" class="button">Сделать ставку</button>
                    </form>
                </div>
                <?php else: ?>
                    <p>Ставки сделаны</p>
                <?php endif; ?>
                <div class="history">
                    <h3>История ставок (<span>4</span>)</h3>
                    <!-- заполните эту таблицу данными из массива $bets-->
                    <table class="history__list">
                        <?php foreach ($myBets as $lot_history): ?>
                        <?php if ($_GET['lot_id'] == $lot_history['lot_id']): ?>
                            <tr class="history__item">
                                <td class="history__name"><?=getUserById($lot_history['user_id'], $users) ?></td>
                                <td class="history__price"><?=$lot_history['sum'] . 'р' ?> </td>
                                <td class="history__time"><?= time_left($lot_history['date']) ?></td>
                            </tr>
                        <?php endif; ?>
                        <?php endforeach; ?>
                    </table>
                </div>
            </div>
        </div>
        <?php else:?>
                <h1>Лот с таким id не найден</h1>
        <?php endif ?>
    </section>
</main>