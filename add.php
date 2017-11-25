<?php
require_once('templates/data.php');
require_once('functions.php');

function validate_int($arg) {
    return filter_var($arg, FILTER_VALIDATE_INT);
}
$err_msg = null;
$errors = [
    'lot-name' => ['required' => true],
    'category' => ['required' => true],
    'message' => ['required' => true],
    'file' => ['required' => true],
    'lot-rate' => ['required' => true],
    'lot-step' => ['required' => true],
    'lot-date' => ['required' => true]
];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    if (empty($_POST['lot-name'])) {
        $errors['lot-name'] = ['required' => false];
        $err_msg = 'form--invalid';
    }
    if (empty($_POST['category'])) {
        $errors['category'] = ['required' => false];
        $err_msg = 'form--invalid';
    }
    if (empty($_POST['message'])) {
        $errors['message'] = ['required' => false];
        $err_msg = 'form--invalid';
    }
    if (empty($_POST['lot-rate'])) {
        $errors['lot-rate'] = ['required' => false];
        $err_msg = 'form--invalid';
    }
    if (empty($_POST['lot-step'])) {
        $errors['lot-step'] = ['required' => false];
        $err_msg = 'form--invalid';
    }
    if (empty($_POST['lot-date'])) {
        $errors['lot-date'] = ['required' => false];
        $err_msg = 'form--invalid';
    }

    if (!empty($_POST['lot-rate'])) {
        $result = validate_int($_POST['lot-rate']);
        if (!$result) {
            $errors['lot-rate'] = ['required' => false];
            $err_msg = 'form--invalid';
        }
    }
    if (!empty($_POST['lot-step'])) {
        $result = validate_int($_POST['lot-step']);
        if (!$result) {
            $errors['lot-step'] = ['required' => false];
            $err_msg = 'form--invalid';
        }
    }

    if (empty($_POST['file'])) {
        $errors['file'] = ['required' => false];
    }

    if (isset($_FILES['file']['name'])) {
        $tmp_name = $_FILES['file']['tmp_name'];
        $path = $_FILES['file']['name'];

        $finfo = finfo_open(FILEINFO_MIME_TYPE);
        $file_type = finfo_file($finfo, $tmp_name);
        if ($file_type !== "image/gif") {
            $errors['file'] = ['required' => false];
        } else {
            move_uploaded_file($tmp_name, 'img/' . $path);
        }
    }

    if (!in_array(false, $errors)) {
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
        $page__content = renderTemplate('templates/add.php', ['errors' => $errors, 'err_msg' => $err_msg]);
    }
    
} else {
    $page__content = renderTemplate('templates/add.php', ['errors' => $errors, 'err_msg' => $err_msg]);
}

$page__layout = renderTemplate('templates/layout.php', ['page__content' => $page__content, 'title' => 'Yeticave, добавить лот']);
print($page__layout);