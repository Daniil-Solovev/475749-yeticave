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
  elseif ($result__form > 1 && $result__form < 24) {
    return $result__form . " часов назад";
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

function searchUserByEmail($email, $users) {
    $result = null;
    foreach ($users as $user) {
        if ($user['email'] == $email) {
            $result = $user;
            break;
        }
    }

    return $result;
}

/**
 * @return array
 */
function getAuthorizedUser() {
    return ( isset( $_SESSION ) && isset( $_SESSION['user'] ) ) ? $_SESSION['user'] : null;
}

/**
 * @param string|int $userId
 * @return array
 */

function getBetsByUserId($userId) {
    $result = [];
    if (isset($_COOKIE['bets'])) {
        $betsList = json_decode($_COOKIE['bets'], true);
        foreach ($betsList as $bet) {
            if ($bet['userId'] == $userId){
                $result[] = $bet;
            }
        }
    }
    return $result;
}

/**
 * @param array $bet
 */
function makeBet(array $bet) {
    $betList = getAllBets();
    $betKey = $bet['userId'] . ':' . $bet['lotId'];
    if ( isset( $betList[$betKey] ) ) {
        return;
    }
    $betList[$betKey] = $bet;
    setcookie('bets', json_encode($betList));
}

/**
 * @return array|mixed
 */
function getAllBets () {
    $betList = [];
    if (isset($_COOKIE['bets'])) {
        $betList = json_decode($_COOKIE['bets'], true);
    }
    return $betList;
}

/**
 * @param string|int $lotId
 * @return array
 */
function getBetsByLot ($lotId) {
    $result= [];
    $betList = getAllBets();
    foreach ($betList as $item) {
        if ($item['lotId'] == $lotId) {
            $result[] = $item;
        }
    }
    return $result;
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

function getUserById ( $id, array $users) {
    $result = null;
    foreach ($users as $user) {
        if ($id == $user['id']) {
            $result = $user['name'];
            break;
        }
    }
    return $result;
};

function getOpenBets ($link) {
    $error = null;
    $sql = "SELECT id, img, lot_name, lot_rate, lot_date, category_id, description, lot_step FROM lot";
    if ($result = mysqli_query($link, $sql)) {
        return mysqli_fetch_all($result, MYSQLI_ASSOC);
    } else {
        $error = mysqli_error($link);
        $page__content = renderTemplate($_SERVER['DOCUMENT_ROOT'] . '/templates/error.php', ['error' => $error]);
        return $page__content;
    }
}

function getCategoryList ($link) {
    $error = null;
    $sql = 'SELECT `id`, `cat_name`, `cssClass` FROM category';
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

function getFilePath( $fileName, $withDocRoot = false ) {
    return ($withDocRoot ? $_SERVER['DOCUMENT_ROOT'] : '') . '/img/' . $fileName;
}