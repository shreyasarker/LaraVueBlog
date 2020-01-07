<template>
    <div>
        <section class="content">
            <div class="row justify-content-around">
                <div class="col-8">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Category List</h3>
                            <div class="card-tools">
                                <button class="btn btn-primary">
                                    <router-link to="/add-category" style="color: #ffffff">Add Category</router-link>
                                </button>
                            </div>
                        </div>
                        <div class="card-body">
                            <table id="example2" class="table table-bordered table-hover">
                                <thead>
                                <tr>
                                    <th>SI</th>
                                    <th>Category Name</th>
                                    <th>Date</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr v-for="(category, index) in getAllCategory">
                                    <td>{{ index + 1 }}</td>
                                    <td>{{ category.cat_name }}</td>
                                    <td>{{ category.created_at | time_format }}</td>
                                    <td>
                                        <router-link :to="`/edit-category/${category.id}`">Edit</router-link>
                                        <a href="#" @click.prevent="deleteCategory(category.id)">Delete</a>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</template>

<script>
    export default {
        name: "List",
        mounted() {
            this.$store.dispatch('getAllCategory')
        },
        computed: {
            getAllCategory() {
                return this.$store.getters.getCategory
            }
        },
        methods: {
            deleteCategory(id){
                axios.get('/categories/delete/'+id)
                    .then((response)=>{
                        this.$store.dispatch('getAllCategory')
                        toast.fire({
                            type : 'success',
                            title : response.data.message
                        });
                    })
                    .catch((error) => {

                    })
            }
        }
    }
</script>

<style scoped>

</style>
