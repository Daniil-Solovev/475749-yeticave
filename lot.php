<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/app/init.php');

$lot = null;
$openLots = getOpenLots($link);
if (isset($_GET['lot_id'])) {
    $lot = getLotById($_GET['lot_id'], $openLots);
}

if (!$lot) {
    http_response_code(404);
}

$lotId = $_REQUEST['lot_id'] ?? null;

$categories = getCategoriesList ($link);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $bet = [
        'userId' => $authorizedUser['id'],
        'lotId' => (int)$lotId,
        'lot_rate' => $_POST['cost'],
        'time' => strtotime('now')
    ];

    $bet_sql = "INSERT INTO bets (date, sum, user_id, lot_id) VALUES (?, ?, ?, ?)";
    $data_sql = [$bet['time'], $bet['lot_rate'], $bet['userId'], $bet['lotId']];

    $res = db_get_prepare_stmt($link, $bet_sql, $data_sql);
    $mysqlli_result = mysqli_stmt_execute($res);

    header("Location: my-lots.php");
}
$myBets = getMyBets($link);

$page__content = renderTemplate('templates/lot.php', ['link' => $link, 'myBets' => $myBets, 'categories' => $categories, 'lot' => $lot, 'authorizedUser' => $authorizedUser]);
$page__layout = renderTemplate('templates/layout.php', ['categories' => $categories, 'page__content' => $page__content, 'title' => 'Yeticave, открытые лоты', 'authorizedUser' => $authorizedUser]);

print($page__layout);