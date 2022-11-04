@extends('layouts.login')

@section('content')
<div id="follow_list">
  <form action="/follow-list" method="get">
    {{csrf_field()}}
  </form>
  <p class="follow_list_title">Follow List</p>
  <!-- ＄followsで全ユーザー取得 -->
@foreach($follows as $follow)
<!-- フォローしているユーザーのみ表示 -->
@if(auth()->user()->isFollowing($follow->id))
<tr>
<!-- フォローしているユーザーの画像のみ表示 -->
  <td>{{$follow->images}}</td>
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
