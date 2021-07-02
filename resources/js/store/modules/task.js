import axios from "axios"

export default {
    namespaced: true,

    state: {
        tasks: []
    },

    actions: {
        async fetchTasks(context) {
            const token = this.state.auth.token
            await axios.get('https://laravel-api-for-hart-digital.herokuapp.com/tasks', {headers: {
                'Content-Type': 'application/json',
                'Authorization': `Bearer ${token}`
            }})
            .then(response => {
                const tasks = response.data.data
                context.commit('updateTasks', tasks)
            })
        },

        async addTask(context, credentials) {
            await axios.post('https://laravel-api-for-hart-digital.herokuapp.com/tasks', credentials)
            .then(response => {
                const tsk = response.data.data
                context.commit('createTask', tsk)
                context.commit('updateTasks', state.tasks)
            })
        },

        async destroyTask(context, credentials) {
            await axios.delete('https://laravel-api-for-hart-digital.herokuapp.com/tasks/' + credentials)
            .then(() => {
                context.commit('deleteTask', credentials)
            })
        },
        
        updateChe(context, credentials) {
            axios.patch('https://laravel-api-for-hart-digital.herokuapp.com/tasks/' + credentials.id, credentials)
        }
    },

    mutations: {
        updateTasks(state, tasks) {
            state.tasks = tasks
        },
        createTask(state, task) {
            console.log('createTaskMutation')
            state.tasks.unshift(task)
        },
        deleteTask(state, id) {
            const index = state.tasks.findIndex(task => task.id == id)
            state.tasks.splice(index,1)
        },
        updateCheck(state, task) {
            console.log(state.tasks)
        }
    },

    getters: {
        allTasks(state) {
            console.log('getter all posts')
            return state.tasks
        },

        status(state) {
            return state.tasks
        }
    }
}