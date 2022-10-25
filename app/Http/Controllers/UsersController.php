<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\User;
class UsersController extends Controller
{
    //
    public function profile()    {
        //認証済みのユーザー取得
        $auth = Auth::user();
        return view('users.profile', ['auth' => $auth]);
    }

        public function search(Request $request)
    {
        $search = $request->input('search');
        $query = User::query();
        if (!empty($search)) {
            $query->where('username', 'LIKE', "%{$search}%");
            $request->session()->put('search', '検索ワード：' . $search);
        } else {
            \Session::forget('search');
            $users = User::all();
        }
        $users = $query->get();
        // 検索ワード表示


        return view('users.search', compact('users', 'search'));
    }

}
    // public function search(Request $request){
    //     $keyword = $request->input('keyword');
    //     $query=User::query();
    //     if(!empty($keywords))
    //     $user=$query->where('username','like','%'.$keywords.'%')->post();
    //     return view('users.search',compact('keyword'));
    // }
