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
?>
