
export default {
    namespaced: true,
    state: {},
    actions: {
        signUp(_, credentials) {
            axios.post('http://laravel.api/api/register', credentials)
            .then(response => {
                response.data
            })
        }
    },
    mutations: {},
    getters: {},
}