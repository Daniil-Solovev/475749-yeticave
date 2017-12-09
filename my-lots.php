<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/app/init.php');

$category = getCategoryList ($link);

$myBets = getMyBets($link);

$openLots = getOpenLots($link);

$page__content = renderTemplate('templates/my-lots.php', ['openLots' => $openLots, 'myBets' => $myBets, 'category' => $category]);
$page__layout = renderTemplate('templates/layout.php', ['category' => $category, 'page__content' => $page__content, 'title' => 'Yeticave, мои лоты', 'authorizedUser' => $authorizedUser]);
print($page__layout);