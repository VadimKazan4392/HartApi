

export default {
    namespaced: true,

    state: {
        token: null,
        user: null
    },
    actions: {
        async signIn({ dispatch }, credentials) {
            let response = await axios.post('https://laravel-api-for-hart-digital.herokuapp.com/api/login', credentials)

            return dispatch('attempt', response.data.access_token)
        },

        async attempt({ commit, state }, token) {
            if (token) {
                commit('SET_TOKEN', token)
            }

            if (!state.token) {
                return
            }

            try {
                let response = await axios.get('https://laravel-api-for-hart-digital.herokuapp.com/api/user')

                commit('SET_USER', response.data)
            } catch (e) {
                commit('SET_TOKEN', null)
                commit('SET_USER', null)
            }
        },

        async signOut({ commit }) {
            return axios.get('https://laravel-api-for-hart-digital.herokuapp.com/api/logout').then(
                () => {
                    commit('SET_TOKEN', null)
                    commit('SET_USER', null)
                }
            )
        }
    },
    mutations: {
        SET_TOKEN(state, token) {
            state.token = token
        },

        SET_USER(state, user) {
            state.user = user
        }
    },

    getters: {
        authentificated(state) {
            return state.token && state.user
        },
        user(state) {
            return state.user
        }
    }
}