("use strict");

const { createApp } = Vue;

createApp({
  data() {
    return {
      taskTitleInput: "",
      taskDescriptionInput: "",
      errorEmptyStatus: false,
      tasksList: [],
      axios,
    };
  },
  methods: {
    fetchData: function () {
      this.axios.get("./server.php").then((resp) => {
        this.tasksList = resp.data;
      });
    },
    addTask: function () {
      if (this.taskTitleInput.length < 3 && this.taskDescriptionInput.length < 3) {
        this.errorEmptyStatus = true;
        return;
      }
      this.errorEmptyStatus = false;
      const data = {
        todo_title: this.taskTitleInput,
        todo_description: this.taskDescriptionInput,
      };

      this.axios
        .post("./addtodo.php", data, {
          headers: {
            "Content-Type": "multipart/form-data",
          },
        })
        .then((resp) => {
          this.tasksList = resp.data;
        });
    },
    changeStatus: function (index) {
      const data = {
        change_task_index: index,
      };

      this.axios
        .post("./changestatus.php", data, {
          headers: {
            "Content-Type": "multipart/form-data",
          },
        })
        .then((resp) => {
          this.tasksList = resp.data;
        });
    },
    deleteTodo: function (index) {
      const data = {
        delete_task_index: index,
      };

      this.axios
        .post("./deletetodo.php", data, {
          headers: {
            "Content-Type": "multipart/form-data",
          },
        })
        .then((resp) => {
          this.tasksList = resp.data;
        });
    },
  },
  created() {
    this.fetchData();
  },
}).mount("#app");
