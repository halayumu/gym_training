const todoAdd = document.getElementById('todo_add');
const submit = document.getElementById('submit');
const cloneIn = document.getElementById('clone_in');

let count = 0;
const maxCount = 5;

//- セット数の記録メモを増やす -//
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

//- トレーニング記録ように入力値を取得しfechAPIで渡す用に加工する -//
submit.addEventListener('click', (event) => {
    event.preventDefault();

    console.log("送信ボタンが押されました");

    // URLパラメータから値を取得
    const urlParams = new URLSearchParams(window.location.search);
    const user_id = urlParams.get('id');
    const part = urlParams.get('part'); //部位
    const exercise_name = urlParams.get('name'); //種目名
    const day = urlParams.get('day'); // 日付（必要なら）

    // 各セットの入力値をまとめるもの
    const todoArray = [];

    // 元のtodo_boxの入力値を取得して配列にまとめる
    const todoBox = document.getElementById('todo_box');
    const todoBoxInput = todoBox.querySelectorAll('input[type="text"], input[type="radio"]:checked, select');
    const mainBoxObj = {};

    todoBoxInput.forEach(input => {
        mainBoxObj[input.name] = input.value;
    });
    todoArray.push(mainBoxObj);

    // クローンしたセットブロックを取得する
    const cloneTodoBoxs = document.getElementById('clone_in');
    const todoBoxes = cloneTodoBoxs.querySelectorAll('[id^="todo_box"]');

    // クローンした各todo_boxのデータを配列にまとめる
    todoBoxes.forEach(box => {
        const boxObj = {};
        const inputs = box.querySelectorAll('input[type="text"], input[type="radio"]:checked, select');
        inputs.forEach(input => {
            boxObj[input.name] = input.value;
        });
        todoArray.push(boxObj);
    });

    // 最上位にURLパラメータを追加してAPI再構築する
    const requestData = {
        user_id: user_id,
        exercise_name: exercise_name,
        part: part,
        todoArray: todoArray
    };

    // トレーニング記録を送信する
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
        })
});