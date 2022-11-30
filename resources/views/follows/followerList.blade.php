@extends('layouts.login')

@section('content')
<div id="follower_list">
  <div class="follow-form">
  <form action="/follower-list" method="get">
    {{csrf_field()}}
  </form>
  <p class="follow-title">Follower List</p>
  <!-- ＄followsで全ユーザー取得 -->
  <div class="follow-icon-list">
@foreach($followers as $follower)
<!-- フォローしているユーザーのみ表示 -->
@if(auth()->user()->isFollowed($follower->id))
<!-- フォローしているユーザーの画像のみ表示 -->
<a class="follower-list-images" href="/{{$follower->id}}/users-profile">
  <img class="icon" src="{{ asset('/storage/images/' .$follower->images)}}">
</a>
@endif
@endforeach
</div>
</div>
<!-- ユーザーの投稿を表示 -->

 @foreach($posts as $post)
 <div class="follow-post">
  <a class="follower-list-images" href="/{{$post->id}}/users-profile">
 <img class="icon" src="{{ asset('storage/images/' . $post->user->images)}}" >
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
