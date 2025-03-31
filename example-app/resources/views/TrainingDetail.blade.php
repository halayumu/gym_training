<form action="/TrainingDetail" method="post">
    @csrf
    <div>
        <div>
            <span>セット</span>
            <p>1</p>
        </div>

        <div class="box">
    <div class="list">
        <div class="weight">
            <span>重量</span>
    <input type="text" name="weight" value="{{ session('weight', '') }}">
        </div>

    <div class="rep">
    <span>回数</span>
    <input type="text" name="rep" value="{{ session('rep', '') }}"><br>
    </div>

    <span>補助</span>
    <div class="assistance">
        <input type="radio" name="assistance" value="0" checked>
        <label for="no">なし</label>
        <input type="radio" name="assistance" value="1">
        <label for="yes">あり</label>
    </div>

    <span>椅子の高さ</span>
    <div class="chair_height">
    <select name="chair_height">
        @for ($i = 1; $i <= 10; $i++)
        <option value="{{$i}}">{{$i}}</option>
        @endfor
    </select>
    </div>

    <span>背もたれの高さ</span>
    <div class="chair_backrest">
    <select name="chair_backrest">
        @for ($i = 1; $i <= 10; $i++)
        <option value="{{$i}}">{{$i}}</option>
        @endfor
    </select>
    </div>

    <div>
        <span>メモ</span>
        <input type="text" name = "memo">
    </div>

    <button type="submit">送信</button>
    </div>
</form>
