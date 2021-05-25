<?php

function get_or_default($request, $name, $default) {
  $result = $request->getVar($name);
  return is_null($result) ? $default : $result;
}

function pg_array ($arr, $type = 'text') {
  $wrapped = array_map(function ($x) use ($type) {
    $result = null;
    if ($type == 'text') {
      $result = "'" . $x . "'";
    } else {
      $result = $x;
    }
    return $result;
  }, $arr);
  return 'array[' . implode(',', $wrapped) . ']';
}

function starts_with ($xs, $ys) {
  return substr($xs, 0, strlen($ys)) == $ys;
}

function str_contains($haystack, $needle) {
  return $needle !== '' && mb_strpos($haystack, $needle) !== false;
}