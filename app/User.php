<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username', 'mail', 'password','bio', 'images'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    // 多対多のリレーション
    public function followers(){
// フォローされているユーザIDから、フォローしているユーザIDにアクセス
    return $this->belongsToMany(User::class,"follows","followed_id","following_id");
    }
    public function follows(){
// フォローしているユーザIDから、フォローされているユーザIDにアクセス
   return $this->belongsToMany(User::class, "follows", "following_id", "followed_id");
}

    // フォローしているか
    // Int型（数値のみ）誤った情報を事前にブロックできる
    public function isFollowing(Int $user_id)
    {
        // booleanで真偽、上で指定した＄thisからfollows()へfollowed_idとボタンプッシュで送った値を審議、同じなら脱出。
        return (boolean) $this->follows()->where('followed_id', $user_id)->exists();
    }

    // フォローされているか
    public function isFollowed(Int $user_id)
    {
        return (boolean) $this->followers()->where('following_id', $user_id)->exists();
    }
}
