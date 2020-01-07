export default {
    state: {
        categories: [],
    },
    getters: {
        getCategory(state) {
            return state.categories
        }
    },
    actions: {
        getAllCategory(context) {
            axios.get('/categories')
                .then((response) => {
                    context.commit('categories', response.data.categories);
                })
        }
    },
    mutations: {
        categories(state, context) {
            return state.categories = context;
        }
    }
}
