@extends('layouts.login')

@section('content')

@if(isset($errors))
@foreach ($errors->all() as $error)
<li>{{$error}}</li>
@endforeach
@endif

{!! Form::open(['url' => '/profile','files'=>true]) !!}

<ul class="profile-contents">
  <div class="profile-logo">
    <img class="icon" src="{{ asset('storage/images/' . Auth::user()->images) }}">
  </div>
  <li class="profile-contents-username">
    <p>{{ Form::label('username','user name')}}</p>
    <p>{{ Form::text('username',$auth->username,['class' => 'profile-text'])}}</p>
  </li>
  <li class="profile-contents-mail">
    <p>{{ Form::label('e-mail','mail address')}}</p>
    <p>{{ Form::text('mail',$auth->mail,['class' => 'profile-text'])}}</p>
  </li>
  <li class="profile-contents-password">
    <p>{{ Form::label('password','password')}}</p>
    <p>{{ Form::password('password',['class' => 'profile-text'])}}</p>
  </li>
  <li class="profile-contents-pass-con">
    <p>{{ Form::label('password_confirm','password confirm')}}</p>
    <p>{{ Form::password('password_confirmation',['class' => 'profile-text'])}}</p>
  </li>
  <li class="profile-contents-bio">
    <p>{{ Form::label('bio','bio')}}</p>
    <p>{{ Form::text('bio',$auth->bio,['class' => 'profile-text'])}}</p>
  </li>
  <li class="profile-contents-icon">
    <p>{{ Form::label('icon image','icon image')}}</p>
    <div class="images-area">
      <p>{{ Form::file('images',$auth->image,['class'=>'profile-images'])}}</p>
    </div>
  </li>
  {{Form::submit('更新',['class' => 'profile-submit'])}}

</ul>
{!! Form::close() !!}


@endsection
