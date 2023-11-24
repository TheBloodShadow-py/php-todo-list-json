<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Dork</title>
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
    <script src="https://unpkg.com/vue@3/dist/vue.global.js"></script>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="./css/main.css" />
    <script src="https://cdn.lordicon.com/lordicon-1.1.0.js"></script>
  </head>
  <body id="app" class="bg-[#f3f3f3] select-none overflow-x-hidden">
    <main class="w-full flex justify-center">
      <section class="p-5 flex flex-col gap-5 my-10">
        <h1 class="font-bold drop-shadow-sm text-slate-800 text-3xl max-w-[260px]">TODO List Design in Vue & PhP</h1>
        <div class="flex gap-2">
          <input
            @keypress.enter="addTask()"
            v-model.trim="taskTitleInput"
            type="text"
            placeholder="Task Name..."
            class="p-2 text-slate-600 w-[50%] drop-shadow-md rounded-md focus-visible:outline-none text-sm"
          />
          <input
            @keypress.enter="addTask()"
            v-model="taskDescriptionInput"
            type="text"
            placeholder="Task Description..."
            class="p-2 text-slate-600 w-[50%] drop-shadow-md rounded-md focus-visible:outline-none text-sm"
          />
        </div>
        <span class="text-slate-700 text-sm" v-if="errorStatus">Error you must enter at least 3 characters!</span>
        <span class="text-slate-700 text-sm" v-if="errorStatus2">Error you can enter a maximum of 30 characters</span>

        <button
          @click="addTask()"
          class="py-2 self-start px-5 text-center rounded-md drop-shadow-md hover:bg-slate-600 transition-colors duration-300 bg-slate-700 text-white"
        >
          Add a new Task!
        </button>
        <ul class="flex flex-col gap-3 mt-6 md:w-[500px] xl:w-[600px] w-[350px]">
          <li
            @click="changeStatus(index)"
            v-for="task, index in tasksList"
            class="p-4 rounded-md drop-shadow-lg bg-white relative"
          >
            <h1 class="font-bold text-base md:text-lg text-slate-800 ml-2 md:ml-5">{{task.taskTitle}}</h1>
            <span class="text-xs md:text-sm text-slate-600 ml-2 md:ml-5">{{task.taskDescription}}</span>
            <div
              :class="task.taskStatus ? 'list-check bg-emerald-500' : 'list-check bg-red-500' "
              role="todo status"
            ></div>
            <lord-icon
              src="https://cdn.lordicon.com/skkahier.json"
              trigger="hover"
              colors="primary:#e83a30"
              class="delete-icon"
            >
            </lord-icon>
          </li>
        </ul>
      </section>
    </main>
    <script src="./js/main.js" async></script>
  </body>
</html>
