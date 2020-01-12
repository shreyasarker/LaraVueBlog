<template>
    <section class="content">
        <div class="container-fluid">
            <div class="row justify-content-around">
                <div class="col-md-10">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Add Post</h3>
                        </div>
                        <form role="form" @submit.prevent="addPost" enctype="multipart/form-data">
                            <div class="card-body">

                                <div class="form-group">
                                    <label for="category_id">Category</label>
                                    <select name="category_id" id="category_id" class="form-control"
                                            v-model="form.category_id"
                                            :class="{ 'is-invalid': form.errors.has('category_id') }">
                                        <option value="">Select Category</option>
                                        <option v-for="category in getCategory" :value="category.id">{{ category.cat_name }}</option>
                                    </select>
                                    <has-error :form="form" field="category_id"></has-error>
                                </div>

                                <div class="form-group">
                                    <label for="title">Title</label>
                                    <input type="text" class="form-control" id="title"
                                           v-model="form.title" name="title"
                                           :class="{ 'is-invalid': form.errors.has('title') }"
                                           placeholder="Enter Title">
                                    <has-error :form="form" field="title"></has-error>
                                </div>

                                <div class="form-group">
                                    <label>Description</label>
                                    <wysiwyg v-model="form.description"/>
                                </div>

                                <div class="form-group">
                                    <label for="photo">Photo</label>
                                    <input type="file" id="photo"
                                           :class="{ 'is-invalid': form.errors.has('photo') }"
                                    @change="changePhoto($event)">
                                    <br>
                                    <img :src="form.photo" width="100" height="100" alt="">

                                    <has-error :form="form" field="photo"></has-error>
                                </div>

                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Save</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</template>

<script>
    export default {
        name: "Add",
        data() {
            return {
                form: new Form({
                    category_id: '',
                    title: '',
                    description: '',
                    photo: ''
                })
            }
        },
        mounted(){
            this.$store.dispatch('categories')
        },
        computed: {
            getCategory(){
                return this.$store.getters.getCategory
            }
        },
        methods: {
            changePhoto(event){
                let file = event.target.files[0];
                if(file.size > 1048576){ //Greater than 1 MB
                    swal.fire({
                        type: 'error',
                        title: 'Oops',
                        text: 'Image size should be less than 1 MB'
                    });
                }else{
                    let reader = new FileReader();
                    reader.onload = (event) => {
                        this.form.photo = event.target.result;
                    };
                    reader.readAsDataURL(file);
                }
            },
            addPost(){
                this.form.post('/blogposts/add')
                    .then((response) => {
                        this.$router.push('/post-list');
                        toast.fire({
                            type: 'success',
                            title: response.data.message
                        })
                    })
            }
        }
    }
</script>

<style scoped>

</style>
