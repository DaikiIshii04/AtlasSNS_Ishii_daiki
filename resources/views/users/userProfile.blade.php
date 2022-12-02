@extends('layouts.login')

@section('content')

<div class="users-profile-contents">

  <div>
    <img class="icon" src="{{ asset('storage/images/' . $user_id->images) }}">
  </div>

  <ul class="users-profile-posts">
    <li>
      <p class="users-profile-title">name:</p>
      <p class="users-profile-box">{{$user_id->username}}</p>
    </li>
    <li>
      <p class="users-profile-title">bio:</p>
      <p class="users-profile-box">{{$user_id->bio}}</p>
    </li>
  </ul>

  @if(Auth::user()->isFollowing($user_id->id))
  <div class="users-profile-btn">
    <a class="unfollow-button" href="/unfollow/{{$user_id->id}}">フォロー解除
    </a>
  </div>
  @else
  <div class="users-profile-btn">
    <a class="follow-button-red" href="/follow/{{$user_id->id}}">フォローする
    </a>
  </div>
  @endif

</div>

<!-- つぶやき表示 -->

@foreach($user_post as $user_post)
<div class="follow-post">
<img class="icon" src ="{{asset('storage/images/'.$user_id->images)}}">
<div class="post-posts">
      <div class="posts-area">
        <div class="posts-name">{{$user_id->username}}</div>
        <div class="posts-date">{{$user_post->updated_at}}</div>
      </div>
        {{$user_post->post}}
</div>
  </div>
@endforeach

@endsection
