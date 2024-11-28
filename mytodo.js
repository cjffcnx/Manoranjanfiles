document.getElementById('todoForm').addEventListener('submit', function(event) {
    event.preventDefault();

    const todoText = document.getElementById('todoText').value;
    
    if (todoText) {
        fetch('add_todo.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded',
            },
            body: 'todo_text=' + encodeURIComponent(todoText),
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                loadTodos();
                document.getElementById('todoText').value = ''; // Clear input
            } else {
                alert('Failed to add to-do');
            }
        });
    }
});

// Function to load todos from the database
function loadTodos() {
    fetch('get_todos.php')
        .then(response => response.json())
        .then(data => {
            const todoList = document.getElementById('todoList');
            todoList.innerHTML = ''; // Clear current list
            data.todos.forEach(todo => {
                const li = document.createElement('li');
                li.innerHTML = `
                    ${todo.todo_text}
                    <button onclick="deleteTodo(${todo.id})">Delete</button>
                `;
                todoList.appendChild(li);
            });
        });
}

// Function to delete a to-do
function deleteTodo(todoId) {
    fetch('delete_todo.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded',
        },
        body: 'todo_id=' + todoId
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            loadTodos();
        } else {
            alert('Failed to delete to-do');
        }
    });
}

// Load todos on page load
window.onload = loadTodos;
