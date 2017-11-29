<?php

require_once( $_SERVER['DOCUMENT_ROOT'] . '/app/data.php' );
require_once( $_SERVER['DOCUMENT_ROOT'] . '/app/functions.php' );

$is_auth = (bool) rand(0, 1);

$user_name = 'Константин';
$user_avatar = 'img/user.jpg';

// устанавливаем часовой пояс в Московское время
date_default_timezone_set('Europe/Moscow');

$isUserLogged = isset( $_SESSION['userId'] );
