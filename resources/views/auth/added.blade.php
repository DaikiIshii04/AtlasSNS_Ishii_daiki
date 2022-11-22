@extends('layouts.logout')

@section('content')

<div id="clear">
  <div class="welcome-area">
  <p class="welcome">{{session('UserName')}}さん</p>
  <p class="welcome">ようこそ！AtlasSNSへ！</p>
  </div>
  <div class="welcome-font">
  <p>ユーザー登録が完了しました。</p>
  <p>早速ログインをしてみましょう。</p>
</div>
 <p class="added-submit"><a href="/login">ログイン画面へ</a></p>
</div>

@endsection
