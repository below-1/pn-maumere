<?php

namespace App\Controllers\Admin;

use App\Models\MediaModel;
use App\Entities\Media;
use App\Controllers\BaseController;
use App\Libraries\Paging;
use App\Libraries\MediaBuilder;

function choose_form ($type) {
  if ($type == 'carousel') {
    return (object)([
      'name' => $type,
      'label' => 'Carousel',
      'preTitle' => 'Media',
      'title' => 'Carousel',
      'action' => '/admin/media/picture/carousel',
      'new_form_url' => '/admin/media/picture/carousel/new'
  ]);
} else {
    throw new Exception('unknown $type: ' . $type);
}
}

class AdMedia extends BaseController {

    public function list ($tag) {
        $mediaModel = new MediaModel();

        $page = $this->request->getVar('page');
        $perPage = $this->request->getVar('perPage');

        $totalData = $mediaModel->builder()
            ->where("'$tag' = any(tags)")
            ->countAllResults();
        $totalPage = $totalData / $perPage;
        $offset = ($page - 1) * $perPage;

        $items = $mediaModel->builder()
            ->where("'$tag' = any(tags)")
            ->limit($perPage, $offset)
            ->get()
            ->getCustomResultObject('App\Entities\Media');

        $paging = new Paging();
        $meta = $paging->create($perPage, $page, $totalData, null, 10);
        // die('here');
        $data = [
            'pageMeta' => choose_form($tag),
            'items' => $items,
            'pagination' => $meta
        ];
        return view('pages/admin/media/list_' . $tag, $data);
    }

    public function create ($type, $tag) {
        $file = $this->request->getFile('file');

        if (!$file->isValid()) {
            throw new \RuntimeException($file->getErrorString().'('.$file->getError().')');
        }

        $newName = $file->getRandomName();
        $newPath = implode(
          DIRECTORY_SEPARATOR, 
          [ ROOTPATH, 'public', 'uploads' ]);
        $file->move($newPath, $newName);
        $url = '/' . implode('/', [ 'uploads', $newName ]);

        $mediaBuilder = new MediaBuilder();
        $mediaModel = new MediaModel();

        $payload = $this->request->getPost();
        $payload['url'] = $url;
        $mediaModel->save($mediaBuilder->build($tag, $payload));
        return redirect()->route('admin_home');
    }

    public function create_form ($type, $tag) {
        $data['pageMeta'] = choose_form($tag);
        return view('pages/admin/media/' . 'create_' . $tag, $data);
    }

    public function update ($id) {

    }

    public function update_form ($tag, $id) {
        $mediaModel = new MediaModel();
        $temps = $mediaModel->builder()
            ->where("id = $id")
            ->get()
            ->getCustomResultObject('App\Entities\Media');
        $item = $temps[0];
        $data['id'] = $id;
        $data['item'] = $item;
        return view('pages/admin/media/' . 'update_' . $tag, $data);
    }

    public function remove ($id) {

    }

    public function change_file ($id) {

    }

}
