@extends('layouts.logout')

@section('content')

{!! Form::open(['url' => 'login']) !!}
<div class="login_area">
<p>AtlasSNSようこそ</p>

{{ Form::label('e-mail') }}
{{ Form::text('mail',null,['class' => 'input']) }}
<p>{{ Form::label('password') }}
{{ Form::password('password',['class' => 'input']) }}
</p>
{{ Form::submit('ログイン',['class'=>'login-submit']) }}

<p><a href="/register">新規ユーザーの方はこちら</a></p>
</div>
{!! Form::close(['url' => 'register']) !!}

@endsection
