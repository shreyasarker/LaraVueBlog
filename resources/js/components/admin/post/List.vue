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
                                    <th>Photo</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr v-for="(post, index) in posts">
                                    <td>{{ index + 1 }}</td>
                                    <td>{{ post.user.name }}</td>
                                    <td>{{ post.category.cat_name }}</td>
                                    <td>{{ post.title | shorttext(20) }}</td>
                                    <td>{{ post.description | shorttext(30) }}</td>
                                    <td><img :src="showImage(post.photo)" alt="Post photo" width="50" height="50"></td>
                                    <td>
                                        <router-link :to="`/edit-post/${post.id}`">Edit</router-link>
                                        <a href="#" @click.prevent="deletePost(post.id)">Delete</a>
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
            showImage(image){
                return 'post_images/' + image;
            },
            deletePost(id){
                axios.get('/blogposts/delete/'+id)
                    .then((response)=>{
                        this.$store.dispatch('posts');
                        toast.fire({
                            type : 'success',
                            title : response.data.message
                        });
                    })
            }
        }
    }
</script>

<style scoped>

</style>
