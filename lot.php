<?php
require_once('templates/data.php');
require_once('functions.php');
require_once('app/init.php');

    $lot = null;
    if (isset($_GET['lot_id'])) {
        $lot_id = $_GET['lot_id'];

        foreach ($lots__list as $item) {
            if ($item['lot_id'] == $lot_id) {
                $lot = $item;
                break;
            }
        }
    }

    if (!$lot) {
        http_response_code(404);
    }

$page__content = renderTemplate('templates/lot.php', ['lot' => $lot, 'bets' => $bets]);
$page__layout = renderTemplate('templates/layout.php', ['page__content' => $page__content, 'title' => 'Yeticave']);

print($page__layout);
?>