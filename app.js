const form = document.getElementById('todo-form');
const input = document.getElementById('todo-input');
const todoList = document.getElementById('todo-list');

form.addEventListener('submit', function(event) {
  event.preventDefault();

  const todoText = input.value.trim();
  if (todoText !== '') {
    addTodoItem(todoText);
    saveTodoItem(todoText);
    input.value = '';
  }
});

function addTodoItem(text) {
  const listItem = document.createElement('li');
  listItem.innerText = text;
  todoList.appendChild(listItem);
}

function saveTodoItem(text) {
  const xhr = new XMLHttpRequest();
  xhr.open('POST', 'bdd.php', true);
  xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
  xhr.onreadystatechange = function() {
    if (xhr.readyState === XMLHttpRequest.DONE && xhr.status === 200) {
      console.log('To-do item saved successfully.');
    }
  };
  xhr.send(`todoText=${encodeURIComponent(text)}`);
}
