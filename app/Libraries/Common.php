<?php

namespace App\Libraries;

use App\Models\MediaModel;

class Common {
  public function getData () {
    $mediaModel = new MediaModel();
    $externalWebs = $mediaModel->builder()
      ->where("'external-web' = any(tags)")
      ->limit(10)
      ->get()
      ->getCustomResultObject('App\Entities\Media');

    $roleModels = $mediaModel->builder()
      ->where("'agen-perubahan' = any(tags)")
      ->get()
      ->getCustomResultObject('App\Entities\Media');

    $relatedLinks = $mediaModel->builder()
      ->where("'related-link' = any(tags)")
      ->get()
      ->getCustomResultObject('App\Entities\Media');

    $brochures = $mediaModel->builder()
      ->where("'brochure' = any(tags)")
      ->get()
      ->getCustomResultObject('App\Entities\Media');

    return (object) [
      'brochures' => $brochures,
      'roleModels' => $roleModels,
      'relatedLinks' => $relatedLinks,
      'externalWebs' => $externalWebs
    ];
  }
}