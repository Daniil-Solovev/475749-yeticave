<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/app/init.php');

function validate_int($arg) {
    return filter_var($arg, FILTER_VALIDATE_INT);
}


function getFilePath( $fileName, $withDocRoot = false ) {
    return ($withDocRoot ? $_SERVER['DOCUMENT_ROOT'] : '') . '/img/' . $fileName;
}
$page__content = null;
$err_msg = false;
$errors = [
    'lot-name' => [],
    'category' => [],
    'message' => [],
    'file' => [],
    'lot-rate' => [],
    'lot-step' => [],
    'lot-date' => []
];

$error_messages = [
    'required' => 'Заполните это поле',
    'category' => 'Выберите категорию',
    'int' => 'Введите целое число',
    'file_not_uploaded' => 'Файл не загружен'
];

$lot = [
    'lot_name' => '',
    'lot_category' => '',
    'lot_price' => '',
    'lot_step' => '',
    'lot_url' => '',
    'expire' => '',
    'description' => ''
];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    if (empty($_POST['lot-name'])) {
        $errors['lot-name'][] = 'required';
        $err_msg = true;
    }
    if (empty($_POST['category'])) {
        $errors['category'][] = 'required';
        $err_msg = true;
    }
    if (empty($_POST['message'])) {
        $errors['message'][] = 'required';
        $err_msg = true;
    }
    if (empty($_POST['lot-rate'])) {
        $errors['lot-rate'][] = 'required';
        $err_msg = true;
    }

    if (empty($_POST['lot-step'])) {
        $errors['lot-step'][] = 'required';
        $err_msg = true;
    }

    if (!validate_int($_POST['lot-step'])) {
        $errors['lot-step'][] = 'int';
        $err_msg = true;
    }

    if (!validate_int($_POST['lot-rate'])) {
        $errors['lot-rate'][] = 'int';
        $err_msg = true;
    }

    if (empty($_POST['lot-date'])) {
        $errors['lot-date'][] = 'required';
        $err_msg = true;
    }

    if (!isset($_FILES['file']) || empty($_FILES['file']['name'])) {
        $errors['file'][] = 'required';
    } else {
        $finfo = finfo_open(FILEINFO_MIME_TYPE);
        $file_type = finfo_file($finfo, $_FILES['file']['tmp_name']);
        if (! in_array( $file_type, [ "image/gif", "image/jpeg", "image/png" ] )) {
            $errors['file'][] = 'required';
        }
        if (!move_uploaded_file($_FILES['file']['tmp_name'], getFilePath($_FILES['file']['name'], true)) || $_FILES['file']['error']) {
            $errors['file'][] = 'file_not_uploaded';
           }
    }

    $lot['lot_name'] = $_POST['lot-name'];
    $lot['lot_category'] = (int)$_POST['category'];
    $lot['lot_price'] = $_POST['lot-rate'];
    $lot['lot_step'] = $_POST['lot-step'];
    $lot['lot_url'] = getFilePath( $_FILES['file']['name'] );
    $lot['expire'] = strtotime( $_POST['lot-date'] );
    $lot['description'] = $_POST['message'];

    $betList = getBetsByUserId($authorizedUser['id']);

    if (!$err_msg) {
        $page__content = renderTemplate('templates/lot.php', ['users' => $users, 'lot' => $lot, 'betList' => $betList,'categories' => $categories, 'bets' => $bets, 'authorizedUser' => $authorizedUser]);
    } else {
        $page__content = renderTemplate('templates/add.php', ['errors' => $errors, 'err_msg' => $err_msg, 'error_messages' => $error_messages, 'categories' => $categories, 'lot' => $lot]);
    }
    
} else {
    if (!$authorizedUser) {
       http_response_code( 403 );
       exit();
    }
    $page__content = renderTemplate('templates/add.php', ['errors' => $errors, 'err_msg' => $err_msg, 'error_messages' => $error_messages, 'categories' => $categories, 'lot' => $lot]);
}

$page__layout = renderTemplate('templates/layout.php', ['page__content' => $page__content, 'title' => 'Yeticave, добавить лот', 'categories' => $categories, 'authorizedUser' => $authorizedUser]);
print($page__layout);