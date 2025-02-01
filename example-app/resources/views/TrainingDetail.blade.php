<form action="/TrainingDetail" method="post">
    @csrf
    <div>
        <!-- Live as if you were to die tomorrow. Learn as if you were to live forever. - Mahatma Gandhi -->
        <div class="box">
    <div class="list">
        <div class="weight">
            <span>重量</span>
    <input type="text" name="weight" value="{{ session('weight', '') }}">
        </div>
    <div class="rep">
    <span>回数</span>
    <input type="text" name="rep" value="{{ session('rep', '') }}">

    <button type="submit">送信</button>
    </div>
</form>
