<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/app/init.php');

$page__content = null;
$err_msg = false;
$errors = [
    'email' => [],
    'password' => [],
    'name' => [],
    'message' => [],
    'file' => []
];

$error_messages = [
    'required' => 'Заполните это поле',
    'email' => 'email указан неверно',
    'file_not_uploaded' => 'Файл не загружен',
    'email_not_found' => 'Пользователь с таким email уже существует'
];

$user = [
    'email' => '',
    'password' => '',
    'name' => '',
    'message' => '',
    'file' => '',
    'register' => ''
];

$categories = getCategoriesList ($link);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    if (empty($_POST['email'])) {
        $errors['email'][] = 'required';
        $err_msg = true;
    }
    if (empty($_POST['password'])) {
        $errors['password'][] = 'required';
        $err_msg = true;
    }
    if (empty($_POST['name'])) {
        $errors['name'][] = 'required';
        $err_msg = true;
    }
    if (empty($_POST['message'])) {
        $errors['message'][] = 'required';
        $err_msg = true;
    }

    if (!validate_email($_POST['email'])) {
        $errors['email'][] = 'email';
        $err_msg = true;
    }
    if (searchUserByEmail($link, $_POST['email'])['email']) {
        $err_msg = true;
        $errors['email'][] = 'email_not_found';
    }

    if (!isset($_FILES['file']) || empty($_FILES['file']['name'])) {
        $errors['file'][] = 'required';

    } else {
        $finfo = finfo_open(FILEINFO_MIME_TYPE);
        $file_type = finfo_file($finfo, $_FILES['file']['tmp_name']);
        if (! in_array( $file_type, ["image/gif", "image/jpeg", "image/png"] )) {
            $errors['file'][] = 'required';

        }
        if (!move_uploaded_file($_FILES['file']['tmp_name'], getFilePath($_FILES['file']['name'], true)) || $_FILES['file']['error']) {
            $errors['file'][] = 'file_not_uploaded';

        }
    }
    $user['email'] = htmlspecialchars($_POST['email']);
    $user['password'] = $_POST['password'];
    $user['name'] = htmlspecialchars($_POST['name']);
    $user['message'] = htmlspecialchars($_POST['message']);
    $user['file'] = getFilePath($_FILES['file']['name']);
    $user['expire'] = strtotime('now');


    if (!$err_msg) {
        $users_sql = "INSERT INTO users (register, email, name, password, avatar, contacts) VALUES (?, ?, ?, ?, ?, ?)";
        $passhash = password_hash($user['password'], PASSWORD_DEFAULT);
        $data_sql = [$user['expire'], $user['email'], $user['name'], $passhash, $user['file'], $user['message']];

        $res = db_get_prepare_stmt($link, $users_sql, $data_sql);
        $mysqlli_result = mysqli_stmt_execute($res);

        $user['id'] = mysqli_insert_id($link);

        $_SESSION['user'] = $user;
        header("Location: index.php");

    } else {
        $page__content = renderTemplate('templates/sign-up.php', ['categories' => $categories, 'errors' => $errors, 'err_msg' => $err_msg, 'error_messages' => $error_messages]);
    }

} else {
    $page__content = renderTemplate('templates/sign-up.php', ['categories' => $categories, 'errors' => $errors, 'err_msg' => $err_msg, 'error_messages' => $error_messages]);
}

$page__layout = renderTemplate('templates/layout.php', ['categories' => $categories, 'page__content' => $page__content, 'title' => 'Yeticave, Регистрация', 'authorizedUser' => $authorizedUser]);
print($page__layout);