const todoAdd = document.getElementById('todo_add');
const submit = document.getElementById('submit');
const cloneIn = document.getElementById('clone_in');

let count = 0;
const maxCount = 5;

////////////////////////////
//- セット数の記録メモを増やす -//
///////////////////////////
todoAdd.addEventListener('click', (event) => {
    event.preventDefault();

    count++;

    if (count < maxCount) {
        const todoBox = document.getElementById('todo_box');
        const cloneTodoBox = todoBox.cloneNode(true);

        cloneTodoBox.id = 'todo_box' + count;
        cloneTodoBox.querySelector('#set').textContent = count + 1;

        cloneIn.appendChild(cloneTodoBox);
    } else {
        todoAdd.disabled = true;
    }
});

////////////////////////////////////////////////////////
//- トレーニング記録ように入力値を取得しfechAPIで渡す用に加工する -//
////////////////////////////////////////////////////////
submit.addEventListener('click', (event) => {
    event.preventDefault();

    // URLパラメータから値を取得
    const urlParams = new URLSearchParams(window.location.search);
    const user_id = urlParams.get('id');
    const part = urlParams.get('part'); //部位
    const exercise_name = urlParams.get('name'); //種目名

    // 各セットの入力値をまとめるもの
    const todoArray = [];

    // 元のtodo_boxの入力値を取得して配列にまとめる
    const todoBox = document.getElementById('todo_box');
    const setNo = todoBox.querySelector('#set').textContent;
    const todoBoxInput = todoBox.querySelectorAll('input[type="text"], input[type="radio"]:checked, select');
    const mainBoxObj = {};

    // 1セット目にsetNoを追加する
    mainBoxObj['setNo'] = setNo;

    // 1セット目を連想配列として作成する。
    todoBoxInput.forEach(input => {
        mainBoxObj[input.name] = input.value;
    });

    // 1セット目のみを追加(1セットのみだけを登録する可能性があるため)
    todoArray.push(mainBoxObj);

    // クローンしたセットブロックを取得する
    const cloneTodoBoxs = document.getElementById('clone_in');
    const todoBoxes = cloneTodoBoxs.querySelectorAll('[id^="todo_box"]');

    // クローンした各todo_boxのデータを配列にまとめる
    todoBoxes.forEach(box => {
        const boxObj = {};
        const inputs = box.querySelectorAll('input[type="text"], input[type="radio"]:checked, select');
        const setNo = box.querySelector('#set').textContent;

        // コピーのセット番号を追加
        boxObj['setNo'] = setNo;

        inputs.forEach(input => {
            boxObj[input.name] = input.value;
        });

        // 2セット名以降を追加
        todoArray.push(boxObj);
    });

    // 最上位にURLパラメータを追加してAPI再構築する
    const requestData = {
        user_id: user_id,
        exercise_name: exercise_name,
        part: part,
        todoArray: todoArray
    };

    // トレーニングのセットを記録するためDBに保存するため送信
    fetch('/TrainingDetail', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            },
            body: JSON.stringify(requestData)
        })
        .then(response => response.json())
        .then(data => {
            console.log('Success', data);
            tapChangeHome(data);
        })
});

///////////////////////////////
//- 登録が完了後のお知らせアラート -//
//////////////////////////////
function tapChangeHome(bool) {
    const okBool = alert('登録が完了しました。');

    if (!okBool) {
        window.location.href = '/Home';
    }
}