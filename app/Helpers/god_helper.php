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