<template>
    <section class="content">
        <div class="container-fluid">
            <div class="row justify-content-around">
                <div class="col-md-6">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Edit Category</h3>
                        </div>
                        <form role="form" @submit.prevent="editCategory">
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="cat_name">Category</label>
                                    <input type="text" class="form-control" id="cat_name"
                                           v-model="form.cat_name" name="cat_name"
                                           :class="{ 'is-invalid': form.errors.has('cat_name') }"
                                           placeholder="Enter Category">
                                    <has-error :form="form" field="cat_name"></has-error>
                                </div>
                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Update</button>
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
        name: "Edit",
        data() {
            return {
                form: new Form({
                    cat_name: ''
                })
            }
        },
        mounted(){
            axios.get('categories/edit/'+this.$route.params.id)
                .then((response) => {
                    this.form.fill(response.data.category)
                })
        },
        methods: {
            editCategory(){
                this.form.post('/categories/edit/'+this.$route.params.id)
                    .then((response) => {
                        this.$router.push('/category-list');
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
