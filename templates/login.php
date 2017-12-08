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
    <form class="form container <?= $result ? 'form--invalid' : ''?>" action="login.php" method="post"> <!-- form--invalid -->
        <h2>Вход</h2>
        <?php $error_name = array_shift( $errors[ 'email' ] );
        $err_class_name = $error_name ? 'form__item--invalid' : '';
        $err_span_name = $error_name ? $error_messages[$error_name] : 'Введите e-mail'; ?>
        <div class="form__item <?=$err_class_name?>"> <!-- form__item--invalid -->
            <label for="email">E-mail*</label>
            <input id="email" type="text" name="email" placeholder="Введите e-mail" >
            <span class="form__error"><?=$err_span_name?></span>
        </div>
        <?php $error_name = array_shift( $errors[ 'password' ] );
        $err_class_name = $error_name ? 'form__item--invalid' : '';
        $err_span_name = $error_name ? $error_messages[$error_name] : 'Введите пароль'; ?>
        <div class="form__item form__item--last <?=$err_class_name?>">
            <label for="password">Пароль*</label>
            <input id="password" type="text" name="password" placeholder="Введите пароль" >
            <span class="form__error"><?=$err_span_name?></span>
        </div>
        <button type="submit" class="button">Войти</button>
    </form>
</main>