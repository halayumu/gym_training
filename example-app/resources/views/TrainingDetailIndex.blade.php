    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <!-- Live as if you were to die tomorrow. Learn as if you were to live forever. - Mahatma Gandhi -->

    <div class="menu-box">
        <div class="list">
            <div class="weight-title">
                重量
            </div>
            <div class="weight">
                {{ $weight }}kg
            </div>
            <div class="rep-title">
                回数
            </div>
            <div class="rep">
                {{ $rep }}回
            </div>
            <button type="submit">登録</button>
            <a href="{{ url('/TrainingInput') }}" class="btn">戻る</a>
        </div>
    </div>