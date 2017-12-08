<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/app/init.php');

$lot = null;
$bet = getOpenBets($link);
if (isset($_GET['lot_id'])) {
    $lot = getLotById($_GET['lot_id'], $bet);
}

if (!$lot) {
    http_response_code(404);
}

$lotId = $_REQUEST['lot_id'] ?? null;
$betsKey = $authorizedUser['id'] . ':' . $lotId;

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

$category = getCategoryList ($link);

$page__content = renderTemplate('templates/lot.php', ['category' => $category, 'users' => $users, 'lot' => $lot, 'betList' => $betList, 'authorizedUser' => $authorizedUser]);
$page__layout = renderTemplate('templates/layout.php', ['category' => $category, 'page__content' => $page__content, 'title' => 'Yeticave, открытые лоты', 'authorizedUser' => $authorizedUser]);

print($page__layout);