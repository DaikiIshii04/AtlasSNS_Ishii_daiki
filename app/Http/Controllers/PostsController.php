<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use Auth;


class PostsController extends Controller
{
    //つぶやき表示
    public function index(){
        $posts=Post::latest()->get();
        return view('posts.index',compact('posts'));
    }

    //つぶやき登録
    public function post(Request $request){
        //バリデーション
        $validator = $request->validate([
            'post'=> ['required','max:200'],
        ]);
        Post::create([
            'user_id'=> Auth::user()->id,
            'post'=> $request->post,
        ]);
        return back();
    }
    //更新
        public function update(Request $request)
    {

        $id = $request->input('id');

        $up_post = $request->input('up_post');
        \DB::table('posts')
            ->where('id', $id)
            ->update(['post' => $up_post]);

        return redirect('/top');
    }

    //つぶやき削除
            public function destroy($id)
        {
            $post_id=Post::find($id);
            $post_id->delete();
            // \DB::table('posts')
            // ->where('id', $id)
            // ->delete();
            return back();
        }
    //つぶやき編集
        public function store(Request $request)
    {
        // dd($request);
        // インスタンスを作成
        $post = new Post;

        //postを代入
        $post->post = $request->post;
        $post->user_id = Auth::id();
        $post->save();
        return redirect('posts.index', ['post' => $post]);
    }
}
