@extends('layouts.logout')

@section('content')

{!! Form::open(['url' => 'login']) !!}
<div class="login_area">
<p class="login_font">AtlasSNSようこそ</p>

<div class="login_form">
  <div class="form_box">
{{ Form::label('e-mail') }}
{{ Form::text('mail',null,['class' => 'input']) }}
</div>
<div class="form_box">
{{ Form::label('password') }}
{{ Form::password('password',['class' => 'input']) }}
</div>
</div>
{{ Form::submit('LOGIN',['class'=>'login-submit']) }}

<div class="added_text"><a href="/register">新規ユーザーの方はこちら</a></div>
</div>
{!! Form::close(['url' => 'register']) !!}

@endsection
