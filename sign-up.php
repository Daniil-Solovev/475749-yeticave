<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/app/init.php');

$page__content = renderTemplate('templates/sign-up.php', ['categories' => $categories]);
$page__layout = renderTemplate('templates/layout.php', ['page__content' => $page__content, 'title' => 'Yeticave, регистрация', 'categories' => $categories, 'authorizedUser' => $authorizedUser]);
print($page__layout);