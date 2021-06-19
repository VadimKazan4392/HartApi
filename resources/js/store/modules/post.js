export default {
    state: {
        posts: []
    },

    actions: {
        fetchPosts(context) {
            axios.get('https://jsonplaceholder.typicode.com/posts')
            .then(response => {
                const posts = response.data
                context.commit('updatePosts', posts)
            })
        }
    },

    mutations: {
        updatePosts(state, posts) {
            state.posts = posts
        }
    },

    getters: {
        allPosts(state) {
            console.log('getter all posts')
            return state.posts
        }
    }
}