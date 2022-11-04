@extends('layouts.login')

@section('content')
<div id="follower_list">
  <form action="/follower-list" method="get">
    {{csrf_field()}}
  </form>
  <p class="follower_list_title">Follower List</p>
  <!-- ＄followsで全ユーザー取得 -->
@foreach($followers as $follower)
<!-- フォローしているユーザーのみ表示 -->
@if(auth()->user()->isFollowed($follower->id))
<tr>
<!-- フォローしているユーザーの画像のみ表示 -->
  <td>{{$follower->images}}</td>
</tr>
@endif
@endforeach
<!-- ユーザーの投稿を表示 -->
@foreach($posts as $post)
<p>名前：{{ $post->user->username }}</p>
<p>投稿内容：{{ $post->post }}</p>

@endforeach
</div>
@endsection
