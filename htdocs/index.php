<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Drag & Drop API</title>

    <link rel="stylesheet" href="styles.css" />
    <script src="drag.js" defer></script>
    <script src="todo.js" defer></script>
  </head>
  <body>
    <div class="board">
      <form id="todo-form">
        <input type="text" placeholder="New TODO..." id="todo-input" />
        <button type="submit">Add +</button>
      </form>

      <div class="lanes">
        <div class="swim-lane" id="todo-lane">
          <h3 class="heading">TODO</h3>

          <p class="task" draggable="true">Get groceries</p>
          <p class="task" draggable="true">Feed the dogs</p>
          <p class="task" draggable="true">Mow the lawn</p>
        </div>

        <div class="swim-lane">
          <h3 class="heading">Doing</h3>

          <p class="task" draggable="true">Binge 80 hours of Game of Thrones</p>
        </div>

        <div class="swim-lane">
          <h3 class="heading">Done</h3>

          <p class="task" draggable="true">
            Watch video of a man raising a grocery store lobster as a pet
          </p>
        </div>
      </div>
    </div>
  </body>
</html>