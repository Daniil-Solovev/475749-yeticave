<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/app/init.php');

$betList = getBetsByUserId($authorizedUser['id']);

$category = getCategoryList ($link);

$page__content = renderTemplate('templates/my-lots.php', ['category' => $category, 'lots__list' => $lots__list, 'categories' => $categories, 'betList' => $betList]);
$page__layout = renderTemplate('templates/layout.php', ['category' => $category, 'page__content' => $page__content, 'title' => 'Yeticave, мои лоты', 'categories' => $categories, 'authorizedUser' => $authorizedUser]);
print($page__layout);