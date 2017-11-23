<?php
require_once('templates/data.php');
require_once('functions.php');

function validate_int($arg) {
    return filter_var($arg, FILTER_VALIDATE_INT);
}

$required = [
    'lot-name',
    'category',
    'message',
    'lot-rate',
    'lot-step',
    'lot-date'
];

$errors = [
    'lot-name' => null,
    'category' => null,
    'message' => null,
    'lot-rate' => null,
    'lot-step' => null,
    'lot-date' => null
];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    foreach ($_POST as $key => $value) {
        if (in_array($key, $required) && empty($value)) {
            $errors[] = $key;
        }
        if ()
    }
}
