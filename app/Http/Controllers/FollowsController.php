<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\User;
use App\Follow;
use Auth;

class FollowsController extends Controller
{
    //
    public function followList(){
        return view('follows.followList');
    }
    public function followerList(){
        return view('follows.followerList');
    }
    //受け取ったフォローIDをfollowsテーブルへ格納
    public function follow($id){
        Follow::create([
            'followed_id'=>$id,
            'following_id'=>Auth::id(),
        ]);
        return back();
    }
    //受け取ったIDを削除（フォロー解除）
        public function unfollow($id){
        \DB::table('follows')
        // フォローされてるIDと送られてきたIDが同じか
            ->where('followed_id',$id)
        // フォローしている人のIDとログインユーザーが同じか
            ->where('following_id',Auth::id())
    // 上記項目満たしてたら削除
            ->delete();
        return back();
    }
}
// // 以下参考サイト文
//     // フォロー
//     public function follow(User $user)
//     {
//         // $followへ認証されたユーザーを代入？
//         $follower = auth()->user();
//         // フォローしているか
//         // $is_Followingへ該当ユーザーのIDを代入
//         $is_following = $follower->isFollowing($user->id);
//         // もし該当のIDがなかったら
//         if(!$is_following) {
//             //
//             $follower->follow($user->id);
//             return back();
//         }
//     }

//     // フォロー解除
//     public function unfollow(User $user)
//     {
//         $follower = auth()->user();
//         // フォローしているか
//         $is_following = $follower->isFollowing($user->id);
//         if($is_following) {
//             // フォローしていればフォローを解除する
//             $follower->unfollow($user->id);
//             return back();
//         }
//     }
