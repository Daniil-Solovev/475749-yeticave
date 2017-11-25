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
   'lot_url' => 'img/lot-1.jpg',
   'lot_time_hours' => rand(0, 24),
   'lot_time_min' => rand(0, 60)
  ],
  [
   'lot_name' => 'DC Ply Mens 2016/2017 Snowboard',
   'lot_category' => $categories[0],
   'lot_price' => '159999',
   'lot_url' => 'img/lot-2.jpg',
   'lot_time_hours' => rand(0, 24),
   'lot_time_min' => rand(0, 60)
  ],
  [
   'lot_name' => 'Крепления Union Contact Pro 2015 года размер L/XL',
   'lot_category' => $categories[1],
   'lot_price' => '8000',
   'lot_url' => 'img/lot-3.jpg',
   'lot_time_hours' => rand(0, 24),
   'lot_time_min' => rand(0, 60)
  ],
  [
   'lot_name' => 'Ботинки для сноуборда DC Mutiny Charocal',
   'lot_category' => $categories[2],
   'lot_price' => '10999',
   'lot_url' => 'img/lot-4.jpg',
   'lot_time_hours' => rand(0, 24),
   'lot_time_min' => rand(0, 60)
  ],
  [
   'lot_name' => 'Куртка для сноуборда DC Mutiny Charocal',
   'lot_category' => $categories[3],
   'lot_price' => '7500',
   'lot_url' => 'img/lot-5.jpg',
   'lot_time_hours' => rand(0, 24),
   'lot_time_min' => rand(0, 60)
  ],
  [
   'lot_name' => 'Маска Oakley Canopy',
   'lot_category' => $categories[5],
   'lot_price' => '5400',
   'lot_url' => 'img/lot-6.jpg',
   'lot_time_hours' => rand(0, 24),
   'lot_time_min' => rand(0, 60)
  ]
];

$bets = [
    ['name' => 'Иван', 'price' => 11500, 'ts' => strtotime('-' . rand(1, 50) .' minute')],
    ['name' => 'Константин', 'price' => 11000, 'ts' => strtotime('-' . rand(1, 18) .' hour')],
    ['name' => 'Евгений', 'price' => 10500, 'ts' => strtotime('-' . rand(25, 50) .' hour')],
    ['name' => 'Семён', 'price' => 10000, 'ts' => strtotime('last week')]
];

?>
