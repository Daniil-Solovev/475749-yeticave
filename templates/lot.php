<?php if (!isset($_SESSION)) { session_start(); }?>
<main>
    <nav class="nav">
        <ul class="nav__list container">
            <?php foreach ( $categories as $category ) :?>
                <li class="nav__item">
                    <a href="all-lots.html"><?= $category['name'] ?></a>
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
                    <img src="<?=$lot['lot_url']?>" width="730" height="548" alt="Сноуборд">
                </div>
                <p class="lot-item__category">Категория: <span><?=getCategoryById($lot['lot_category'], $categories)['name']?></span></p>
                <p class="lot-item__description"><?= $lot['description']?></p>
            </div>
            <div class="lot-item__right">
                <?php if (isset($authorizedUser)) :?>
                <div class="lot-item__state">
                    <div class="lot-item__timer timer">
                        <?=lot_time_remaining($lot['expire']);?>
                    </div>
                    <div class="lot-item__cost-state">
                        <div class="lot-item__rate">
                            <span class="lot-item__amount">Текущая цена</span>
                            <span class="lot-item__cost"><?=$lot['lot_price']?></span>
                        </div>
                        <div class="lot-item__min-cost">
                            Мин. ставка <span>12 000 р</span>
                        </div>
                    </div>
                    <form class="lot-item__form" action="lot.php" method="post">
                        <p class="lot-item__form-item">
                            <label for="cost">Ваша ставка</label>
                            <input id="cost" type="number" name="cost" placeholder="12 000">
                        </p>
                        <button type="submit" class="button">Сделать ставку</button>
                    </form>
                </div>
                <?php endif; ?>
                <div class="history">
                    <h3>История ставок (<span>4</span>)</h3>
                    <!-- заполните эту таблицу данными из массива $bets-->
                    <table class="history__list">
                        <?php foreach ($bets as $lot__history): ?>
                            <tr class="history__item">
                                <td class="history__name"><?= $lot__history['name'] ?></td>
                                <td class="history__price"><?= $lot__history['price'] ?> р</td>
                                <td class="history__time"><?= time_left($lot__history['ts']) ?></td>
                            </tr>
                        <?php endforeach ?>
                    </table>
                </div>
            </div>
        </div>
        <?php else:?>
                <h1>Лот с таким id не найден</h1>
        <?php endif ?>
    </section>
</main>