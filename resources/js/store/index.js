export default {
    state: {
        categories: [],
        posts: []
    },
    getters: {
        getCategory(state) {
            return state.categories
        }
    },
    actions: {
        categories(context) {
            axios.get('/categories')
                .then((response) => {
                    context.commit('categories', response.data.categories);
                })
        },
        posts(context){
            axois.post('/posts')
                .then((response) => {
                  context.commit('posts', response.data.posts);
                })
        }
    },
    mutations: {
        categories(state, payload) {
            return state.categories = payload;
        },
        post(state, payload){
            return state.posts = payload
        }
    }
}
