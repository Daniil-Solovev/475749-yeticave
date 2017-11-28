<?php
header("Location: index.php");
unset($_COOKIE['name']);
setcookie('name', '', time() - 3600);
