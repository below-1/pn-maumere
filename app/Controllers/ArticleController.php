<?php

namespace App\Controllers;
use App\Models\ArticleModel;
use App\Entities\Article;
use App\Libraries\Paging;

class ArticleController extends BaseController {

    public function index () {
        $tag = $this->request->getVar('tag');
        $perPage = $this->request->getVar('perPage');
        $perPage = is_null($perPage) ? 10 : $perPage;
        $page = $this->request->getVar('page');
        $page = is_null($page) ? 1 : $page;
        $viewMode = $this->request->getVar('viewMode');
        $viewMode = is_null($viewMode) ? 'grid' : $viewMode;

        $model = new ArticleModel();
        $items = $model->builder()
            ->where("'$tag' = any(tags)")
            ->get()
            ->getCustomResultObject('App\Entities\Article');
        $totalData = $model->builder()
            ->where("'$tag' = any(tags)")
            ->countAllResults();
        $paging = new Paging();
        $meta = $paging->create($perPage, $page, $totalData, null, 10);
        $data = [
            'items' => $items,
            'pagination' => $meta,
            'viewMode' => $viewMode
        ];
        return view('pages/client/article/list', $data);
    }

    public function show ($id) {
        $model = new ArticleModel();
        $items = $model->builder()
            ->where("id = $id")
            ->limit(1)
            ->get()
            ->getCustomResultObject('App\Entities\Article');
        $item = $items[0];
        return view('pages/client/article/detail', [
            'item' => $item
        ]);
    }

    public function showSlug ($slug) {
        $model = new ArticleModel();
        $items = $model->builder()
            ->where("slug = '$slug'")
            ->limit(1)
            ->orderBy('created_at', 'desc')
            ->get()
            ->getCustomResultObject('App\Entities\Article');
        $item = $items[0];
        return view('pages/client/article/detail', [
            'item' => $item
        ]);
    }

}