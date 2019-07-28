<template>
    <section class="content">
        <div class="container-fluid">
            <div class="row justify-content-around">
                <div class="col-md-6">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Add Category</h3>
                        </div>
                        <form role="form" @click.prevent="addCategory">
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="cat_name">Category</label>
                                    <input type="text" class="form-control" id="cat_name" v-model="form.cat_name" name="cat_name" placeholder="Enter Category">
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
        name: "New",
        data() {
            return {
                form: new Form({
                    cat_name: ''
                })
            }
        },
        methods: {
            addCategory(){
                this.form.post('/add-category')
                    .then((response) => {
                        console.log(response.data)
                    })
                    .catch((error) => {
                        console.log(error)
                    });
            }
        }
    }
</script>

<style scoped>

</style>