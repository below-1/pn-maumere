<?php

namespace App\Controllers;
use App\Models\ArticleModel;
use App\Models\MediaModel;
use App\Models\SidangModel;
use App\Entities\Media;
use App\Entities\Sidang;
use App\Entities\Article;
use App\Libraries\Common;

class Home extends BaseController {

	public function index() {
    $mediaModel = new MediaModel();
    $sidangModel = new SidangModel();
    $articleModel = new ArticleModel();

    // Carousels
    $carousels = $mediaModel->builder()
      ->where("'carousel' = any(tags)")
      ->get()
      ->getCustomResultObject('App\Entities\Media');

    $zis = $mediaModel->builder()
      ->where("'zona-integritas' = any(tags)")
      ->get()
      ->getCustomResultObject('App\Entities\Media');

    $infoPubliks = $mediaModel->builder()
      ->where("'info-publik' = any(tags)")
      ->get()
      ->getCustomResultObject('App\Entities\Media');

    $sidangs = $sidangModel->builder()
      ->limit(15)
      ->orderBy('waktu desc')
      ->get()
      ->getCustomResultObject('App\Entities\Sidang');

    $news = $articleModel->builder()
      ->limit(6)
      ->orderBy('created_at desc')
      ->get()
      ->getCustomResultObject('App\Entities\Article');

    $common = new Common();

    $data['carousels'] = $carousels;
    $data['zis'] = $zis;
    $data['infoPubliks'] = $infoPubliks;
    $data['sidangs'] = $sidangs;
    $data['news'] = $news;
    $data['commons'] = $common->getData();
		return view('pages/client/home', $data);
	}
}

