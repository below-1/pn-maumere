<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class Home extends BaseController {

  public function index() {
    return view('pages/admin/home');
  }

  // Misc routing
  public function upload_file_form () {
    $action = $this->request->getVar('action');
    $title = $this->request->getVar('title');
    return view('pages/admin/upload_file', [
      'action' => $action,
      'title' => $title
    ]);
  }

}
