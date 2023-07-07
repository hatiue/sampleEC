<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Good extends Model
{
    use HasFactory;

    //  $guardedでブラックリストでも良いのだが、カラム名をコピペするために$fillableにした
    protected $fillable = [
        'code', // 自動増分でないため手入力
        'name',
        'price',
        'imgurl',
        'description',
    ];
}
