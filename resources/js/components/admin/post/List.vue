<template>
    <div>
        <section class="content">
            <div class="row justify-content-around">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Post List</h3>
                            <div class="card-tools">
                                <button class="btn btn-primary">
                                    <router-link to="/add-post" style="color: #ffffff">Add Post</router-link>
                                </button>
                            </div>
                        </div>
                        <div class="card-body">
                            <table id="example2" class="table table-bordered table-hover">
                                <thead>
                                <tr>
                                    <th>SI</th>
                                    <th>User</th>
                                    <th>Category</th>
                                    <th>Title</th>
                                    <th>Description</th>
                                    <th>Date</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr v-for="(post, index) in posts">
                                    <td>{{ index + 1 }}</td>
                                    <td>{{ post.user.name }}</td>
                                    <td>{{ post.category.cat_name }}</td>
                                    <td>{{ post.title }}</td>
                                    <td>{{ post.description }}</td>
                                    <td>{{ post.created_at | time_format }}</td>
                                    <td>
                                        <a href="">Edit</a>
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
            this.$store.dispatch('posts');
        },
        computed: {
            posts(){
                return this.$store.getters.getPost
            }
        },
        methods: {

        }
    }
</script>

<style scoped>

</style>
