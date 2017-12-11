<main>
    <nav class="nav">
        <ul class="nav__list container">
            <?php foreach ($categories as $value ) :?>
                <li class="nav__item">
                    <a href="all-lots.html"><?= $value['cat_name'] ?></a>
                </li>
            <?php endforeach;?>
        </ul>
    </nav>
    <form class="form container <?= $err_msg ? 'form--invalid' : ''?>" action="sign-up.php" method="post" enctype="multipart/form-data"> <!-- form--invalid -->
        <h2>Регистрация нового аккаунта</h2>
        <?php $error_email = array_shift( $errors['email'] );
        $err_class_email = $error_email ? 'form__item--invalid' : '';
        $err_span_email = $error_email ? $error_messages[$error_email] : 'Введите e-mail'; ?>
        <div class="form__item <?=$err_class_email?>"> <!-- form__item--invalid -->
            <label for="email">E-mail*</label>
            <input id="email" type="text" name="email" placeholder="Введите e-mail" value="<?= $_POST['email'] ?? ''?>" required>
            <span class="form__error"><?=$err_span_email?></span>
        </div>
        <?php $error_password = array_shift( $errors['password'] );
        $err_class_password = $error_password ? 'form__item--invalid' : '';
        $err_span_password = $error_password ? $error_messages[$error_password] : 'Введите пароль'; ?>
        <div class="form__item <?=$err_class_password?>">
            <label for="password">Пароль*</label>
            <input id="password" type="text" name="password" placeholder="Введите пароль" value="<?= $_POST['password'] ?? ''?>" required>
            <span class="form__error"><?=$err_span_password?></span>
        </div>
        <?php $error_name = array_shift( $errors['name'] );
        $err_class_name = $error_name ? 'form__item--invalid' : '';
        $err_span_name = $error_name ? $error_messages[$error_name] : 'Введите имя'; ?>
        <div class="form__item <?=$err_class_name?>">
            <label for="name">Имя*</label>
            <input id="name" type="text" name="name" placeholder="Введите имя" value="<?= $_POST['name'] ?? ''?>" required>
            <span class="form__error"><?=$err_span_name?></span>
        </div>
        <?php $error_message = array_shift( $errors['message'] );
        $err_class_message = $error_message ? 'form__item--invalid' : '';
        $err_span_message = $error_message ? $error_messages[$error_message] : 'Напишите как с вами связаться'; ?>
        <div class="form__item <?=$err_class_name?>">
            <label for="message">Контактные данные*</label>
            <textarea id="message" name="message" placeholder="Напишите как с вами связаться" required><?= $_POST['message'] ?? ''?></textarea>
            <span class="form__error"><?=$err_span_name?></span>
        </div>
        <?php $error_file = array_shift($errors['file']);
        $err_class_file = $error_file ? 'form__item--invalid' : '';
        $err_span_file = $error_file ? $error_messages[$error_file] : '+ Добавить'; ?>
        <div class="form__item form__item--file form__item--last <?=$err_class_file?>">
            <label>Аватар</label>
            <div class="preview">
                <button class="preview__remove" type="button">x</button>
                <div class="preview__img">
                    <img src="img/avatar.jpg" width="113" height="113" alt="Ваш аватар">
                </div>
            </div>
            <div class="form__input-file">
                <input class="visually-hidden" name="file" type="file" id="photo2" value="">
                <label for="photo2">
                    <span><?=$err_span_file?></span>
                </label>
            </div>
        </div>
        <span class="form__error form__error--bottom">Пожалуйста, исправьте ошибки в форме.</span>
        <button type="submit" class="button">Зарегистрироваться</button>
        <a class="text-link" href="login.php">Уже есть аккаунт</a>
    </form>
</main>