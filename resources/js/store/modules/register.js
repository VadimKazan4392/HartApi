
export default {
    namespaced: true,
    state: {},
    actions: {
        signUp(_, credentials) {
            axios.post('https://laravel-api-for-hart-digital.herokuapp.com/api/register', credentials)
            .then(response => {
                response.data
            })
        }
    },
    mutations: {},
    getters: {},
}