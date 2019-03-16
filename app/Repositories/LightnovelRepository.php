<?php
/**
 * Created by PhpStorm.
 * User: rana
 * Date: 8/29/18
 * Time: 7:34 PM
 */

namespace App\Repositories;


use App\Models\Lightnovel;
use Illuminate\Support\Facades\DB;

class LightnovelRepository implements LightnovelInterface
{
    public $model;
    public $sortingColumns;
    public $sortingOrders;

    public function __construct(Lightnovel $lightnovel) {
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
        $this->model = $lightnovel;
    }

    public function getAll() {
        return $this->model->all();
    }

    public function getById($id) {
        return $this->model->where('id', $id)->first();
    }

    public function getOverView($name) {
        return $this->model->where('ln_name', $name)->get();
    }

    public function getPart($name, $volume_index, $part_index) {
        return $this->model->where([
            ['ln_name', $name],
            ['volume_index', $volume_index],
            ['part_index', $part_index],
        ])->first();
    }

    public function getNumberPart($name, $volume_index) {
        if ($record = $this->model->where([
            ['ln_name', $name],
            ['volume_index', $volume_index]
        ])->orderBy('part_index', 'desc')->first())
            return $record->part_index;
        return 0;
    }

    public function getNumberVolume($name) {
        if ($record = $this->model->where('ln_name', $name)->orderBy('volume_index', 'desc')->first())
            return $record->volume_index;
        return 0;
    }
}
