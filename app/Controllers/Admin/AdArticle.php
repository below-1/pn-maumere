<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\ArticleModel;
use App\Entities\Article;
use App\Libraries\Paging;
use App\Libraries\MediaBuilder;

class AdArticle extends BaseController {

  public function index() {
    $model = new ArticleModel();
    $tag = $this->request->getVar('tag');
    $page = $this->request->getVar('page');
    $page = is_null($page) ? 1 : $page;
    $perPage = $this->request->getVar('perPage');
    $perPage = is_null($perPage) ? 10 : $perPage;
    $totalData = $model->builder()
      ->where("'$tag' = any(tags)")
      ->countAllResults();
    $totalPage = $totalData / $perPage;
    $offset = ($page - 1) * $perPage;
    $items = $model->builder()
      ->where("'$tag' = any(tags)")
      ->limit($perPage, $offset)
      ->get()
      ->getCustomResultObject('App\Entities\Article');
    $paging = new Paging();
    $meta = $paging->create($perPage, $page, $totalData, null, 10);
    // die('here');
    $data = [
        'items' => $items,
        'pagination' => $meta,
        'tag' => $tag
    ];
    return view('pages/admin/article/list', $data);
  }

  public function create () {
    $tag = $this->request->getVar('tag');
    $file = $this->request->getFile('avatar');
    $content = $this->request->getVar('content');
    $description = $this->request->getVar('description');
    $title = $this->request->getVar('title');
    $slug = url_title($title, '-', TRUE);
    // die($slug);

    if (!$file->isValid()) {
      throw new \RuntimeException($file->getErrorString().'('.$file->getError().')');
    }

    $newName = $file->getRandomName();
    $newPath = implode(
      DIRECTORY_SEPARATOR, 
      [ ROOTPATH, 'public', 'uploads' ]);
    $file->move($newPath, $newName);
    $url = '/' . implode('/', [ 'uploads', $newName ]);

    $model = new ArticleModel();
    $payload = [
      'title' => $title,
      'slug' => $slug,
      'description' => $description,
      'content' => json_encode([
        'type' => 'html',
        'value' => $content
      ]),
      'tags' => "{ $tag }",
      'avatar' => $url
    ];
    $model->save($payload);
    return redirect()->to('/admin/article?tag=' . $tag);
  }

  public function create_form () {
    $tag = $this->request->getVar('tag');
    return view('pages/admin/article/create', [
      'tag' => $tag
    ]);
  }

  public function update ($id) {

  }

  public function update_form ($id) {

  }

  public function remove ($id) {
    
  }

}
