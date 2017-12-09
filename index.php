<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/app/init.php');

$category = getCategoryList ($link);

$openBets = getOpenLots($link);

$page__content = renderTemplate('templates/main.php', ['openBets' => $openBets, 'category' => $category]);
$page__layout = renderTemplate('templates/layout.php', ['category' => $category, 'page__content' => $page__content, 'title' => 'Yeticave', 'authorizedUser' => $authorizedUser]);
print($page__layout);
