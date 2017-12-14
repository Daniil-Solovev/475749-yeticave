<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/app/init.php');

$categories = getCategoriesList($link);

$myBets = getMyBets($link);

$openLots = getOpenLots($link);

$page__content = renderTemplate('templates/my-lots.php', ['authorizedUser' => $authorizedUser, 'openLots' => $openLots, 'myBets' => $myBets, 'categories' => $categories]);
$page__layout = renderTemplate('templates/layout.php', ['categories' => $categories, 'page__content' => $page__content, 'title' => 'Yeticave, мои лоты', 'authorizedUser' => $authorizedUser]);
print($page__layout);