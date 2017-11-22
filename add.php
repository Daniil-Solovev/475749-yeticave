<?php
require_once('templates/data.php');
require_once('functions.php');
require_once('app/init.php');

$required = ['lot-name', 'category', 'message', 'file', 'lot-rate', 'lot-step', 'lot-date'];
$dict = [
    'lot-name' => 'Наименование лота',
    'category' => 'Категория лота',
    'message' => 'Описание',
    'lot-rate' => 'Начальная цена',
    'lot-step' => 'Шаг ставки',
    'lot-date' => 'Дата окончания торгов',
    'file' => 'Добавить картинку'
];

$errors = [];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $lot_add = $_POST;

    foreach ($lot_add as $key => $value) {
        if (in_array($key, $required) and ($value == "")) {
            $errors[] = $dict[$key];
        }
    }

}

if (count($errors)) {
    $err_msg = 'form--invalid';
    $page__content = renderTemplate('templates/add.php', ['errors' => $errors, 'err_msg' => $err_msg]);
} else {
    $page__content = renderTemplate('templates/lot.php', ['lot' => $lot, 'bets' => $bets]);
}


$page__layout = renderTemplate('templates/layout.php', ['page__content' => $page__content, 'title' => 'Yeticave']);
print($page__layout);
