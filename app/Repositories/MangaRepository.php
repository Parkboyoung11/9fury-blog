<?php
/**
 * Created by PhpStorm.
 * User: nightfury
 * Date: 14/03/2019
 * Time: 15:07
 */

namespace App\Repositories;

use App\Models\Manga;

class MangaRepository implements MangaInterface {
    public $model;
    public $sortingColumns;
    public $sortingOrders;

    public function __construct(Manga $manga) {
//        $this->sortingColumns = [
//            'id' => __('ID'),
//            'volume_index' => __('VolumeIndex'),
//            'index' => __('Index'),
//            'part_index' => __('PartIndex')
//        ];
//        $this->sortingOrders = [
//            'desc' => __('Descending'),
//            'asc' => __('Ascending')
//        ];
        $this->model = $manga;
    }

    public function getAll() {
        return $this->model->all();
    }

    public function getById($id) {
        return $this->model->where('id', $id)->first();
    }

    public function getOverView($name) {
        return $this->model->where('manga_name', $name)->get();
    }

    public function getChap($name, $chap_index) {
        return $this->model->where([
            ['manga_name', $name],
            ['index', $chap_index],
        ])->first();
    }

    public function getNumberChap($name) {
        if ($record = $this->model->where('manga_name', $name)->orderBy('index', 'desc')->first())
            return $record->index;
        return 0;
    }
}
