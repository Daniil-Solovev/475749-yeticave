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

function validateAuthForm( array $users ) {
    $result = true;
    $errors = [];

    if (empty($_POST['email'])) {
        $errors['email'][] = 'required';
        $result = false;
    }
    if (empty($_POST['password'])) {
        $errors['password'][] = 'required';
        $result = false;
    }

    if ( ! $result )
        return [ $result, $errors, null ];
    if (!$user = searchUserByEmail($_POST['email'], $users)) {
        $errors['email'][] = 'email_not_found';
        $result = false;
    }

    if ( ! $result )
        return [ $result, $errors, null ];
    if (!password_verify($_POST['password'], $user['password'])) {
        $errors[ 'password' ][] = 'password_not_found';
        $result = false;
    }

    return [ $result, $errors, $user ];
    }

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

        list( $validationResult, $errors, $user ) = validateAuthForm( $users );

        if ($validationResult) {
        $_SESSION['user'] = $user;
        header("Location: /index.php");
        exit();
    } else {
        $page__content = renderTemplate('templates/login.php', ['categories' => $categories, 'errors' => $errors, 'error_messages' => $error_messages]);
    }

} else {
    $page__content = renderTemplate('templates/login.php', ['categories' => $categories, 'errors' => $errors]);
}



$page__layout = renderTemplate('templates/layout.php', ['page__content' => $page__content, 'title' => 'Yeticave, вход', 'categories' => $categories, 'authorizedUser' => $authorizedUser]);
print($page__layout);