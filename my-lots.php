<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/app/init.php');

$betList = null;
if (isset($_COOKIE['bets'])) {
    $betList = json_decode($_COOKIE['bets'], true);
}

$page__content = renderTemplate('templates/my-lots.php', ['categories' => $categories, 'betList' => $betList]);
$page__layout = renderTemplate('templates/layout.php', ['page__content' => $page__content, 'title' => 'Yeticave, мои лоты', 'categories' => $categories, 'authorizedUser' => $authorizedUser]);
print($page__layout);