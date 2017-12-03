<?php

$categories = [
[
  'id' => 1,
  'name' => "Доски и лыжи",
  'cssClass' => 'boards'
],
[
  'id' => 2,
  'name' => "Крепления",
  'cssClass' => 'attachment'
],
[
  'id' => 3,
  'name' => "Ботинки",
  'cssClass' => 'boots'
],
[
  'id' => 4,
  'name' => "Одежда",
  'cssClass' => 'clothing'
],
[
  'id' => 5,
  'name' => "Инструменты",
  'cssClass' => 'tools'
],
[
  'id' => 6,
  'name' => "Разное",
  'cssClass' => 'other'
]
];

$lots__list = [
[
   'lot_name' => '2014 Rossignol District Snowboard',
   'lot_category' => 1,
   'lot_price' => '10999',
   'lot_url' => 'img/lot-1.jpg',
   'expire' => strtotime( '+3 hours 45 minutes' ),
   'description' => 'Легкий маневренный сноуборд, готовый дать жару в любом парке, растопив снег мощным щелчкоми четкими дугами. 
   Стекловолокно Bi-Ax, уложенное в двух направлениях, наделяет этот снаряд отличной гибкостью и отзывчивостью, 
   а симметричная геометрия в сочетании с классическим прогибом кэмбер позволит уверенно держать высокие скорости. 
   А если к концу катального дня сил совсем не останется, просто посмотрите на Вашу доску и улыбнитесь, крутая графика 
   от Шона Кливера еще никого не оставляла равнодушным.'
],
[
   'lot_name' => 'DC Ply Mens 2016/2017 Snowboard',
   'lot_category' => 1,
   'lot_price' => '159999',
   'lot_url' => 'img/lot-2.jpg',
   'expire' => strtotime( '+50 minutes' ),
   'description' => ''
],
[
   'lot_name' => 'Крепления Union Contact Pro 2015 года размер L/XL',
   'lot_category' => 2,
   'lot_price' => '8000',
   'lot_url' => 'img/lot-3.jpg',
   'expire' => strtotime( '+2 days' ),
   'description' => ''
],
[
   'lot_name' => 'Ботинки для сноуборда DC Mutiny Charocal',
   'lot_category' => 3,
   'lot_price' => '10999',
   'lot_url' => 'img/lot-4.jpg',
   'expire' => strtotime( '+3 hours' ),
   'description' => ''
],
[
   'lot_name' => 'Куртка для сноуборда DC Mutiny Charocal',
   'lot_category' => 4,
   'lot_price' => '7500',
   'lot_url' => 'img/lot-5.jpg',
   'expire' => strtotime( '+50 minutes' ),
   'description' => ''
],
[
   'lot_name' => 'Маска Oakley Canopy',
   'lot_category' => 6,
   'lot_price' => '5400',
   'lot_url' => 'img/lot-6.jpg',
   'expire' => strtotime( '+2 days' ),
   'description' => ''
],
];

$bets = [
   [ 'name' => 'Иван', 'price' => 11500, 'ts' => strtotime( '-' . rand( 1, 50 ) . ' minute' ) ],
   [ 'name' => 'Константин', 'price' => 11000, 'ts' => strtotime( '-' . rand( 1, 18 ) . ' hour' ) ],
   [ 'name' => 'Евгений', 'price' => 10500, 'ts' => strtotime( '-' . rand( 25, 50 ) . ' hour' ) ],
   [ 'name' => 'Семён', 'price' => 10000, 'ts' => strtotime( 'last week' ) ]
];

$users = [
    [
        'id' => 1,
        'email' => 'ignat.v@gmail.com',
        'name' => 'Игнат',
        'password' => '$2y$10$OqvsKHQwr0Wk6FMZDoHo1uHoXd4UdxJG/5UDtUiie00XaxMHrW8ka'
    ],
    [
        'id' => 2,
        'email' => 'kitty_93@li.ru',
        'name' => 'Леночка',
        'password' => '$2y$10$bWtSjUhwgggtxrnJ7rxmIe63ABubHQs0AS0hgnOo41IEdMHkYoSVa'
    ],
    [
        'id' => 3,
        'email' => 'warrior07@mail.ru',
        'name' => 'Руслан',
        'password' => '$2y$10$2OxpEH7narYpkOT1H5cApezuzh10tZEEQ2axgFOaKW.55LxIJBgWW'
    ]
];

