<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    //つぶやき登録
    protected $fillable =[
        'user_id','post',
    ];
}
