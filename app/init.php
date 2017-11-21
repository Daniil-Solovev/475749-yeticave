<?php
$is_auth = (bool) rand(0, 1);

$user_name = 'Константин';
$user_avatar = 'img/user.jpg';

// устанавливаем часовой пояс в Московское время
date_default_timezone_set('Europe/Moscow');

// временная метка для полночи следующего дня
//$tomorrow = strtotime('tomorrow midnight');

// временная метка для настоящего времени
//$now = strtotime('now');

//$hours = floor(($tomorrow - $now) / 3600 );
//$minutes = floor(($tomorrow - $now) % 3600 / 60);

// далее нужно вычислить оставшееся время до начала следующих суток и записать его в переменную $lot_time_remaining
//$lot_time_remaining = sprintf('%02d', $hours) . ':' . sprintf('%02d', $minutes);
function lot_time_remaining($h, $m) {
    $lot_time_remaining = sprintf('%02d', $h) . ':' . sprintf('%02d', $m);
    return $lot_time_remaining;
}
?>