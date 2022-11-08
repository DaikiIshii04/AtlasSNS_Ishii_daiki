@extends('layouts.logout')

@section('content')

@foreach ($errors->all() as $error)
<li>{{$error}}</li>
@endforeach

{!! Form::open(['url' => 'register']) !!}

<h2>新規ユーザー登録</h2>
<p>ユーザー名</p>
{{ Form::label('ユーザー名') }}
{{ Form::text('username',null,['class' => 'input']) }}
<p>メールアドレス</p>
{{ Form::label('メールアドレス') }}
{{ Form::text('mail',null,['class' => 'input']) }}
<p>パスワード</p>
{{ Form::label('パスワード') }}
{{ Form::text('password',null,['class' => 'input']) }}
<p>パスワード確認</p>
{{ Form::label('パスワード確認') }}
{{ Form::text('password-confirmation',null,['class' => 'input']) }}

{{ Form::submit('登録') }}

<p><a href="/login">ログイン画面へ戻る</a></p>

{!! Form::close(['url' => 'login']) !!}


@endsection
