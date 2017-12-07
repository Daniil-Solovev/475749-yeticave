<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/app/init.php');

if (!$link) {
    $error = mysqli_connect_error();
    $page__content = renderTemplate('templates/error.php', ['error' => $error]);

} else {
    $page__content = renderTemplate('templates/main.php', ['categories' => $categories, 'lots__list' => $lots__list]);
}


$page__layout = renderTemplate('templates/layout.php', ['page__content' => $page__content, 'title' => 'Yeticave', 'categories' => $categories, 'authorizedUser' => $authorizedUser]);
print($page__layout);
