<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/app/init.php');

$categories = getCategoriesList ($link);

$cur_page = $_GET['page'] ?? 1;
$page_items = 3;

$res= mysqli_query($link, "SELECT COUNT(*) as cnt FROM lots");
$items_count = mysqli_fetch_assoc($res)['cnt'];

$pages_count = ceil($items_count / $page_items);
$offset = ($cur_page - 1) * $page_items;

$pages = range(1, $pages_count);

$sql = 'SELECT id, img, lot_name, lot_rate, lot_date, category_id, description, lot_step FROM lots '
    . 'ORDER BY id DESC LIMIT ' . $page_items . ' OFFSET ' . $offset;
if ($result = mysqli_query($link, $sql)) {
    $openLots = mysqli_fetch_all($result, MYSQLI_ASSOC);
    $page__content = renderTemplate('templates/main.php', ['cur_page' => $cur_page, 'pages' => $pages, 'pages_count' => $pages_count, 'openLots' => $openLots, 'categories' => $categories]);
} else {
    $error = mysqli_error($link);
    $page__content = renderTemplate($_SERVER['DOCUMENT_ROOT'] . '/templates/error.php', ['error' => $error]);
}

$page__layout = renderTemplate('templates/layout.php', ['categories' => $categories, 'page__content' => $page__content, 'title' => 'Yeticave', 'authorizedUser' => $authorizedUser]);
print($page__layout);
