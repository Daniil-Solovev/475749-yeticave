<?php
require_once('templates/data.php');
require_once('functions.php');

function validate_int($arg) {
    return filter_var($arg, FILTER_VALIDATE_INT);
}
$err_msg = null;
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

    if (empty($_POST['file'])) {
        $errors['file'][] = 'required';
    }

    if (isset($_FILES['file']['name'])) {
        $tmp_name = $_FILES['file']['tmp_name'];
        $path = $_FILES['file']['name'];

        $finfo = finfo_open(FILEINFO_MIME_TYPE);
        $file_type = finfo_file($finfo, $tmp_name);
        if ($file_type !== "image/gif") {
            $errors['file'][] = 'required';
        } else {
            move_uploaded_file($tmp_name, 'img/' . $path);
            if (!$_FILES['file']['error'] == 0) {
                $errors['file'][] = 'file_not_uploaded';
            }
        }
    }

    if (!$err_msg) {
        $categories[] = [
            'name' => $_POST['category'],
            'cssClass' => cat_class($_POST['category'])
        ];

        $lots__list[] = [
            'lot_name' => $_POST['lot-name'],
            'lot_category' => array_pop($categories),
            'lot_price' => $_POST['lot-rate'],
            'lot_url' => 'img/' . $path,
            'lot_time_hours' => rand(0, 24),
            'lot_time_min' => rand(0, 60)
        ];
        $lot = array_pop($lots__list);

        $page__content = renderTemplate('templates/lot.php', ['categories' => $categories, 'lots__list' => $lots__list, 'lot' => $lot, 'bets' => $bets]);
    } else {
        $page__content = renderTemplate('templates/add.php', ['errors' => $errors, 'err_msg' => $err_msg, 'error_messages' => $error_messages]);
    }
    
} else {
    $page__content = renderTemplate('templates/add.php', ['errors' => $errors, 'err_msg' => $err_msg, 'categories' => $categories]);
}

$page__layout = renderTemplate('templates/layout.php', ['page__content' => $page__content, 'title' => 'Yeticave, добавить лот']);
print($page__layout);