<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/app/init.php');

$err_msg = false;
$errors = [
    'email' => [],
    'password' => []
];

$error_messages = [
    'required' => 'Заполните это поле',
    'email_not_found' => 'Пользователь с таким email не найден',
    'password_not_found' => 'Введен неверный пароль'
];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (empty($_POST['email'])) {
        $errors['email'][] = 'required';
        $err_msg = true;
    }
    if (empty($_POST['password'])) {
        $errors['password'][] = 'required';
        $err_msg = true;
    }
    session_start();
    if (!empty($_POST['email']) && !empty($_POST['password'])) {
        if ($user = searchUserByEmail($_POST['email'], $users)) {
            if (!password_verify($_POST['password'], $user['password'])) {
                $errors['password'][] = 'password_not_found';
                $err_msg = true;
            } else {
                $_SESSION['userId'] = $user;
                $_SESSION['name'] = $user['name'];
            }
        } else {
            $errors['email'][] = 'email_not_found';
            $err_msg = true;
        }
    }

    if (!$err_msg) {
        header("Location: /index.php");
        exit();
    } else {
        $page__content = renderTemplate('templates/login.php', ['categories' => $categories, 'errors' => $errors, 'error_messages' => $error_messages]);
    }

} else {
    $page__content = renderTemplate('templates/login.php', ['categories' => $categories, 'errors' => $errors]);
}



$page__layout = renderTemplate('templates/layout.php', ['page__content' => $page__content, 'title' => 'Yeticave, мои лоты', 'categories' => $categories]);
print($page__layout);