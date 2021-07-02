<template>
  <div class="taskList">
    <div v-for="task in allTasks" :key="task.id" class="list-group-item">
      <div class="row">
        <span class="col-1">
          <input type="checkbox" @change="complite(task)" v-model="task.status"/>
        </span>
        <span class="col-3">
          <span :class="[task.status ? 'complited' : '']">{{ task.title }}</span>
        </span>
        <span class="col-6">
          <span :class="[task.status ? 'complited' : '']">{{ task.description }}</span>
        </span>
        <span class="col-1">
          <button
            @click="destroy(task.id)"
            type="submit"
            class="btn btn-danger"
          >
            Delete
          </button>
        </span>
      </div>
    </div>
  </div>
</template>

<script>
import { mapGetters, mapActions } from "vuex";

export default {

  computed: {
    ...mapGetters({
      allTasks: "task/allTasks",
      status: "task/status"
    }),
  },

  methods: {
    ...mapActions({
      fetchTasks: "task/fetchTasks",
      destroyTask: "task/destroyTask",
      updateChe: "task/updateChe",
    }),

    destroy(id) {
      this.destroyTask(id);
    },

    complite(task) {
      this.updateChe(task)
    }
  },

  mounted() {
    this.fetchTasks();
  },
};
</script>

<style scoped>


.list-group-item {
  border: none;
  border-radius: 15px;
  margin-top: 15px;
}

.row {
  display: flex;
  justify-content: center;
  align-items: center;
}

.complited {
  color: cadetblue;
  text-decoration: line-through;
}
</style>