<?php

function renderTemplate($path, $data) {
   if(!file_exists($path = $_SERVER['DOCUMENT_ROOT'] . '/' . $path)) {
       return "";
   }
   ob_start();
   extract($data, EXTR_SKIP);
   require_once($path);
   return ob_get_clean();
}

function lot_time_remaining($lotTimestamp) {
   $diff = $lotTimestamp - time();
   $h = floor( $diff / ( 60 * 60 ) );
   $m = floor( ( $diff % ( 60 * 60 ) ) / 60 );
   $lot_time_remaining = sprintf('%02d', $h) . ':' . sprintf('%02d', $m);
   return $lot_time_remaining;
 }

function time_left($var) {
  $result = time() - $var;
  $result__form = floor((time() - $var) / 3600);
  if ($result__form > 24) {
    return date('d.m.y', $var) . " в " . date('H:i', $var);
  }
  elseif ($result__form >= 1 && $result__form < 24) {
    return $result__form . " часа(ов) назад";
  }
  return floor($result / 60) . " минут назад";
}


/**
 * @param int $id
 * @param array $categories
 * @return null|array
 */
function getCategoryById($id, $categories) {
    foreach ($categories as $key => $category) {
        if ($category['id'] === $id)
            return $category;
    }
    return array(
        'id' => -1,
        'name' => "",
        'cssClass' => ''
    );
}

function searchUserByEmail($link, $email) {
    $sql = 'SELECT id, register, email, name, password, avatar, contacts FROM users WHERE email = ?';
    $sql_data = [$email];
    $res = db_get_prepare_stmt($link, $sql, $sql_data);
    mysqli_stmt_execute($res);
    mysqli_stmt_bind_result($res ,$id, $register, $mail, $name, $password, $avatar, $contacts);

    $user['id'] = null;
    $user['register'] = null;
    $user['email'] = null;
    $user['name'] = null;
    $user['password'] = null;
    $user['avatar'] = null;
    $user['contacts'] = null;

    while (mysqli_stmt_fetch($res)) {
        $user['id'] = $id;
        $user['register'] = $register;
        $user['email'] = $mail;
        $user['name'] = $name;
        $user['password'] = $password;
        $user['avatar'] = $avatar;
        $user['contacts'] = $contacts;
    }
    return $user;
}

/**
 * @return array
 */
function getAuthorizedUser() {
    return ( isset( $_SESSION ) && isset( $_SESSION['user'] ) ) ? $_SESSION['user'] : null;
}

/**
 * @param int|string $id
 * @param array $lot_list
 * @return null|array
 */
function getLotById ($id, $lot_list) {
    $lot = null;
    foreach ($lot_list as $item) {
        if ($item['id'] == $id) {
            $lot = $item;
            break;
        }
    }
    return $lot;
}

function getUserById ($link, $id) {
    $sql = "SELECT id, email, name FROM users WHERE id=" . $id;
    $sql_res = mysqli_query($link, $sql);
    $result = mysqli_fetch_all($sql_res, MYSQLI_ASSOC);
    foreach ($result as $user) {
        if ($id == $user['id']) {
            $getUser = $user['name'];
            break;
        }
    }
    return $getUser;
};

function getOpenLots ($link) {
    $error = null;
    $sql = "SELECT id, img, lot_name, lot_rate, lot_date, category_id, description, lot_step, author FROM lots";
    if ($result = mysqli_query($link, $sql)) {
        return mysqli_fetch_all($result, MYSQLI_ASSOC);
    } else {
        $error = mysqli_error($link);
        $page__content = renderTemplate($_SERVER['DOCUMENT_ROOT'] . '/templates/error.php', ['error' => $error]);
        return $page__content;
    }
}

function getCategoriesList ($link) {
    $error = null;
    $sql = 'SELECT `id`, `cat_name`, `cssClass` FROM categories';
    if ($result = mysqli_query($link, $sql)) {
        return mysqli_fetch_all($result, MYSQLI_ASSOC);
    } else {
        $error = mysqli_error($link);
        $page__content = renderTemplate($_SERVER['DOCUMENT_ROOT'] . '/templates/error.php', ['error' => $error]);
        return $page__content;
    }
}

function validate_int($arg) {
    return filter_var($arg, FILTER_VALIDATE_INT);
}

function validate_email($arg) {
    return filter_var($arg, FILTER_VALIDATE_EMAIL);
}

function getFilePath($fileName, $withDocRoot = false) {
    return ($withDocRoot ? $_SERVER['DOCUMENT_ROOT'] : '') . '/img/' . $fileName;
}

function getMyBets($link) {
    $sql = "SELECT date, sum, user_id, lot_id FROM bets";
    $sql_query = mysqli_query($link, $sql);
    $result = mysqli_fetch_all($sql_query, MYSQLI_ASSOC);

    return $result;
}

function checkValidBet ($array, $id, $lot) {
    $result = true;
    foreach ($array as $item) {
        if ($item['user_id'] == $id && $item['lot_id'] == (int)$lot) {
            $result =  false;
        } else {
            $result = true;
        }
    }
    return $result;
}

function validateDate ($date) {
    if (strtotime($date) > time()) {
        return false;
    } else {
        return true;
    }
}