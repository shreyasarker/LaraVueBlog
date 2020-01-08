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
        categories(payload) {
            axios.get('/categories')
                .then((response) => {
                    payload.commit('categories', response.data.categories);
                })
        },
        posts(){
            axois.post('/posts')
                .then((response) => {
                  commit('posts', response.data.posts);
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
