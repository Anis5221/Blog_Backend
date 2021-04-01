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
                  <form @submit.prevent="updateCategory">
                    <div class="form-group">
                      <label for="exampleInputEmail1">Title</label>
                      <input v-model="title" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter title...">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputPassword1">Slug</label>
                      <input v-model="slug" type="text" class="form-control" id="exampleInputPassword1" placeholder="Enter Slug...">
                    </div>
                      <select v-model="active" class="custom-select my-1" id="inputGroupSelect01">
                          <option selected value="1">yes</option>
                          <option value="0">No</option>
                      </select>
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
export default {

    data(){
        return{
            
            title: '',
            slug: '',
            active: null,

            category: ''
            }
    },

    methods: {
      getCategory(){
      let id = this.$route.params.id;
      axios.get(`http://127.0.0.1:8000/api/category/${id}`).then(res => (this.title = res.data.category.title, this.slug = res.data.category.slug, this.active = res.data.category.active))
 

     
          

      },
        updateCategory(){
           
           axios.put(`http://127.0.0.1:8000/api/category/${this.$route.params.id}`,{title:this.title,slug:this.slug,active:this.active}).then(res => console.log(res))
           this.$router.push({name:"categories"})
           
          this.$toast.success({
                title:'success',
                message:'Updated succesfull'
            }) 
        }
    },

    mounted() {
     this.getCategory()
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