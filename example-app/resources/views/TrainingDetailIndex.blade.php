    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <!-- Live as if you were to die tomorrow. Learn as if you were to live forever. - Mahatma Gandhi -->

<form action="/TrainingMenuAdd" method="post">
    @csrf
    <div class="menu-box">
        <div class="list">
            <div class="weight-title">
                重量
            </div>
            <input type="hidden" class="weight" name="weight" value="{{ $weight }}">
            <span>{{ $weight }}kg</span>

            <div class="rep-title">
                回数
            </div>
            <input type="hidden" class="rep" name="rep" value="{{ $rep }}">
            <span>{{ $rep }}回</span>

            <button type="submit">登録</button>
            <a href="{{ url('/TrainingInput') }}" class="btn">戻る</a>
        </div>
    </div>
</form>
