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
    <form enctype="multipart/form-data" class="form form--add-lot container <?= $err_msg ? 'form--invalid' : ''?>" action="add.php" method="post"> <!-- form--invalid-->        <h2>Добавление лота</h2>
        <div class="form__container-two">
            <?php $error_name = array_shift( $errors[ 'lot-name' ] );
            $err_class_name = $error_name ? 'form__item--invalid' : '';
            $err_span_name = $error_name ? $error_messages[$error_name] : ''; ?>
            <div class="form__item <?=$err_class_name?>"> <!-- form__item--invalid -->
                <label for="lot-name">Наименование</label>
                <input id="lot-name" type="text" name="lot-name" placeholder="Введите наименование лота" value="<?= $lot['lot_name']?>">
                <span class="form__error "><?=$err_span_name?></span>
            </div>
            <?php $error_category = array_shift( $errors[ 'category' ] );
            $err_class_category = $error_category ? 'form__item--invalid' : '';
            $err_span_category = $error_category ? $error_messages[$error_category] : ''; ?>
            <div class="form__item <?=$err_class_category?>">
                <label for="category">Категория</label>
                <select id="category" name="category">
                    <option>Выберите категорию</option>
                    <?php foreach ($categories as $category) :?>
                     <option value="<?=$category['id']?>" <?= $lot['lot_category'] == $category['id'] ? 'selected' : '' ?>><?=$category['name']?></option>
                    <?php endforeach ?>
                </select>
                <span class="form__error "><?=$err_span_category?></span>
            </div>
        </div>
        <?php $error_message = array_shift( $errors[ 'message' ] );
        $err_class_message = $error_message ? 'form__item--invalid' : '';
        $err_span_message = $error_message ? $error_messages[$error_message] : ''; ?>
        <div class="form__item form__item--wide <?=$err_class_message?>">
            <label for="message">Описание</label>
            <textarea id="message" name="message" placeholder="Напишите описание лота"><?= $lot['description'] ?></textarea>
            <span class="form__error"><?=$err_span_message?></span>
        </div>
        <?php $error_file = array_shift( $errors[ 'file' ] );
        $err_class_file = $error_file ? 'form__item--invalid' : '';
        $err_span_file = $error_file ? $error_messages[$error_file] : '+ Добавить'; ?>
        <div class="form__item form__item--file <?=$err_class_file?>"> <!-- form__item--uploaded -->
            <label>Изображение</label>
            <div class="preview">
                <button class="preview__remove" type="button">x</button>
                <div class="preview__img">
                    <img src="<?= $lot['lot_url'] ?>" width="113" height="113" alt="Изображение лота">
                </div>
            </div>
            <div class="form__input-file">
                <input class="visually-hidden" name="file" type="file" id="photo2" value="<?= $lot['lot_url'] ?>" >
                <label for="photo2">
                    <span><?=$err_span_file?></span>
                </label>
            </div>
        </div>
        <div class="form__container-three ">
            <?php $error_lot_rate = array_shift( $errors[ 'lot-rate' ] );
            $err_class_lot_rate = $error_lot_rate ? 'form__item--invalid' : '';
            $err_span_lot_rate = $error_lot_rate ? $error_messages[$error_lot_rate] : ''; ?>
            <div class="form__item form__item--small <?=$err_class_lot_rate?>">
                <label for="lot-rate">Начальная цена</label>
                <input id="lot-rate" type="number" name="lot-rate" placeholder="0" value="<?= $lot['lot_price'] ?>">
                <span class="form__error "><?=$err_span_lot_rate?></span>
            </div>
            <?php $error_lot_step = array_shift( $errors[ 'lot-step' ] );
            $err_class_lot_step = $error_lot_step ? 'form__item--invalid' : '';
            $err_span_lot_step = $error_lot_step ? $error_messages[$error_lot_step] : ''; ?>
            <div class="form__item form__item--small <?=$err_class_lot_step?>">
                <label for="lot-step">Шаг ставки</label>
                <input id="lot-step" type="number" name="lot-step" placeholder="0" required>
                <span class="form__error"><?=$err_span_lot_step?></span>
            </div>
            <?php $error_lot_date = array_shift( $errors[ 'lot-date' ] );
            $err_class_lot_date = $error_lot_date ? 'form__item--invalid' : '';
            $err_span_lot_date = $error_lot_date ? $error_messages[$error_lot_date] : ''; ?>
            <div class="form__item <?=$err_class_lot_date?>">
                <label for="lot-date">Дата окончания торгов</label>
                <input class="form__input-date" id="lot-date" type="date" name="lot-date" <?= $lot['expire'] ? 'value="' . date("Y-m-d", $lot['expire']) . '"' : '' ?>">
                <span class="form__error"><?=$err_span_lot_date?></span>
            </div>
        </div>
        <span class="form__error form__error--bottom">Пожалуйста, исправьте ошибки в форме.</span>
        <button type="submit" class="button">Добавить лот</button>
    </form>
</main>
