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

  public function __construct () {
    $this->model = new ArticleModel();
  }

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
    $totalData = $builder->countAllResults(false);
    $items = $builder
      ->limit($perPage, $offset)
      ->get()
      ->getCustomResultObject('App\Entities\Article');

    // assign formatted date 
    $item = array_map(function ($item) {
      $item->formatted_created_at = $item->created_at->toLocalizedString('HH:mm MMMM d, yyy');
      $item->humanized_created_at = $item->created_at->humanize();
      return $item;
    }, $items);

    $totalPage = $totalData / $perPage;
    $paging = new Paging();
    $meta = $paging->create($perPage, $page, $totalData, null, 10);
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

  public function update_content ($id) {
    $tags = $this->request->getVar('tags');
    $title = $this->request->getVar('title');
    $content = $this->request->getVar('content');
    $description = $this->request->getVar('description');
    $slug = url_title($title, '-', TRUE);

    $article = $this->model->find($id);
    $article->tags = $tags;
    $article->slug = $slug;
    $article->description = $description;
    $article->content = $content;

    $model = new ArticleModel();
    $model->update($id, $article);
    return redirect()->to('/admin/article');
  }

  public function update_content_form ($id) {
    $article = $this->model->find($id);
    return view('/pages/admin/article/update_content', [
      'item' => $article,
      'options_tags' => $this->map_selected_tags($article->tags)
    ]);
  }

  public function remove ($id) {
    
  }

  public function upload_image ($id) {
    $model = new ArticleModel();
    $article = $model->find($id);
    $file = $this->request->getFile('avatar');

    if (!$file->isValid()) {
      throw new \RuntimeException($file->getErrorString().'('.$file->getError().')');
    }

    if (isset($article->avatar) && starts_with($article->avatar, '/')) {
      $avatar = $article->avatar;
      // Remove leading slash;
      $path = substr($article->avatar, 1, strlen($article->avatar));
      $fullPath = ROOTPATH .  'public' . DIRECTORY_SEPARATOR . $path;
      helper('filesystem');
      delete_files($fullPath);
    }
    $newName = $file->getRandomName();
    $newPath = implode(DIRECTORY_SEPARATOR, [ ROOTPATH, 'public', 'uploads' ]);
    $file->move($newPath, $newName);
    $url = '/' . implode('/', [ 'uploads', $newName ]);
    $article->avatar = $url;
    $model->update($id, $article);
    return redirect()->to('/admin/article');
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
