<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/app/init.php');

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

$userId = $_SESSION['user']['id'];
$lotId = $_REQUEST['lot_id'] ?? null;
$betsKey = $userId . ':' . $lotId;


$betsArray = null;
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      $betsArray[$betsKey] = [
          'name' => $_SESSION['user']['id'],
          'lot_id' => $lotId,
          'lot_rate' => $_POST['cost'],
          'time' => strtotime('now')
      ];
      setcookie('bets', json_encode($betsArray));
      header("Location: my-lots.php");
}

$page__content = renderTemplate('templates/lot.php', ['betsArray' => $betsArray,'lot' => $lot, 'bets' => $bets, 'categories' => $categories, 'authorizedUser' => $authorizedUser, 'lot_id' => $lot_id]);
$page__layout = renderTemplate('templates/layout.php', ['page__content' => $page__content, 'title' => 'Yeticave, открытые лоты', 'categories' => $categories, 'authorizedUser' => $authorizedUser]);

print($page__layout);