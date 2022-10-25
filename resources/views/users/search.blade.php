@extends('layouts.login')

@section('content')
<div id="search">
  <!--検索フォーム-->
  <form action="/search" method="get">
    {{csrf_field()}}
    <input type="search" name="search" value="" placeholder="ユーザー名">
    <button type="submit">検索</button>
    <p>{{ session('search')}}</p>
  </form>
</div>
<!--検索結果表示-->
@foreach($users as $user)
<tr>
  <td>{{$user->username}}</td>
</tr>
<!-- フォローしていたらフォロー解除 -->
@if(auth()->user()->isFollowing($user->id))
<a class="un_follow" href="/unfollow/{{$user->id}}">フォロー解除</a>
<!-- フォローしていなければフォロー -->
@else
<a class="follow" href="/follow/{{$user->id}}">フォローする</a>
@endif
@endforeach

@endsection
