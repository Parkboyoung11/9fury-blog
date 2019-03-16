<?php
/**
 * Created by PhpStorm.
 * User: rana
 * Date: 8/29/18
 * Time: 7:34 PM
 */

namespace App\Repositories;



use App\Models\Lightnovel;

interface LightnovelInterface
{
    public function getAll();

    public function getById($id);

    public function getOverView($name);

    public function getPart($name, $volume_index, $part_index);

    public function getNumberPart($name, $volume_index);

    public function getNumberVolume($name);
}
