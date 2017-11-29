<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/app/init.php');







$page__content = renderTemplate('templates/sign-up.php', ['categories' => $categories]);
$page__layout = renderTemplate('templates/layout.php', ['page__content' => $page__content, 'title' => 'Yeticave, мои лоты', 'categories' => $categories, 'lot_auth' => $lot_auth]);
print($page__layout);