const todoAdd = document.getElementById('todo_add');
const submit = document.getElementById('submit');
const cloneIn = document.getElementById('clone_in');

let count = 0;
const maxCount = 5;

//セット数の記録メモを増やす //
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

// トレーニング記録ように入力値を取得しfechAPIで渡す用に加工する //
submit.addEventListener('click', (event) => {
    event.preventDefault();

    // fechAPIでtodo_ boxと名のついたボックスの入力値をまとめて渡すための配列
    const todoArray = [];
    const boxArray = [];

    // TODO::セット1は保存できていないから配列に入れる
    const todoBox = document.getElementById('todo_box');
    const todoBoxInput = todoBox.querySelectorAll('input[type="text"], input[type="radio"], select');

    // コピーしたセットブロックを取得する
    const cloneTodoBoxs = document.getElementById('clone_in');
    const todoBoxes = cloneTodoBoxs.querySelectorAll('[id^="todo_box"]');

    // fetchAPIでまとめて渡すために配列に追加したセット数をまとめる
    todoBoxes.forEach(box => {

        const inputs = box.querySelectorAll('input[type="text"], input[type="radio"]:checked, select');
        inputs.forEach(input => {
            boxArray.push({
                [input.name]: input.value
            });
        });

        todoArray.push(boxArray);
    });
});