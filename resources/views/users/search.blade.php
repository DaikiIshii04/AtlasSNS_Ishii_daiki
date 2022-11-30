@extends('layouts.login')

@section('content')

  <!--検索フォーム-->
  <form action="/search" method="get">
    <div class="search-form-area">
      <input type="search" name="search" value="" placeholder="ユーザー名">
     <button type="submit">検索</button>
      <p>{{ session('search')}}</p>
    </div>
  </form>

<div class="search-users-table">
  @foreach($users as $user)
  <ul class="search-table">
    @if (Auth::user()->id != $user->id)
    <li class="search-lists">
      <img class="post-icon" src="{{ asset( 'storage/images/' . $user->images) }}">
      {{$user->username}}
    </li>
    @if(Auth::user()->isFollowing($user->id))
    <li class="follow-button-list">
      <div class="unfollow-button">
        <a class="btn btn-danger" href="/unfollow/{{$user->id}}" role="button">フォロー解除</a>
      </div>
      @else
<a class="follow-button-red" href="/follow/{{$user->id}}" role="button">フォローする</a>

    </li>
    @endif
    @endif
  </ul>


  @endforeach
</div>
@endsection
