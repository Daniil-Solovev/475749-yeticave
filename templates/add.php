
<main>
    <nav class="nav">
        <ul class="nav__list container">
            <li class="nav__item">
                <a href="all-lots.html">Доски и лыжи</a>
            </li>
            <li class="nav__item">
                <a href="all-lots.html">Крепления</a>
            </li>
            <li class="nav__item">
                <a href="all-lots.html">Ботинки</a>
            </li>
            <li class="nav__item">
                <a href="all-lots.html">Одежда</a>
            </li>
            <li class="nav__item">
                <a href="all-lots.html">Инструменты</a>
            </li>
            <li class="nav__item">
                <a href="all-lots.html">Разное</a>
            </li>
        </ul>
    </nav>
    <form class="form form--add-lot container <?=$err_msg?>" action="add.php" method="post"> <!-- form--invalid-->
        <h2>Добавление лота</h2>
        <div class="form__container-two">
        <?php $block_name = in_array(false, $errors['lot-name']) ? 'form__item--invalid' : '';
        $span_name = in_array(false, $errors['lot-name']) ? 'Заполните это поле' : '' ?>
            <div class="form__item <?=$block_name?>"> <!-- form__item--invalid -->
                <label for="lot-name">Наименование</label>
                <input id="lot-name" type="text" name="lot-name" placeholder="Введите наименование лота" >
                <span class="form__error "><?=$span_name?></span>
            </div>
            <?php $category_name = in_array(false, $errors['category']) ? 'form__item--invalid' : '';
            $span_category = in_array(false, $errors['category']) ? 'Необходимо выбрать категорию' : '' ?>
            <div class="form__item <?=$category_name?>">
                <label for="category">Категория</label>
                <select id="category" name="category">
                    <option></option>
                    <option>Доски и лыжи</option>
                    <option>Крепления</option>
                    <option>Ботинки</option>
                    <option>Одежда</option>
                    <option>Инструменты</option>
                    <option>Разное</option>
                </select>
                <span class="form__error "><?=$span_category?></span>
            </div>
        </div>
        <?php $message_name = in_array(false, $errors['message']) ? 'form__item--invalid' : '';
        $span_message = in_array(false, $errors['message']) ? 'Заполните описание' : '' ?>
        <div class="form__item form__item--wide <?=$message_name?>">
            <label for="message">Описание</label>
            <textarea id="message" name="message" placeholder="Напишите описание лота" required></textarea>
            <span class="form__error"><?=$span_message?></span>
        </div>
        <?php $file_name = in_array(false, $errors['file']) ? 'form__item--invalid' : '';
        $span_file = in_array(false, $errors['file']) ? 'Выберите файл' : '+ Добавить' ?>
        <div class="form__item form__item--file <?=$file_name?>"> <!-- form__item--uploaded -->
            <label>Изображение</label>
            <div class="preview">
                <button class="preview__remove" type="button">x</button>
                <div class="preview__img">
                    <img src="../img/avatar.jpg" width="113" height="113" alt="Изображение лота">
                </div>
            </div>
            <div class="form__input-file">
                <input class="visually-hidden" name="file" type="file" id="photo2" value="" >
                <label for="photo2">
                    <span><?=$span_file?></span>
                </label>
            </div>
        </div>
        <div class="form__container-three ">
            <?php $lot_rate_name = in_array(false, $errors['lot-rate']) ? 'form__item--invalid' : '';
            $span_lot_rate = in_array(false, $errors['lot-rate']) ? 'Введите начальную цену' : '' ?>
            <div class="form__item form__item--small <?=$lot_rate_name?>">
                <label for="lot-rate">Начальная цена</label>
                <input id="lot-rate" type="number" name="lot-rate" placeholder="0" required>
                <span class="form__error "><?=$span_lot_rate?></span>
            </div>
            <?php $lot_step_name = in_array(false, $errors['lot-step']) ? 'form__item--invalid' : '';
            $span_lot_step = in_array(false, $errors['lot-step']) ? 'Введите шаг ставки' : '' ?>
            <div class="form__item form__item--small <?=$lot_step_name?>">
                <label for="lot-step">Шаг ставки</label>
                <input id="lot-step" type="number" name="lot-step" placeholder="0" required>
                <span class="form__error"><?=$span_lot_step?></span>
            </div>
            <?php $lot_date_name = in_array(false, $errors['lot-date']) ? 'form__item--invalid' : '';
            $span_lot_date = in_array(false, $errors['lot-date']) ? 'Введите дату завершения торгов' : '' ?>
            <div class="form__item <?=$lot_date_name?>">
                <label for="lot-date">Дата окончания торгов</label>
                <input class="form__input-date" id="lot-date" type="date" name="lot-date" required>
                <span class="form__error"><?=$span_lot_date?></span>
            </div>
        </div>
        <span class="form__error form__error--bottom">Пожалуйста, исправьте ошибки в форме.</span>
        <button type="submit" class="button">Добавить лот</button>
    </form>
</main>
