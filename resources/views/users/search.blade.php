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
  <button type="submit">フォローする</button>
</tr>
@endforeach


@endsection
