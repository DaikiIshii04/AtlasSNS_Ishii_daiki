@extends('layouts.logout')

@section('content')

@foreach ($errors->all() as $error)
<li>{{$error}}</li>
@endforeach

{!! Form::open(['url' => 'register']) !!}
<div class="register_area">
<p class="login_font">新規ユーザー登録</p>
<div class="form_box">
{{ Form::label('user name') }}
{{ Form::text('username',null,['class' => 'input']) }}
</div>
<div class="form_box">
{{ Form::label('e-mail') }}
{{ Form::text('mail',null,['class' => 'input']) }}
</div>
<div class="form_box">
{{ Form::label('password') }}
{{ Form::text('password',null,['class' => 'input']) }}
</div>
<div class="form_box">
{{ Form::label('password confirm') }}
{{ Form::text('password_confirmation',null,['class' => 'input']) }}
</div>

{{ Form::submit('REGISTER',['class'=>'login-submit']) }}

<div class="added_text"><a href="/login">ログイン画面へ戻る</a></div>
</div>
{!! Form::close(['url' => 'login']) !!}


@endsection
