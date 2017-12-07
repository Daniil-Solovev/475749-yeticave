<?php

require_once( $_SERVER['DOCUMENT_ROOT'] . '/app/data.php' );
require_once( $_SERVER['DOCUMENT_ROOT'] . '/app/functions.php' );

// устанавливаем часовой пояс в Московское время
date_default_timezone_set('Europe/Moscow');

session_start();

$authorizedUser = getAuthorizedUser();


if ($link = mysqli_connect("localhost", "root", "", "Yeticave")) {
    mysqli_set_charset($link, "utf8");
} else {
    $error = mysqli_connect_error();
}

