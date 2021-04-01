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
                  <li class="breadcrumb-item active" aria-current="page">Post</li>
                </ol>
              </nav>

              <div id="header-middle" class="my-2">
                <h2>Post</h2>
                <router-link class="btn btn-info" to="/addPost" id="addbutton">Add Post</router-link>
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
                  <button @click="deleteCategory(category.id)" class="btn btn-sm btn-danger">Delete</button>
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

  created(){
    axios.get('http://127.0.0.1:8000/api/category').then(res => (this.categories = res.data.cat))
  },

  methods: {
    deleteCategory(id){
      axios.delete('http://127.0.0.1:8000/api/category/'+id,).then(res => console.log(res))
    
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