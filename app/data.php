<?php

$categories = [
[
  'id' => 0,
  'name' => "Доски и лыжи",
  'cssClass' => 'boards'
],
[
  'id' => 1,
  'name' => "Крепления",
  'cssClass' => 'attachment'
],
[
  'id' => 2,
  'name' => "Ботинки",
  'cssClass' => 'boots'
],
[
  'id' => 3,
  'name' => "Одежда",
  'cssClass' => 'clothing'
],
[
  'id' => 4,
  'name' => "Инструменты",
  'cssClass' => 'tools'
],
[
  'id' => 5,
  'name' => "Разное",
  'cssClass' => 'other'
]
];

$lots__list = [
[
   'id' => 0,
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
   'id' => 1,
   'lot_name' => 'DC Ply Mens 2016/2017 Snowboard',
   'lot_category' => 1,
   'lot_price' => '159999',
   'lot_url' => 'img/lot-2.jpg',
   'expire' => strtotime( '+50 minutes' ),
   'description' => ''
],
[
    'id' => 2,
   'lot_name' => 'Крепления Union Contact Pro 2015 года размер L/XL',
   'lot_category' => 2,
   'lot_price' => '8000',
   'lot_url' => 'img/lot-3.jpg',
   'expire' => strtotime( '+2 days' ),
   'description' => ''
],
[
   'id' => 3,
   'lot_name' => 'Ботинки для сноуборда DC Mutiny Charocal',
   'lot_category' => 3,
   'lot_price' => '10999',
   'lot_url' => 'img/lot-4.jpg',
   'expire' => strtotime( '+3 hours' ),
   'description' => ''
],
[
   'id' => 4,
   'lot_name' => 'Куртка для сноуборда DC Mutiny Charocal',
   'lot_category' => 4,
   'lot_price' => '7500',
   'lot_url' => 'img/lot-5.jpg',
   'expire' => strtotime( '+50 minutes' ),
   'description' => ''
],
[
   'id' => 5,
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



