("use strict");

const { createApp } = Vue;

createApp({
  data() {
    return {
      taskTitleInput: "",
      taskDescriptionInput: "",
      errorStatus: false,
      errorStatus2: false,
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
      if (this.taskTitleInput.length < 1 && this.taskDescriptionInput.length < 1) {
        return;
      }
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
          console.log(resp);
          this.tasksList = resp.data;
        });
    },
  },
  created() {
    this.fetchData();
  },
}).mount("#app");
