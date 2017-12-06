<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/app/init.php');

$lot = null;

if (isset($_GET['lot_id'])) {
    $lot = getLotById($_GET['lot_id'], $lots__list);
}

if (!$lot) {
    http_response_code(404);
}

$lotId = $_REQUEST['lot_id'] ?? null;
$betsKey = $authorizedUser['id'] . ':' . $lotId;


$betsArray = null;
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $bet = [
        'userId' => $authorizedUser['id'],
        'lotId' => (int)$lotId,
        'lot_rate' => $_POST['cost'],
        'time' => strtotime('now')
    ];
    makeBet($bet);
    header("Location: my-lots.php");
}

$bets = getBetsByLot($lotId);
$betList = getBetsByUserId($authorizedUser['id']);

$page__content = renderTemplate('templates/lot.php', ['users' => $users, 'lot' => $lot, 'betList' => $betList, 'categories' => $categories, 'authorizedUser' => $authorizedUser]);
$page__layout = renderTemplate('templates/layout.php', ['page__content' => $page__content, 'title' => 'Yeticave, открытые лоты', 'categories' => $categories, 'authorizedUser' => $authorizedUser]);

print($page__layout);