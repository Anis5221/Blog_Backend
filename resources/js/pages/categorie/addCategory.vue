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
                    <router-link class="btn btn-info" to="/category">Category</router-link>
                  </div>
                </div>
                  <form @submit.prevent="addCategory" @keydown="category.onKeydown($event)">
                    <alert-error :form="category" message="There were some problems with your input."></alert-error>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Title</label>
                      <input v-model="category.title" type="text" name="title"
        class="form-control" :class="{ 'is-invalid': category.errors.has('title') }">
                     <has-error :form="category" field="title"></has-error>
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
import Form from "vform";
export default {

    data(){
        return{

          category : new Form({
              title: '',
           
          })
            
            
            }
    },

    methods: {
        addCategory(){
            
           this.category.post("http://127.0.0.1:8000/api/category",).then(({res}) => {
             this.$toast.success('Category Added!')
              this.category.title = ""
           }
           ).catch(({error}) => {
                  this.$toast.error("somthing want wrong!")
                  console.log(error)
            })
          
           
        }
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