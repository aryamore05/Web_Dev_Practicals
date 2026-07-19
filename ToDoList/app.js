const form = document.getElementById("todoForm");
const input = document.getElementById("todoInput");
const todoList = document.getElementById("todoList");
const itemsLeft = document.getElementById("itemsLeft");
const clearCompletedButton = document.getElementById("clearCompletedBtn");
const formMessage = document.getElementById("formMessage");
const filterButtons = [...document.querySelectorAll(".filter-btn")];

const STORAGE_KEY = "my-todo-list-v1";
let activeFilter = "all";
let todos = loadTodos();

function loadTodos() {
  try {
    const saved = JSON.parse(localStorage.getItem(STORAGE_KEY));
    return Array.isArray(saved) ? saved.filter(isValidTodo) : [];
  } catch { return []; }
}

function isValidTodo(todo) {
  return todo && typeof todo.id === "string" && typeof todo.title === "string" && typeof todo.isCompleted === "boolean";
}

function saveTodos() { localStorage.setItem(STORAGE_KEY, JSON.stringify(todos)); }

function visibleTodos() {
  if (activeFilter === "active") return todos.filter(todo => !todo.isCompleted);
  if (activeFilter === "completed") return todos.filter(todo => todo.isCompleted);
  return todos;
}

function makeTodoElement(todo) {
  const item = document.createElement("li");
  item.className = `todo-item${todo.isCompleted ? " completed" : ""}`;

  const checkbox = document.createElement("input");
  checkbox.type = "checkbox";
  checkbox.className = "todo-checkbox";
  checkbox.checked = todo.isCompleted;
  checkbox.setAttribute("aria-label", `Mark ${todo.title} as ${todo.isCompleted ? "active" : "completed"}`);
  checkbox.addEventListener("change", () => toggleTodo(todo.id));

  const text = document.createElement("span");
  text.className = "todo-text";
  text.textContent = todo.title;

  const remove = document.createElement("button");
  remove.className = "delete-btn";
  remove.type = "button";
  remove.textContent = "×";
  remove.title = "Delete task";
  remove.setAttribute("aria-label", `Delete ${todo.title}`);
  remove.addEventListener("click", () => deleteTodo(todo.id));

  item.append(checkbox, text, remove);
  return item;
}

function render() {
  todoList.replaceChildren();
  const tasks = visibleTodos();
  if (!tasks.length) {
    const empty = document.createElement("li");
    empty.className = "empty-state";
    const label = activeFilter === "all" ? "No tasks yet" : `No ${activeFilter} tasks`;
    empty.innerHTML = `<div><strong>${label}</strong>${activeFilter === "all" ? "Add your first task above." : "Try another filter or add a task."}</div>`;
    todoList.append(empty);
  } else tasks.forEach(todo => todoList.append(makeTodoElement(todo)));

  const count = todos.filter(todo => !todo.isCompleted).length;
  itemsLeft.textContent = `${count} ${count === 1 ? "item" : "items"} left`;
  const completedCount = todos.filter(todo => todo.isCompleted).length;
  clearCompletedButton.disabled = completedCount === 0;
  clearCompletedButton.textContent = completedCount ? `Clear completed (${completedCount})` : "Clear completed";
}

function toggleTodo(id) { todos = todos.map(todo => todo.id === id ? { ...todo, isCompleted: !todo.isCompleted } : todo); saveTodos(); render(); }
function deleteTodo(id) { todos = todos.filter(todo => todo.id !== id); saveTodos(); render(); }

form.addEventListener("submit", event => {
  event.preventDefault();
  const title = input.value.trim();
  if (title.length < 2) { formMessage.textContent = "Please enter at least 2 characters."; input.focus(); return; }
  todos.unshift({ id: crypto.randomUUID?.() ?? `todo-${Date.now()}`, title, isCompleted: false });
  input.value = "";
  formMessage.textContent = "";
  saveTodos(); render(); input.focus();
});

filterButtons.forEach(button => button.addEventListener("click", () => {
  activeFilter = button.dataset.filter;
  filterButtons.forEach(item => { const selected = item === button; item.classList.toggle("active", selected); item.setAttribute("aria-pressed", String(selected)); });
  render();
}));

clearCompletedButton.addEventListener("click", () => { todos = todos.filter(todo => !todo.isCompleted); saveTodos(); render(); });
render();
