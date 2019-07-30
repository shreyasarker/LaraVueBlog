export default {
    state: {
        category: [],
    },
    getters: {
        getCategory(state) {
            return state.category
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
            return state.category = context;
        }
    }
}