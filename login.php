<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/app/init.php');

$errors = [
    'email' => [],
    'password' => []
];

$error_messages = [
    'required' => 'Заполните это поле',
    'email_not_found' => 'Пользователь с таким email не найден',
    'password_not_found' => 'Введен неверный пароль'
];

$categories = getCategoriesList ($link);

function validateAuthForm( $link ) {
    $result = true;
    $errors = [
        'email' => [],
        'password' => []
    ];

    if (empty($_POST['email'])) {
        $errors['email'][] = 'required';
        $result = false;
    }
    if (empty($_POST['password'])) {
        $errors['password'][] = 'required';
        $result = false;
    }

    if (!$result )
        return [ $result, $errors, null ];
    if (!$user = searchUserByEmail($link, $_POST['email'])) {
        $errors['email'][] = 'email_not_found';
        $result = false;
    }

    if (!$result )
        return [ $result, $errors, null ];
    if (!password_verify($_POST['password'], $user['password'])) {
        $errors[ 'password' ][] = 'password_not_found';
        $result = false;
    }

    return [ $result, $errors, $user ];
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    list( $validationResult, $errors, $user ) = validateAuthForm($link);
    if ( $validationResult ) {
        $_SESSION['user'] = $user;
        header("Location: /index.php");
        exit();
    } else {
        $page__content = renderTemplate('templates/login.php', ['categories' => $categories, 'errors' => $errors, 'error_messages' => $error_messages, 'result' => $validationResult]);
    }
} else {
    $page__content = renderTemplate('templates/login.php', ['categories' => $categories, 'errors' => $errors, 'result' => true]);
}

$page__layout = renderTemplate('templates/layout.php', ['categories' => $categories, 'page__content' => $page__content, 'title' => 'Yeticave, вход', 'authorizedUser' => $authorizedUser]);
print($page__layout);