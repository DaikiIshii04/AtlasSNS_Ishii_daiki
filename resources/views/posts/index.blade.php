@extends('layouts.login')

@section('content')
<div class="main">
  <!--投稿フォーム-->
 <form action="/top" method="post">
   {{ csrf_field() }}
   <input type="hidden" name="user_id" value="">
   <input type="text" class="form" name="post"
   placeholder="投稿内容を入力して下さい">
   <button type="submit">投稿</button>
     @if($errors->first('tweet')) <!-- 追加エラー画面 -->
        <p style="font-size: 0.7rem; color: red; padding: 0 2rem;">※{{$errors->first('tweet')}}</p>
        @endif
 </form>
</div>
<div class="Posts-wrapper">
     @foreach($posts as $post)<!-- 画面表示　-->
    <div style="padding:2rem; border-top: solid 1px    #E6ECF0; border-bottom: solid 1px #E6ECF0;">
          <div>{{ $post->post }}</div>
                <!-- 編集ボタン 参考サイトのまま-->
      <td>
        <div class="content">
          <a class="js-modal-open" href="" post="{{$post->post}}" post_id="{{ $post->id }}">編集</a>
        </div>
      </td>

<!--削除-->
      <form
        style="display: inline-block;"
        method="POST"
        action="/destroy/{{$post->id}}"
      >
      @csrf
      <button class="btn btn-danger"onclick="return confirm('こちらの投稿を削除してもよろしいでしょうか？')">削除</button>
      </form>
    </div>
 @endforeach
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
  </div>
</div>

@endsection
