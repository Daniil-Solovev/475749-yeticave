<?php
require_once('templates/data.php');
require_once('functions.php');
require_once('app/init.php');

$lot = null;

if (isset($_GET['lot_id'])) {
    $lot_id = $_GET['lot_id'];
    foreach ($lots__list as $key => $item) {
        if ($key == $lot_id) {
            $lot = $item;
            break;
        }
    }
}

if (!$lot) {
    http_response_code(404);
}

$page__content = renderTemplate('templates/lot.php', ['lot' => $lot, 'bets' => $bets]);
$page__layout = renderTemplate('templates/layout.php', ['page__content' => $page__content, 'title' => 'Yeticave, открытые лоты']);

print($page__layout);