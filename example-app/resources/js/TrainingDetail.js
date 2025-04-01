const todoAdd = document.getElementById('todo_add');
const cloneIn = document.getElementById('clone_in');

let count = 0;
const maxCount = 5;

todoAdd.addEventListener('click', (event) => {
    event.preventDefault();

    const todoBox = document.getElementById('todo_box');
    const cloneTodoBox = todoBox.cloneNode(true);

    cloneIn.appendChild(cloneTodoBox);
});