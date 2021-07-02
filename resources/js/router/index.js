import Vue from 'vue'
import VueRouter from 'vue-router'
import RootComponent from '../components/content/RootComponent'
import StartPage from '../components/content/StartPage'
import Login from '../components/auth/Login'
import Register from '../components/auth/Register'

Vue.use(VueRouter)

const routes = [
    {
        name: 'start',
        path: '/',
        component: StartPage
    },
    {
        name: 'tasks',
        path: '/start',
        component: RootComponent
    },
    {
        path: '/register',
        component: Register
    },
    {
        name: 'login',
        path: '/login',
        component: Login
    }
]

export default new VueRouter({
    routes,
    mode: 'history',
    linkActiveClass: 'active'
})