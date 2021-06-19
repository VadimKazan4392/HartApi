import Vue from 'vue'
import VueRouter from 'vue-router'
import RootComponent from '../components/content/RootComponent'
import About from '../components/content/About'
import Login from '../components/auth/Login'
import Register from '../components/auth/Register'

Vue.use(VueRouter)

const routes = [
    {
        name: 'about',
        path: '/about',
        component: About
    },
    {
        path: '/',
        component: RootComponent
    },
    {
        path: '/register',
        component: Register
    },
    {
        path: '/login',
        component: Login
    }
]

export default new VueRouter({
    routes,
    mode: 'history',
    linkActiveClass: 'active'
})