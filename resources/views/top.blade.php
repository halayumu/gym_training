@vite(['resources/css/top.css'])

<div class="top-box">
    <div class="top-icon">
        <img src="{{ asset('images/log.png') }}" alt="WORKOUT">
    </div>

    <div class="top-title">
        <h1>WORKOUT</h1>
    </div>

    <div class="btn-size">
        <a href="{{ route('login') }}">ログイン</a>
    </div>
    <div class="btn-size">
        <a href="">新規登録</a>
    </div>
</div>
