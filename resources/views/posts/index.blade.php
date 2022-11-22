@extends('layouts.login')

@section('content')
<div class="main">
  <!--投稿フォーム-->
 <form action="/top" method="post">
   {{ csrf_field() }}
   <input type="hidden" name="user_id" value="">
   <input type="text" class="form" name="post"
   placeholder="投稿内容を入力して下さい">
   <button type="submit">
     <img src="{{asset('images/post.png')}}">
  </button>
   @foreach ($errors->all() as $error)
<li>{{$error}}</li>
@endforeach
 </form>
</div>
<div class="Posts-wrapper">
     @foreach($posts as $post)
  <div class="post-area">
 <img class="icon" src="{{ asset('storage/images/' . $post->user->images)}}" >
    <tr>
      <td>
        {{$post->user->username}}
      </td>
      <p>{{$post->updated_at}}</p>
      <p>
        <td>
          {{$post->post}}
        </td>
      </p>
      <!-- 編集ボタン 削除ボタン-->
      <!-- ポストテーブルのユーザーIDとログインユーザーIDが一致していた場合のみ表示（＝＝＝）で一致しているかどうか -->
      @if($post->user_id === Auth::user()->id)
      <td>
        <div class="content">
          <a class="js-modal-open" href="" post="{{$post->post}}" post_id="{{ $post->id }}">
            <img class="icon" src="{{asset('images/edit.png')}}" alt="">
          </a>
        <a href="/destroy/{{$post->id}}" onclick="return confirm('こちらの投稿を削除してもよろしいでしょうか')"><img class="icon" src="{{asset('images/trash-h.png')}}" alt=""></a>
      </td>
    </tr>
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
    </div>@endif
  </div>
  @endforeach
</div>
@endsection
