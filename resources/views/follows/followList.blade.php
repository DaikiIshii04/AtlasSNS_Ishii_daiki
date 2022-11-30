@extends('layouts.login')

@section('content')
<div id="follow_list">
  <div class="follow-form">
  <form action="/follow-list" method="get">
    {{csrf_field()}}
  </form>
  <p class="follow-title">Follow List</p>
  <!-- ＄followsで全ユーザー取得 -->
<div class="follow-icon-list">
  @foreach($follows as $follow)
<!-- フォローしているユーザーのみ表示 -->
@if(auth()->user()->isFollowing($follow->id))
<!-- フォローしているユーザーの画像のみ表示 -->
<a class="follow-list-images" href="/{{$follow->id}}/users-profile">
  <img class="icon" src="{{ asset('/storage/images/' .$follow->images) }}">
</a>
@endif
@endforeach
</div>
</div>

<!-- ユーザーの投稿を表示 -->

 @foreach($posts as $post)
 <div class="follow-post">
<a class="follow-list-images" href="/{{$post->id}}/users-profile">
 <img class="icon" src="{{ asset('storage/images/' . $post->user->images) }}">
</a>
    <div class="post-posts">
      <div class="posts-area">
        <div class="posts-name">{{$post->user->username}}</div>
        <div class="posts-date">{{$post->updated_at}}</div>
      </div>
        {{$post->post}}
</div>
  </div>
 @endforeach

</div>
@endsection
