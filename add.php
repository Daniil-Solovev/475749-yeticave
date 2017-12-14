<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/app/init.php');

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
    'file_not_uploaded' => 'Файл не загружен',
    'date' => 'Неправильно указана дата'
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

$categories = getCategoriesList ($link);

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

    if (empty($_POST['lot-step'] )) {
        $errors['lot-step'][] = 'required';
        $err_msg = true;
    }

    if (!validate_int($_POST['lot-step']) or $_POST['lot-step'] < 0) {
        $errors['lot-step'][] = 'int';
        $err_msg = true;
    }

    if (!validate_int($_POST['lot-rate']) or $_POST['lot-rate'] < 0) {
        $errors['lot-rate'][] = 'int';
        $err_msg = true;
    }

    if (empty($_POST['lot-date'])) {
        $errors['lot-date'][] = 'required';
        $err_msg = true;
    }

    if (validateDate($_POST['lot-date'])) {
        $errors['lot-date'][] = 'date';
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

    $lot['lot_name'] = htmlspecialchars($_POST['lot-name']);
    $lot['lot_category'] = (int)$_POST['category'];
    $lot['lot_price'] = $_POST['lot-rate'];
    $lot['lot_step'] = $_POST['lot-step'];
    $lot['lot_url'] = getFilePath($_FILES['file']['name']);
    $lot['expire'] = strtotime('now');
    $lot['time_now'] = strtotime($_POST['lot-date']);
    $lot['description'] = htmlspecialchars($_POST['message']);
    $lot['lot_author'] = $authorizedUser['id'];

    if (!$err_msg) {
        $lot_sql = "INSERT INTO lots (date_publish, lot_name, description, img, lot_rate, lot_step, lot_date, author, winner, category_id) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $data_sql = [$lot['expire'], $lot['lot_name'], $lot['description'], $lot['lot_url'], $lot['lot_price'], $lot['lot_step'], $lot['time_now'], $lot['lot_author'], 1, $lot['lot_category']];

        $res = db_get_prepare_stmt($link, $lot_sql, $data_sql);
        $mysqlli_result = mysqli_stmt_execute($res);

        $id = mysqli_insert_id($link);
        header("Location: lot.php?lot_id=$id");
    } else {
        $page__content = renderTemplate('templates/add.php', ['categories' => $categories, 'errors' => $errors, 'err_msg' => $err_msg, 'error_messages' => $error_messages, 'lot' => $lot]);
    }
    
} else {
    if (!$authorizedUser) {
       http_response_code( 403 );
       exit();
    }
    $page__content = renderTemplate('templates/add.php', ['categories' => $categories, 'errors' => $errors, 'err_msg' => $err_msg, 'error_messages' => $error_messages, 'lot' => $lot]);
}

$page__layout = renderTemplate('templates/layout.php', ['categories' => $categories, 'page__content' => $page__content, 'title' => 'Yeticave, добавить лот', 'authorizedUser' => $authorizedUser]);
print($page__layout);