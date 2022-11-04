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
        // followsへユーザー情報を代入
        $follows = User::get();
        // postsへ投稿情報を代入
        $posts = Post::get();
        // following_idへフォローしている人のIDを代入
        $following_id=Auth::user()->follows()->pluck('followed_id');
        // 上で取得した投稿情報内の投稿者のIDとフォローしている人のIDが一致したもののみ取得
        $posts = Post::with('user')->whereIn('user_id', $following_id)->get();
        return view('follows.followList',compact('follows','posts'));
    }
    public function followerList(){
        $followers=User::get();
        $posts=Post::get();
        $followed_id=Auth::user()->followers()->pluck('following_id');
        $posts=Post::with('user')->whereIn('user_id',$followed_id)->get();
        return view('follows.followerList',compact('followers','posts'));
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
