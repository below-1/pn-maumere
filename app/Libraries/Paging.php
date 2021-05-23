<?php

namespace App\Libraries;

class Paging {

  public function create ($perPage, $page, $totalData, $url = null, $nShow = 10) {
    $currentUrl = is_null($url) ? current_url() : $url;
    $qs = [];
    $filteredQs = [];
    parse_str($_SERVER['QUERY_STRING'], $qs);
    // Remove perPage and page
    foreach ($qs as $key => $val) {
      if ($key == 'page' || $key == 'perPage') {
        continue;
      }
      $filteredQs[$key] = $val;
    }
    // Calculate what page the pagination buttons should start with.
    $totalPage = ceil($totalData / $perPage);
    $start = (intdiv($page, $nShow) * $nShow) + 1;
    $end = $start + $nShow;
    $end = $end > $totalPage ? $totalPage : $end;
    // echo intdiv($totalData, $perPage) . '<br/>';
    // echo $perPage . '<br/>';
    // echo $totalPage . '<br/>';
    // echo $start . '<br/>';
    // echo $end . '<br/>';
    // echo $start;
    // die('here');
    $links = array_map(function ($i) use ($currentUrl, $perPage, $filteredQs) {
      $newQs = array_merge(array(
        'page' => $i,
        'perPage' => $perPage
      ), $filteredQs);
      $strQs = http_build_query($newQs);
      $link = (object) [
        'page' => $i,
        'url' => $currentUrl . '?' . $strQs
      ];
      // var_dump($link);
      // echo '<br/>';
      return $link;
    }, range($start, $end));
    // die('here');
    return ((object) [
      'page' => $page,
      'perPage' => $perPage,
      'totalPage' => $totalPage,
      'totalData' => $totalData,
      'links' => $links
    ]);
  }

}