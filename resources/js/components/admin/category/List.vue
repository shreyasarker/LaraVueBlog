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
                                    <td>{{ category.created_at }}</td>
                                    <td>
                                        <a href="#">Edit</a>
                                        <a href="#">Delete</a>
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

        }
    }
</script>

<style scoped>

</style>
