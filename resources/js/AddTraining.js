const addButton = document.getElementById('add_button');

/**
 * 筋トレ内容を登録するために
 */
addButton.addEventListener('click', () => {

    // 入力情報を取得
    const part = document.getElementById('part').value;
    const trainingExerciseName = document.getElementById('trainingExerciseName').value;
    const weekday = document.getElementById('weekday').value;

    // fechAPIに渡すデータ
    const newMenu = {
        part: part,
        trainingExerciseName: trainingExerciseName,
        weekday: weekday
    }

    MenuJson(newMenu);
});

/**
 * 登録結果をダイアログで表示する
 */
function addDialog(bool) {
    if (bool) {
        const tapResult = window.confirm("登録完了しました。\n続けて入力される場合はOKを選択してください\nキャンセルをタップでホーム画面に戻ります。");

        if (!tapResult) {
            window.location.href = "/Home";
        }

    } else {
        alert("登録できませんでした。");
    }
}


/**
 * AddTrainingのメニューをmenuRegistration()メソッドでトレ内容を登録する
 */
function MenuJson(newMenu) {
    fetch('/AddTraining', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            },
            body: JSON.stringify({ addMenu: newMenu })
        })
        .then(response => response.json())
        .then(data => {
            console.log('Success', data);
            addDialog(data.addTreResultJson);
        })
        .catch((error) => {
            console.error('Error:', error);
        });
}