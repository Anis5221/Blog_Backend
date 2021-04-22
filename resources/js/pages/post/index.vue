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
            <table class="table" v-if="posts" >
              <thead>
                <tr>
                  <th>#</th>
                  <th>Title</th>
                  <th>Sub title</th>
                  <th>Category</th>
                  <th>Image</th>
                  <th>Sort Description</th>
                  <th>Long Description</th>
                  <th>Active</th>
                  <th>action</th>
                </tr>
              </thead>
              <tbody>
                <tr v-for="(post,index) in posts" :key="index">
                  <td>{{ post.id }}</td>
                  <td>{{ post.title }}</td>
                  <td>{{ post.sub_title }}</td>
                  <td>{{ post.category_id }}</td>
                  <td>
                    <div style="max-width:150px; max-height:100px; overflow: hidden;">
                      <img :src="post.image" class="img-fluid" alt="">
                    </div>
                    
                  </td>
                  <td>{{ post.sort_description }}</td>
                  <td>{{ post.long_description }}</td>
                  <td v-if=" post.active === 1">Yes</td>
                  <td v-if=" post.active === 0">No</td>
                  <td>
                  <router-link :to="{name:'editPost', params:{id: post.id}}" class="btn btn-sm btn-success">Edit</router-link>
                  <button @click="deletepost(post)" class="btn btn-sm btn-danger">Delete</button>
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
      posts:{}
      }
  },

  created(){
    axios.get('/api/post').then(res => (this.posts = res.data.postList))
   
  },

  methods: {
    deletepost(post){
      axios.delete('http://127.0.0.1:8000/api/post/'+post.id,).then(res => console.log(res))
      const index = this.posts.indexOf(post);
      this.posts.splice(index,1);
    
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