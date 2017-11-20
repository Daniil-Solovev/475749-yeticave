<?php

$categories = [
  [
  'name' => "Доски и лыжи",
  'cssClass' => 'boards'
  ],
  [
  'name' => "Крепления",
  'cssClass' => 'attachment'
  ],
  [
  'name' => "Ботинки",
  'cssClass' => 'boots'
  ],
  [
  'name' => "Одежда",
  'cssClass' => 'clothing'
  ],
  [
  'name' => "Инструменты",
  'cssClass' => 'tools'
  ],
  [
  'name' => "Разное",
  'cssClass' => 'other'
  ]
];

$lots__list = [
  [
    'lot_name' => '2014 Rossignol District Snowboard',
    'lot_category' => $categories[0],
    'lot_price' => '10999',
    'lot_url' => 'img/lot-1.jpg'
  ],
  [
    'lot_name' => 'DC Ply Mens 2016/2017 Snowboard',
    'lot_category' => $categories[0],
    'lot_price' => '159999',
    'lot_url' => 'img/lot-2.jpg'
  ],
  [
    'lot_name' => 'Крепления Union Contact Pro 2015 года размер L/XL',
    'lot_category' => $categories[1],
    'lot_price' => '8000',
    'lot_url' => 'img/lot-3.jpg'
  ],
  [
    'lot_name' => 'Ботинки для сноуборда DC Mutiny Charocal',
    'lot_category' => $categories[2],
    'lot_price' => '10999',
    'lot_url' => 'img/lot-4.jpg'
  ],
  [
    'lot_name' => 'Куртка для сноуборда DC Mutiny Charocal',
    'lot_category' => $categories[3],
    'lot_price' => '7500',
    'lot_url' => 'img/lot-5.jpg'
  ],
  [
    'lot_name' => 'Маска Oakley Canopy',
    'lot_category' => $categories[5],
    'lot_price' => '5400',
    'lot_url' => 'img/lot-6.jpg'
  ]
];

$bets = [
    ['name' => 'Иван', 'price' => 11500, 'ts' => strtotime('-' . rand(1, 50) .' minute')],
    ['name' => 'Константин', 'price' => 11000, 'ts' => strtotime('-' . rand(1, 18) .' hour')],
    ['name' => 'Евгений', 'price' => 10500, 'ts' => strtotime('-' . rand(25, 50) .' hour')],
    ['name' => 'Семён', 'price' => 10000, 'ts' => strtotime('last week')]
];

$is_auth = (bool) rand(0, 1);

$user_name = 'Константин';
$user_avatar = 'img/user.jpg';

// устанавливаем часовой пояс в Московское время
date_default_timezone_set('Europe/Moscow');

// временная метка для полночи следующего дня
$tomorrow = strtotime('tomorrow midnight');

// временная метка для настоящего времени
$now = strtotime('now');

$hours = floor(($tomorrow - $now) / 3600 );
$minutes = floor(($tomorrow - $now) % 3600 / 60);

// далее нужно вычислить оставшееся время до начала следующих суток и записать его в переменную $lot_time_remaining
$lot_time_remaining = sprintf('%02d', $hours) . ':' . sprintf('%02d', $minutes);

?>
