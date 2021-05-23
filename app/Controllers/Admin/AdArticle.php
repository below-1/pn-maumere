<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\ArticleModel;
use App\Entities\Article;
use App\Libraries\Paging;
use App\Libraries\MediaBuilder;



class AdArticle extends BaseController {

  protected $tags = array(
    array(
      'name' => 'news',
      'label' => 'berita'
    ),
    array(
      'name' => 'pengumuman',
      'label' => 'pengumuman'
    ),
    array(
      'name' => 'page',
      'label' => 'halaman'
    ),
    array(
      'name' => 'misc',
      'label' => 'lain - lain'
    )
  );

  public function index() {
    $model = new ArticleModel();
    $tags = get_or_default($this->request, 'tags[]', []);
    $page = get_or_default($this->request, 'page', 1);
    $perPage = get_or_default($this->request, 'perPage', 10);
    $offset = ($page - 1) * $perPage;
    // die(json_encode($tags));

    $builder = $model->builder();
    $stringTags = null;
    $qsNewDefaultTags = '';
    if (count($tags) > 0) {
      $stringTags = pg_array($tags);
      $qsNewDefaultTags = http_build_query([ 'tags' => $tags ]);
      $builder = $builder->where("$stringTags <@ \"tags\"", null, false);
    }
    $items = $builder
      ->limit($perPage, $offset)
      ->get()
      ->getCustomResultObject('App\Entities\Article');
    $totalData = $builder->countAllResults();
    $totalPage = $totalData / $perPage;
    $paging = new Paging();
    $meta = $paging->create($perPage, $page, $totalData, null, 10);
    // die('here');
    $data = [
        'items' => $items,
        'pagination' => $meta,
        'tags' => $tags,
        'options_tags' => $this->map_selected_tags($tags),
        'qsNewDefaultTags' => $qsNewDefaultTags
    ];
    return view('pages/admin/article/list', $data);
  }

  public function create () {
    $tags = $this->request->getVar('tags');
    $tags = '{' . implode(',', $tags) . '}';
    $file = $this->request->getFile('avatar');
    $content = $this->request->getVar('content');
    $description = $this->request->getVar('description');
    $title = $this->request->getVar('title');
    $slug = url_title($title, '-', TRUE);

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
      'tags' => $tags,
      'avatar' => $url
    ];
    $model->save($payload);
    return redirect()->to('/admin/article');
  }

  public function create_form () {
    $selected_tags = get_or_default($this->request, 'tags[]', []);
    return view('pages/admin/article/create', [
      'options_tags' => $this->map_selected_tags($selected_tags)
    ]);
  }

  public function update ($id) {

  }

  public function update_form ($id) {

  }

  public function remove ($id) {
    
  }

  protected function map_selected_tags ($tags) {
    return array_map(function ($dtag) use ($tags) {
      $selected = in_array($dtag['name'], $tags);
      return array_merge(
        [ 'selected' => $selected ], 
        $dtag
      );
    }, $this->tags);
  }

}
