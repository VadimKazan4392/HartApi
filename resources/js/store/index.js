import Vue from 'vue'
import Vuex from 'vuex'
import register from './modules/register'
import task from './modules/task'
import auth from './modules/auth'

Vue.use(Vuex)

export default new Vuex.Store({
    modules: {register, auth, task}
})