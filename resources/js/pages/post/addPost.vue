<template>
  <div>
      <div class="container-flued">
        <div class="row">
          <div class="col-md-12 mx-auto my-2">
            <div class="card">
              <div class="card-body">

                <div>
                  <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                      <li class="breadcrumb-item"><a href="#">Home</a></li>
                      <li class="breadcrumb-item active" aria-current="page">Library</li>
                    </ol>
                  </nav>

                  <div id="header-middle" class="my-2">
                    <h2>Add Categorie</h2>
                    <router-link class="btn btn-info" to="/post">Post</router-link>
                  </div>
                </div>
                <form @submit.prevent="addCategory" enctype="multipart/form-data" >
                    <div class="form-group">
                      <label for="exampleInputEmail1">Title</label>
                      <input v-model="post.title" type="text" name="title"
                        class="form-control" :class="{ 'is-invalid': post.errors.has('title') }">
                    <has-error :form="post" field="title"></has-error>
                    </div>

                    <div class="form-group">
                      <label for="exampleInputEmail1">Sub Title</label>
                      <input v-model="post.sub_title" type="text" name="title"
                        class="form-control" :class="{ 'is-invalid': post.errors.has('sub_title') }">
                    <has-error :form="post" field="sub_title"></has-error>
                    </div>

                  <div class="form-group">
                        <label for="">Upload Image</label>
                        <input type="file" @change="getImage" class="form-control-file" :class="{ 'is-invalid': post.errors.has('image') }">
                    <has-error :form="post" field="image"></has-error>
                    </div>

                  <div class="from-group"> 
                    <label for="">Category</label>
                    <select class="custom-select" v-model="post.category_id" :class="{ 'is-invalid': post.errors.has('category_id') }" >
                        <option v-for="(category,index) in categories" :key="index" :value="category.id" >{{ category.title }}</option>
                    </select>
                    <has-error :form="post" field="category_id"></has-error>
                  </div>
                  <div class="form-group">
                    <label class="my-3">Sort Description</label>
                    <textarea v-model="post.sort_description" :class="{ 'is-invalid': post.errors.has('sort_description') }" class="form-control" rows="3" placeholder="Enter some text..."></textarea>
                  <has-error :form="post" field="sort_description"></has-error>
                  </div>

                  <div class="form-group">
                    <label class="my-3">Long Description</label>
                    <textarea v-model="post.long_description" class="form-control" :class="{ 'is-invalid': post.errors.has('long_description') }"  rows="3" placeholder="Enter some text..."></textarea>
                    <has-error :form="post" field="long_description"></has-error>  
                  </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
              </form>

              </div>
            </div>
          </div>
        </div>
      </div>
  </div>
</template>

<script>
import {Form} from "vform";
import { objectToFormData } from 'object-to-formdata';
export default {

    data(){
        return{

          post: new Form({
              title: '',
              sub_title: '',
              image: '',
              category_id: '',
              sort_description: '',
              long_description: '',
          }),

            categories: {}
            
            }
    },

    methods: {
        addCategory(){
            
            
           this.post.post('http://127.0.0.1:8000/api/post', {

                   transformRequest: [function (data, headers) {
                return objectToFormData(data)
              }],

              onUploadProgress: e => {
                // Do whatever you want with the progress event
                 console.log(e)
              }
            
         
        }).then(({res}) => {
              this.post.title = '',
              this.post.sub_title = '',
              this.post.image = '',
              this.post.category_id = '',
              this.post.sort_description = '',
              this.post.long_description = '',
             this.$toast.success('Post Added!')
           }).catch(({error}) => {
             this.$toast.error("Something want wrong!")
           })
           
           
        },

        getImage(e){
           this.post.image = e.target.files[0]
         
        }
    },

    created() {
      axios.get('http://127.0.0.1:8000/api/category-with-index').then(res => (this.categories = res.data.categorys))
      
    }

}
</script>

<style scoped>
  #header-middle{
    display: flex;
    justify-content: space-between;
  }
  .card{
    border-top: 3px solid #B7950B;
    
  }
</style>