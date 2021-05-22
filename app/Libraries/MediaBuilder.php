<?php

namespace App\Libraries;

class MediaBuilder {

    protected function car ($data) {
        return [
            'tags' => '{ carousel }',
            'tipe' => 'picture',
            'url' => $data['url'],
            'metadata' => json_encode([
                'title' => $data['title'],
                'description' => $data['description'],
                'target' => $data['target']
            ])
        ]
    }

    protected function ew ($data) {
        return [
            'url' => $data['url'],
            'tipe' => 'picture',
            'tags' => '{ external-web }',
            'metadata' => json_encode([
                'title' => $data['title'],
                'description' => $data['description']
            ])
        ];
    }

    protected function zi ($data) {
        return [
            'url' => $data['url'],
            'tipe' => 'picture',
            'tags' => '{ zona-integritas }',
            'metadata' => json_encode([
                'title' => $data['title'],
                'description' => $data['description']
            ])
        ];
    }

    protected function ap ($data) {
        return [
            'url' => $data['url'],
            'tipe' => 'picture',
            'tags' => '{ agen-perubahan }',
            'metadata' => json_encode([
                'tahun' => $data['tahun'],
                'nama' => $data['nama']
            ])
        ];
    }

    protected function ip ($data) {
        return [
            'url' => $data['url'],
            'tipe' => 'picture',
            'tags' => '{ info-publik }',
            'metadata' => json_encode([
                'title' => $data['title'],
                'target' => $data['target']
            ])
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
            default:
                throw new Exception("Error: Unknown tag ($tag)", 1);
        }
    }
}