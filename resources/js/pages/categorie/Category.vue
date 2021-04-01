<template>
  <div>
      <div class="container-flued">
        <div class="row">
          <div class="col-md-12 mx-auto my-2">
            <div class="card">
              <div class="card-body">

            <div >
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Category</li>
                </ol>
              </nav>

              <div id="header-middle" class="my-2">
                <h2>Categories</h2>
                <router-link class="btn btn-info" to="/addCategory" id="addbutton">Add Category</router-link>
              </div>
            </div>
            <table class="table">
              <thead>
                <tr>
                  <th >#</th>
                  <th>Title</th>
                  <th>Slug</th>
                  <th>Active</th>
                  <th>action</th>
                </tr>
              </thead>
              <tbody>
                <tr v-for="(category,index) in categories" :key="index">
                  <td>{{ category.id }}</td>
                  <td>{{ category.title }}</td>
                  <td>{{ category.slug }}</td>

                  <td v-if=" category.active === 1">Yes</td>
                  <td v-if=" category.active === 0">No</td>
                  <td>
                  <router-link :to="{name:'categoryEdit', params:{id: category.id}}" class="btn btn-sm btn-success">Edit</router-link>
                  <button @click="deleteCategory(category)" class="btn btn-sm btn-danger">Delete</button>
                  </td>
                </tr>
              </tbody>
            </table>
        
              </div>
            </div>
          </div>
        </div>
      </div>
  </div>
</template>

<script>

export default {

  data (){
    return {
      categories:{}
      }
  },

  mounted(){
    axios.get('http://127.0.0.1:8000/api/category').then(res => (this.categories = res.data.cat))
  },

  methods: {
    deleteCategory(category){
      axios.delete('http://127.0.0.1:8000/api/category/'+category.id,).then(res => console.log(res))
      let index = this.categories.indexOf(category)
      this.categories.splice(index,1)
      this.$toast.success("Category Deleted!")
     
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

  h2{
    color:#A569BD;
    }

</style>