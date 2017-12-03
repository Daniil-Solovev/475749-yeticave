<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/app/init.php');

$betList = null;
if (isset($_COOKIE['bets'])) {
    $lot_id = null;
    $betList = json_decode($_COOKIE['bets'], true);
    foreach ($betList as $item) {
        if ($item == 'lot_id') {
            $lot_id = $item;
            break;
        }
    }
}

$bet_info = null;
foreach ($betList as $value) {
    $bet_info = $value;
}


$lot = null;
foreach ($lots__list as $key => $item) {
    if ($key == $bet_info['lot_id']) {
        $lot = $item;
    }
}

$lot_id = null;

$page__content = renderTemplate('templates/my-lots.php', ['lots__list' => $lots__list,'lot' => $lot, 'bet_info' => $bet_info, 'categories' => $categories, 'betList' => $betList, 'lot_id' => $lot_id]);
$page__layout = renderTemplate('templates/layout.php', ['page__content' => $page__content, 'title' => 'Yeticave, мои лоты', 'categories' => $categories, 'authorizedUser' => $authorizedUser]);
print($page__layout);