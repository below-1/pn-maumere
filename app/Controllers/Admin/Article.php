<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class Article extends BaseController {

  public function index() {
    return view('pages/admin/article/list', $data);
  }

  public function create () {

  }

  public function create_form () {

  }

  public function update ($id) {

  }

  public function update_form ($id) {

  }

  public function remove ($id) {
    
  }

}
