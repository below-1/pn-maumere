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

    protected $tipes = array(
        [ 
            'name' => 'picture', 
            'label' => 'Picture', 
            'icon' => '<svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><line x1="15" y1="8" x2="15.01" y2="8" /><rect x="4" y="4" width="16" height="16" rx="3" /><path d="M4 15l4 -4a3 5 0 0 1 3 0l5 5" /><path d="M14 14l1 -1a3 5 0 0 1 3 0l2 2" /></svg>'
        ],
        [
            'name' => 'video',
            'label' => 'Video',
            'icon' => '<svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M15 10l4.553 -2.276a1 1 0 0 1 1.447 .894v6.764a1 1 0 0 1 -1.447 .894l-4.553 -2.276v-4z" /><rect x="3" y="6" width="12" height="12" rx="2" /></svg>'
        ],
        [
            'name' => 'document',
            'label' => 'Dokumen',
            'icon' => '<svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><rect x="3" y="4" width="18" height="4" rx="2" /><path d="M5 8v10a2 2 0 0 0 2 2h10a2 2 0 0 0 2 -2v-10" /><line x1="10" y1="12" x2="14" y2="12" /></svg>'
        ]
    );
    protected $tags = array(
        [ 'name' => 'carousel', 'label' => 'Carousel'],
        [ 'name' => 'external-web', 'label' => 'Situs Luar' ],
        [ 'name' => 'zona-integritas', 'label' => 'Zona Integritas'],
        [ 'name' =>'agen-perubahan', 'label' => 'Agen Perubahan' ],
        [ 'name' => 'info-publik', 'label' => 'Informasi Publik'],
        [ 'name' => 'hakim-adhoc', 'label' => 'Hakim' ]
    );
    protected $metaPairs = array(
        'picture#carousel' => [
            'name' => 'carousel',
            'label' => 'Carousel',
            'tipe' => 'picture'
        ],
        'picture#external-web' => [
            'name' => 'external-web',
            'label' => 'Situs Terkait',
            'tipe' => 'picture'
        ],
        'picture#zona-integritas' => [
            'name' => 'zona-integritas',
            'label' => 'Zona Integritas',
            'tipe' => 'picture'
        ],
        'picture#agen-perubahan' => [
            'name' => 'agen-perubahan',
            'label' => 'Role Model & Agen Perubahan',
            'tipe' => 'picture'
        ],
        'picture#info-publik' => [
            'name' => 'info-publik',
            'label' => 'Informasi Publik',
            'tipe' => 'picture'
        ],
        'picture#hakim-ad-hoc' => [
            'name' => 'hakim-ad-hoc',
            'label' => 'Hakim',
            'tipe' => 'picture'
        ]
    );

    public function index () {
        $tipe = get_or_default($this->request, 'tipe', null);
        $tipe = $tipe == 'all' ? null : $tipe;
        $tag = get_or_default($this->request, 'tag', null);
        $tag = $tipe == 'all' ? null : $tag;
        $page = get_or_default($this->request, 'page', 1);
        $perPage = get_or_default($this->request, 'perPage', 10);

        $mediaModel = new MediaModel();
        $builder = $mediaModel->builder();

        if (!is_null($tipe)) {
            $builder->where('tipe', $tipe);
        }
        if (!is_null($tag)) {
            $builder->where("'$tag' = any(tags)");
        }

        $totalData = $builder->countAllResults(false);
        $totalPage = $totalData / $perPage;
        $offset = ($page - 1) * $perPage;

        $items = $builder
            ->orderBy('created_at', 'desc')
            ->limit($perPage, $offset)
            ->get()
            ->getCustomResultObject('App\Entities\Media');
        $items = array_map(function ($item) {
            $title = esc('Ganti file media ' . $item->id);
            $item->ui_href = '/admin/upload_file?title=' . $title . '&action=' . esc('/admin/media/' . $item->id . '/update_file');
            $item->uc_href = '/admin/media/' . $item->id . '/update_content';
            $item->del_href = '/admin/media/' . $item->id . '/delete';
            return $item;
        }, $items);

        $paging = new Paging();
        $meta = $paging->create($perPage, $page, $totalData, null, 10);

        $data['items'] = $items;
        $data['pagination'] = $meta;
        $data['tipe'] = $tipe;
        $data['tag'] = $tag;
        $data['options_tags'] = $this->tags;
        $data['options_tipes'] = $this->tipes;
        $data['metaPairs'] = $this->metaPairs;

        if (!is_null($tipe) && !is_null($tag)) {
            $data['tag'] = $this->buildMetaPage($tipe, $tag);
        }

        return view('pages/admin/media/list', $data);
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
        $media = new Media();
        $media->url = $url;
        $media->metadata = $mediaBuilder->build($tag, $this->request->getPost());
        $media->tags = [ $tag ];
        $media->tipe = $type;
        $mediaModel->save($media);
        return redirect()->to('/admin/media');
    }

    public function create_form ($type, $tag) {
        $metaMedia = $this->buildMetaPage($type, $tag);
        $metaMedia->action = current_url();
        return view('pages/admin/media/form/' . $metaMedia->name, [
            'metaMedia' => $metaMedia,
            'formType' => 'tambah',
            'type' => $type,
            'tag' => $tag
        ]);
    }

    public function update_file ($id) {
        $model = new MediaModel();
        $media = $model->find($id);
        $file = $this->request->getFile('avatar');

        if (!$file->isValid()) {
          throw new \RuntimeException($file->getErrorString().'('.$file->getError().')');
        }

        if (isset($media->url) && starts_with($media->url, '/')) {
          $oldFile = $media->url;
          // Remove leading slash;
          $path = substr($oldFile, 1, strlen($oldFile));
          $fullPath = ROOTPATH .  'public' . DIRECTORY_SEPARATOR . $path;
          helper('filesystem');
          delete_files($fullPath);
        }
        $newName = $file->getRandomName();
        $newPath = implode(DIRECTORY_SEPARATOR, [ ROOTPATH, 'public', 'uploads' ]);
        $file->move($newPath, $newName);
        $url = '/' . implode('/', [ 'uploads', $newName ]);
        $media->url = $url;
        $model->update($id, $media);
        return redirect()->to('/admin/media');
    }

    public function update_content_form ($id) {
        $model = new MediaModel();
        $media = $model->find($id);
        $tag = $media->tags[0];
        $metaMedia = $this->buildMetaPage($media->tipe, $tag);
        $metaMedia->action = current_url();
        return view('pages/admin/media/form/' . $metaMedia->name, [
            'item' => $media,
            'metaMedia' => $metaMedia,
            'formType' => 'update',
            'type' => $media->tipe,
            'tag' => $tag
        ]);
    }

    public function update_content ($id) {
        $mediaBuilder = new MediaBuilder();
        $model = new MediaModel();
        $media = $model->find($id);
        $media->metadata = $mediaBuilder->build($media->tags[0], $this->request->getPost());
        $model->update($id, $media);
        return redirect()->to('/admin/media');
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
        $model = new MediaModel();
        $media = $model->find($id);
        if (isset($media->url) && starts_with($media->url, '/')) {
            $oldFile = $media->url;
            // Remove leading slash;
            $path = substr($oldFile, 1, strlen($oldFile));
            $fullPath = ROOTPATH .  'public' . DIRECTORY_SEPARATOR . $path;
            helper('filesystem');
            delete_files($fullPath);
        }
        $model->delete($id);
        return redirect()->to('/admin/media');
    }

    public function change_file ($id) {

    }

    protected function buildMetaPage ($type, $tag) {
        foreach ($this->metaPairs as $key => $vals) {
            $arr = explode('#', $key);
            $_type = $arr[0];
            $_tag = $arr[1];
            if ($type == $_type && $tag == $_tag) {
                return (object) $vals;
            }
        }
    }

}
