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
<!-- フォローしているユーザーの画像のみ表示 -->
<a class="follower-list-images" href="/{{$follower->id}}/users-profile">
  <img class="icon" src="{{ asset('/storage/images/' .$follower->images)}}">
</a>
@endif
@endforeach
<!-- ユーザーの投稿を表示 -->
 <div class="follower_post">
 @foreach($posts as $post)
<a class="follower-list-images" href="/{{$post->id}}/users-profile">
 <img class="icon" src="{{ asset('storage/images/' . $post->user->images)}}" >
</a>
 <p>{{ $post->user->username }}</p>
 <p>{{ $post->updated_at}}</p>
 <p>{{ $post->post }}</p>
 @endforeach
 </div>
</div>
@endsection
