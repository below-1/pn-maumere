<?php

namespace App\Controllers;
use App\Models\MediaModel;
use App\Models\SidangModel;
use App\Entities\Media;
use App\Entities\Sidang;

class Home extends BaseController {

	public function index() {
    $mediaModel = new MediaModel();
    $sidangModel = new SidangModel();

    // Carousels
    $carousels = $mediaModel->builder()
      ->where("'carousel' = any(tags)")
      ->get()
      ->getCustomResultObject('App\Entities\Media');

    $externalWebs = $mediaModel->builder()
      ->where("'external-web' = any(tags)")
      ->limit(10)
      ->get()
      ->getCustomResultObject('App\Entities\Media');

    $zis = $mediaModel->builder()
      ->where("'zona-integritas' = any(tags)")
      ->get()
      ->getCustomResultObject('App\Entities\Media');

    $infoPubliks = $mediaModel->builder()
      ->where("'zona-integritas' = any(tags)")
      ->get()
      ->getCustomResultObject('App\Entities\Media');

    $sidangs = $sidangModel->builder()
      ->limit(6)
      ->orderBy('waktu desc')
      ->get()
      ->getCustomResultObject('App\Entities\Sidang');

    $data['carousels'] = $carousels;
    $data['externalWebs'] = $externalWebs;
    $data['zis'] = $zis;
    $data['infoPubliks'] = $infoPubliks;
    $data['sidangs'] = $sidangs;
    die($this->input->get('color_id', TRUE));
		return view('pages/client/home', $data);
	}
}

