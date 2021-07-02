<template>
  <div>
      <task-input></task-input>
      <task-list></task-list>
  </div>
</template>


<script>

import TaskInput from './TaskInput.vue'
import TaskList from './TaskList.vue'

export default {
    components:{TaskInput, TaskList},
};
</script>

<style scoped>

</style>
