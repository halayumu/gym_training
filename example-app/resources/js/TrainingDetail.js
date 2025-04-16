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

    const todoArray = [];

    const todoBox = document.getElementById('todo_box');
    const todoBoxInput = todoBox.querySelectorAll('input[type="text"], input[type="radio"], select');
    todoBoxInput.forEach(input => {
        todoArray.push({
            [input.name]: input.value
        });
    });
    console.log(todoArray);
});