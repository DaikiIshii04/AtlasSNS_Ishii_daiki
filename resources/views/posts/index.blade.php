@extends('layouts.login')

@section('content')
  <!--投稿フォーム-->
 <form action="/top" method="post">
   {{ csrf_field() }}
   <div class="post-main">
<p><img src=" {{ asset('storage/images/' . Auth::user()->images) }}" class="icon"></p>
   <input type="text" class="post-input" name="post"
   placeholder="投稿内容を入力して下さい">
   <button type="submit" class="post-submit">
     <img src="{{asset('images/post.png')}}">
  </button>
   @foreach ($errors->all() as $error)
<li>{{$error}}</li>
@endforeach
 </form>
</div>



     @foreach($posts as $post)
  <div class="post-area">

    <img class="post-icon" src="{{ asset('storage/images/' . $post->user->images)}}" >
    <div class="post-posts">
      <div class="posts-area">
        <div class="posts-name">{{$post->user->username}}</div>
        <div class="posts-date">{{$post->updated_at}}</div>
      </div>
        {{$post->post}}

      <!-- 編集ボタン 削除ボタン-->
      <!-- ポストテーブルのユーザーIDとログインユーザーIDが一致していた場合のみ表示（＝＝＝）で一致しているかどうか -->
      <p class="content-modal">
      @if($post->user_id === Auth::user()->id)
          <a class="js-modal-open" href="" post="{{$post->post}}" post_id="{{ $post->id }}">
            <img class="icon" src="{{asset('images/edit.png')}}" alt="">
          </a>
        <a href="/top/{{$post->id}}/delete" onclick="return confirm('こちらの投稿を削除してもよろしいでしょうか')"><img class="icon" src="{{asset('images/trash-h.png')}}" alt=""></a>
    </p>
    @endif
    </div>
</div>

     <!-- モーダル内 -->
    <div class="modal js-modal">
      <div class="modal__bg js-modal-close"></div>
      <div class="modal__content">
        <form action="post/update" method="post">
          <textarea class="modal_post" name="up_post"></textarea>
          <input type="hidden" name="id" class="modal_id" value="{{$post->id}}">
          <input type="submit" value="更新">
          {{csrf_field()}}
        </form>
        <a class="js-modal-close" href="">閉じる</a>
      </div>
    </div>
  @endforeach
@endsection
