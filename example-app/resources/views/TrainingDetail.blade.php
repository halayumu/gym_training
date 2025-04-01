
<form action="/TrainingDetail" method="post">
    @csrf

    <div id="todo_box">
        <div class="set_box">
            <span>セット</span>
            <p id="set"></p>
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

                <div class="assistance">
                    <span>補助</span>
                    <input type="radio" name="assistance" value="0" checked>
                    <label for="no">なし</label>
                    <input type="radio" name="assistance" value="1">
                    <label for="yes">あり</label>
                </div>
            </div>

            <div class="chair_height">
                <span>椅子の高さ</span>
                <select name="chair_height">
                    @for ($i = 1; $i <= 10; $i++)
                    <option value="{{$i}}">{{$i}}</option>
                    @endfor
                </select>
            </div>

            <div class="chair_backrest">
                <span>背もたれの高さ</span>
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
        </div>
        
        <button type="submit">送信</button>
        <button id="todo_add">+</button>
    </div>

    <div id="clone_in">

    </div>
</form>


@vite('resources/js/TrainingDetail.js')