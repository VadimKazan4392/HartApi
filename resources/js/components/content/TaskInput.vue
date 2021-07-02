<template>
  <div>
    <div class="d-flex justify-content-center">
      <form class="col-md-7" @submit.prevent="submit">
        <div class="form-group">
          <input v-model="input.title" type="text" class="form-control" placeholder="Enterrr title" />
        </div>
        <div class="form-group">
          <input v-model="input.description" type="text" class="form-control" placeholder="Description" />
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
      </form>
    </div>
  </div>
</template>

<script>

import {mapActions} from 'vuex'

export default {
    data() {
        return {
            input: {
                title: '',
                description: ''
            }
        }
    },

    methods: {
        ...mapActions({
            addTask: 'task/addTask'
        }),

        submit() {
            this.addTask(this.input)
            this.input = ''
        }
    }
};
</script>