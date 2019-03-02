<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
//use Illuminate\Database\Eloquent\SoftDeletes;

class Lightnovel extends Model
{
//    use SoftDeletes;
    protected $fillable = ['ln_name', 'volume_name', 'part_name', 'content', 'volume_index', 'part_index', 'index'];

}
