<template>
  <div>
      <div id="sidber-nav">
      <ul class="nav flex-column" id="nav-wrepper">
        <li class="nav-item">
          <router-link to="/">Dashboard</router-link>
        </li>
        <li class="nav-item">
          
          <router-link to="/category">Categories</router-link>
        </li>
        <li class="nav-item">
          <router-link to="/post">Post</router-link>
        </li>
      
      </ul>
      </div>
  </div>
</template>

<script>
export default {

}
</script>

<style scoped>
  #nav-wrepper{
    
    margin-right: .5rem;
    
  }
  a{
    color: white;
    font-size: .9rem;
    text-decoration: none;
    
    
  }

  #sidber-nav{
    height: 800px;
    background-color:blueviolet;
  }
  ul li{
    padding-left: 5px;
    border-bottom: 1px solid rgb(250, 249, 249);
    margin:5px;
    }

</style>