<?php

namespace App\Libraries;

class MediaBuilder {

    protected function car ($data) {
        return [
            'title' => $data['title'],
            'description' => $data['description'],
            'target' => $data['target']
        ];
    }

    protected function ew ($data) {
        return [
            'title' => $data['title'],
            'target' => $data['target']
        ];
    }

    protected function zi ($data) {
        return [
            'title' => $data['title'],
            'description' => $data['description']
        ];
    }

    protected function ap ($data) {
        return [
            'tahun' => $data['tahun'],
            'nama' => $data['nama']
        ];
    }

    protected function ip ($data) {
        return [
            'title' => $data['title'],
            'target' => $data['target']
        ];
    }

    public function build ($tag, $data) {
        switch ($tag) {
            case 'carousel':
                return $this->car($data);
            case 'external-web':
                return $this->ew($data);
            case 'zona-integritas':
                return $this->zi($data);
            case 'agen-perubahan':
                return $this->ap($data);
            case 'info-publik':
                return $this->ip($data);
            default:
                throw new Exception("Error: Unknown tag ($tag)", 1);
        }
    }
}