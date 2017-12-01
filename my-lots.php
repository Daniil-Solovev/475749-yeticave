<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/app/init.php');

$page__content = renderTemplate('templates/my-lots.php', ['categories' => $categories]);
$page__layout = renderTemplate('templates/layout.php', ['page__content' => $page__content, 'title' => 'Yeticave, мои лоты', 'categories' => $categories, 'authorizedUser' => $authorizedUser]);
print($page__layout);