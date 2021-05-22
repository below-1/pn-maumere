<?php

namespace App\Libraries;

class Paging {

  public function create ($perPage, $page, $totalData, $url = null, $nShow = 10) {
    $currentUrl = is_null($url) ? current_url() : $url;
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
    $links = array_map(function ($i) use ($currentUrl, $perPage) {
      $link = (object) [
        'page' => $i,
        'url' => $currentUrl . '?page=' . $i . '&perPage=' . $perPage
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