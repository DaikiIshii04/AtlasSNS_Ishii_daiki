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
<!-- フォローしているユーザーの画像のみ表示 -->
<a class="follow-list-images" href="/{{$follow->id}}/users-profile">
  <img class="icon" src="{{ asset('/storage/images/' .$follow->images) }}">
</a>
@endif
@endforeach
<!-- ユーザーの投稿を表示 -->
 <div class="follow_post">
 @foreach($posts as $post)
<a class="follow-list-images" href="/{{$post->id}}/users-profile">
 <img class="icon" src="{{ asset('storage/images/' . $post->user->images) }}">
</a>
 <p>{{ $post->user->username }}</p>
 <p>{{ $post->updated_at}}</p>
 <p>{{ $post->post }}</p>
 @endforeach
 </div>
</div>
@endsection
