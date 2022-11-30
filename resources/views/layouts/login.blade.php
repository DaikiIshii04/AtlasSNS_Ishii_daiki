<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
    <!--IEブラウザ対策-->
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="description" content="ページの内容を表す文章" />
    <title></title>
    <link rel="stylesheet" href="{{ asset('css/reset.css') }} ">
    <link rel="stylesheet" href="{{ asset('css/style.css') }} ">

    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script> -->

    <!--スマホ,タブレット対応-->
    <meta name="viewport" content="width=device-width,initial-scale=1" />
    <!--サイトのアイコン指定-->
    <link rel="icon" href="画像URL" sizes="16x16" type="image/png" />
    <link rel="icon" href="画像URL" sizes="32x32" type="image/png" />
    <link rel="icon" href="画像URL" sizes="48x48" type="image/png" />
    <link rel="icon" href="画像URL" sizes="62x62" type="image/png" />
    <!--iphoneのアプリアイコン指定-->
    <link rel="apple-touch-icon-precomposed" href="画像のURL" />
    <!--OGPタグ/twitterカード-->
    <!-- jquery -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="{{ asset('/js/script.js') }}"></script>
</head>
<body>
    <header>
        <div id = "head">
         <h1><a href="/top"><img class="atlas-logo" src="{{asset('images/atlas.png')}}"></a></h1>
            <div id="ac-wrapper">
                <div class="profile-accordion is-active col-5">
                    <p class="auth-name">{{ Auth::user()->username }}さん</p>
                    <img class="icon" src="{{ asset('storage/images/' . Auth::user()->images) }}">
                <div>
            </div>
        </div>
    </header>
                <ul class="profile-accordion-ul">
                    <li class="profile-accordion-li"><a href="/top">HOME</a></li>
                    <li class="profile-accordion-middle"><a href="/profile">プロフィール編集</a></li>
                    <li class="profile-accordion-li"><a href="/logout">ログアウト</a></li>
                </ul>
    <div id="row">
        <div id="container">
            @yield('content')
        </div >
        <div id="side-bar">
            <div id="confirm">
                <p>{{ Auth::user()->username }}さんの</p>
                <div class="side-follow">
                <p>フォロー数</p>
                <!-- 認証ユーザーのフォロー数呼び出し -->
                <p>{{ Auth::user()->follows()->get()->count() }}名</p>
                </div>
                <p class="follow-btn"><a href="/follow-list">フォローリスト</a></p>
                <div class="side-follow">
                <p>フォロワー数</p>
                <!-- 認証ユーザーのフォロワー数呼び出し -->
                <p>{{ Auth::user()->followers()->get()->count() }}名</p>
                </div>
                <p class="follow-btn"><a href="/follower-list">フォロワーリスト</a></p>
            </div>
            <p class="search-btn"><a href="/search">ユーザー検索</a></p>
        </div>
    </div>
    <footer>
    </footer>
 <!-- <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="js/script.js"></script> -->
</body>
</html>
