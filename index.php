<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/app/init.php');

$page__content = renderTemplate('templates/main.php', ['categories' => $categories, 'lots__list' => $lots__list]);
$page__layout = renderTemplate('templates/layout.php', ['page__content' => $page__content, 'title' => 'Yeticave', 'categories' => $categories, 'authorizedUser' => $authorizedUser]);
print($page__layout);
