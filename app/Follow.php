<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Follow extends Model
{
    //
        // フォローされているユーザー取得
        public function follows()
    {
        return $this->belongsToMany(
            'App\Models\User',
            'follows',
            'followed_user_id',
            'following_user_id'
        );
    }
    // フォローしているユーザーを取得
        public function follow()
    {
        return $this->belongsToMany(
            'App\Models\User',
            'follows',
            'following_user_id',
            'followed_user_id'
        );
    }
   }
