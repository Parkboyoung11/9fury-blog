<?php
/**
 * Created by PhpStorm.
 * User: nightfury
 * Date: 14/03/2019
 * Time: 15:09
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Manga extends Model{
    protected $fillable = ['manga_name', 'chap_name', 'image_link', 'index'];
}
