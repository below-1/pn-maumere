<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\SidangModel;
use App\Entities\Sidang;
use App\Libraries\Paging;

class AdSidang extends BaseController {

    public function index() {
        $page = get_or_default($this->request, 'page', 1);
        $perPage = get_or_default($this->request, 'perPage', 10);
        $model = new SidangModel();
        $builder = $model->builder();
        $totalData = $builder->countAllResults(false);
        $totalPage = $totalData / $perPage;
        $offset = ($page - 1) * $perPage;
        $items = $builder
            ->orderBy('waktu', 'desc')
            ->limit($perPage, $offset)
            ->get()
            ->getCustomResultObject('App\Entities\Sidang');
        $paging = new Paging();
        $pagination = $paging->create($perPage, $page, $totalData, null, 10);

        return view('pages/admin/sidang/list', [
            'items' => $items,
            'pagination' => $pagination
        ]);
    }

    public function create () {
        $payload = $this->request->getPost();
        $payload['waktu'] = $payload['waktu_date'] . ' ' . $payload['waktu_time'];
        $payload['penggugat'] = json_decode($payload['penggugat']);
        $payload['tergugat'] = json_decode($payload['tergugat']);
        $model = new SidangModel();
        $sidang = new Sidang();
        $sidang->fill($payload);
        $model->save($sidang);
        return redirect()->to('/admin/sidang');
    }

    public function create_form () {
        return view('pages/admin/sidang/create');
    }

    public function update ($id) {
        $payload = $this->request->getPost();
        $payload['waktu'] = $payload['waktu_date'] . ' ' . $payload['waktu_time'];
        $payload['penggugat'] = json_decode($payload['penggugat']);
        $payload['tergugat'] = json_decode($payload['tergugat']);
        $model = new SidangModel();
        $sidang = new Sidang();
        $sidang->fill($payload);
        $model->update($id, $sidang);
        return redirect()->to('/admin/sidang');
    }

    public function update_form ($id) {
        $model = new SidangModel();
        $item = $model->find($id);
        return view('pages/admin/sidang/update', [
            'item' => $item
        ]);
    }

    public function remove ($id) {

    }

}
