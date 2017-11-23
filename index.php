<?php
  require_once('templates/data.php');
  require_once('functions.php');
  require_once('app/init.php');

  $page__content = renderTemplate('templates/main.php', ['categories' => $categories, 'lots__list' => $lots__list]);
  $page__layout = renderTemplate('templates/layout.php', ['page__content' => $page__content, 'title' => 'Yeticave']);
  print($page__layout);
