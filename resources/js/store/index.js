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
            axios.get('/all-category')
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
