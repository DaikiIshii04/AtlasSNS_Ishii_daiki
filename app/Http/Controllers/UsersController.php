<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\User;
use Auth;
use Illuminate\Support\Facades\Validator;
use App\Post;
use App\Follow;
class UsersController extends Controller
{
    //
    public function profile()    {
        //認証済みのユーザー取得
        $auth = Auth::user();
        return view('users.profile', ['auth' => $auth]);
    }
    public function bio(array $data)
    {
        //bio(自己紹介文)を作成
        return User::create([
            'bio' => $data['bio'],
        ]);
    }
        public function update(Request $request)
    {
        // バリデーション
        $validator = Validator::make($request->all(), [
            'username' => 'required|string|min:2|max:12',
            'mail' => 'required|string|email|min:5|max:40',
            'password' => 'required|string|min:8|max:20|confirmed|alpha_num',
            'password_confirmation' => 'required',
            'bio' => 'max:150',
        ]);

        if ($validator->fails()) {
            return redirect('/profile')
                ->withErrors($validator)
                ->withInput();
        }
        $auth = Auth::user();
        $auth->username = $request->input('username');
        $auth->mail = $request->input('mail');
        //bcrypt値が一致しているかを確認
        $auth->password = bcrypt($request->input('password'));
        $auth->bio = $request->input('bio');
        $image = $request->file('images');
        // 画像がセットされれば保存処理を実行
        if (isset($request->images)) {

            //バリデーション
            $request->validate([
                'images' =>
                'file|image|mimes:png,jpg,bmp,gif,svg',
            ]);
            $image_path = $image->store('public/images');
            $auth->images = basename($image_path);
        }
        $auth->update();
        return redirect('profile');
    }

        public function search(Request $request)
    {
        $search = $request->input('search');
        $id=Auth::id();
        $query = User::query();
        if (!empty($search)) {
            $query->where('username', 'LIKE', "%{$search}%");
            $request->session()->put('search', '検索ワード：' . $search);
        } else {
            \Session::forget('search');
            $users = User::all();
        }
        // whereでid(UsersTableのカラムid)と上で定義した認証ユーザーidが一致した人を除くユーザー情報をGET
        $users = $query->where('id','!=',$id)->get();
        // 検索ワード表示


        return view('users.search', compact('users', 'search'));
    }

    // $idでクリックされたユーザーidを取得
    public function usersprofile($id)
    {
        // $user_idへUser情報（特定の）を代入
        $user_id = User::find($id);
        //$user_postへ送られてきたidとPostsテーブルのuser_idが同じデータを全て取得
        $user_post = Post::with('user')->whereIn('user_id',$user_id)->get();
        return view('users.userProfile',compact('user_id','user_post'));
    }
}
    // public function search(Request $request){
    //     $keyword = $request->input('keyword');
    //     $query=User::query();
    //     if(!empty($keywords))
    //     $user=$query->where('username','like','%'.$keywords.'%')->post();
    //     return view('users.search',compact('keyword'));
    // }
