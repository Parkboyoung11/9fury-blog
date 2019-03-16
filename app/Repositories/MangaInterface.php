<?php
/**
 * Created by PhpStorm.
 * User: nightfury
 * Date: 14/03/2019
 * Time: 15:06
 */

namespace App\Repositories;


interface MangaInterface {
    public function getAll();

    public function getById($id);

    public function getOverView($name);

    public function getChap($name, $chap_index);

    public function getNumberChap($name);
}
