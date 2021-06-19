import Vue from 'vue'
import Vuex from 'vuex'
import register from './modules/register'
import post from './modules/post'
import auth from './modules/auth'

Vue.use(Vuex)

export default new Vuex.Store({
    modules: {register, auth, post}
})