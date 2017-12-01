<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/app/init.php');
session_destroy();

header("Location: /index.php");


