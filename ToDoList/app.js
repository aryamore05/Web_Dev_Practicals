const addTodoBtn = document.getElementById("addTodoBtn");
const inputTag = document.getElementById("todoInput");
const todoListUl = document.getElementById("todoList");
const remaining = document.getElementById("itemsLeft"); // FIXED ID
const clearCompletedBtn = document.getElementById("clearCompletedBtn");

let todos = [];
let todosString = localStorage.getItem("todos");

// Load from localStorage
if (todosString) {
  todos = JSON.parse(todosString);
}

// ✅ Helper to update remaining count
const updateRemaining = () => {
  remaining.innerHTML = `${todos.filter(todo => !todo.isCompleted).length} items left`;
};

// ✅ Render todos
const populateTodos = () => {
  let string = "";

  for (const todo of todos) {
    string += `
      <li id="${todo.id}" class="todo-item ${todo.isCompleted ? "completed" : ""}">
        <input type="checkbox" class="todo-checkbox" ${todo.isCompleted ? "checked" : ""}>
        <span class="todo-text">${todo.title}</span>
        <button class="delete-btn">×</button>
      </li>
    `;
  }

  todoListUl.innerHTML = string;

  // ✅ Checkbox toggle
  document.querySelectorAll(".todo-checkbox").forEach((checkbox) => {
    checkbox.addEventListener("change", (e) => {
      const parent = e.target.parentNode;

      todos = todos.map((todo) => {
        if (todo.id === parent.id) {
          return { ...todo, isCompleted: e.target.checked };
        }
        return todo;
      });

      localStorage.setItem("todos", JSON.stringify(todos));
      populateTodos();
    });
  });

  // ✅ Delete buttons
  document.querySelectorAll(".delete-btn").forEach((btn) => {
    btn.addEventListener("click", (e) => {
      const confirmDelete = confirm("Do you want to delete this todo?");
      if (!confirmDelete) return;

      const parent = e.target.parentNode;

      todos = todos.filter((todo) => todo.id !== parent.id);

      localStorage.setItem("todos", JSON.stringify(todos));
      populateTodos();
    });
  });

  updateRemaining();
};

// ✅ Add new todo
addTodoBtn.addEventListener("click", () => {
  const todoText = inputTag.value.trim();

  if (todoText.length < 4) {
    alert("Todo must be at least 4 characters!");
    return;
  }

  const todo = {
    id: "todo-" + Date.now(),
    title: todoText,
    isCompleted: false,
  };

  todos.push(todo);

  inputTag.value = "";
  localStorage.setItem("todos", JSON.stringify(todos));
  populateTodos();
});

// ✅ Clear completed (MOVED OUTSIDE)
clearCompletedBtn.addEventListener("click", () => {
  todos = todos.filter((todo) => !todo.isCompleted);
  localStorage.setItem("todos", JSON.stringify(todos));
  populateTodos();
});

// ✅ Initial render
populateTodos();