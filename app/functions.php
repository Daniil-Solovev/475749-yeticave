<?php

function renderTemplate($path, $data) {
   if(!file_exists($path)) {
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

function getBetsByUserId($userId) {
    $result = [];
    if (isset($_COOKIE['bets'])) {
        $betsList = json_decode($_COOKIE['bets'], true);
        foreach ($betsList as $item) {
            if ($item['name'] == $userId){
                $result = $item['lot_id'];
            }
        }
    }
    return $result;
}

function makeBet($bet) {
    $betList = json_decode($_COOKIE['bets'], true);
    $betKey = $bet['userId'] . ':' . $bet['lotId'];
    if ( isset( $betList[$betKey] ) ) {
        return;
    }
    $betList[$betKey] = $bet;
}





