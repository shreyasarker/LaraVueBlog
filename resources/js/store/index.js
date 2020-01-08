export default {
    state: {
        categories: [],
        posts: []
    },
    getters: {
        getCategory(state) {
            return state.categories
        },
        getPost(state){
            return state.posts
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
            axios.get('/posts')
                .then((response) => {
                  context.commit('posts', response.data.posts);
                })
        }
    },
    mutations: {
        categories(state, payload) {
            return state.categories = payload;
        },
        posts(state, payload){
            return state.posts = payload
        }
    }
}
