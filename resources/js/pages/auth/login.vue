<template>
  <div>
      <div class="container">
          <div class="row">
              <div class="col-md-6">
                  <div class="card">
                      <div class="card-header">
                          <h1 class="text-center">LogIn</h1>
                      </div>

                      <div class="card-body">
                          <form @submit.prevent="submit">
                              <div class="form-group">
                                  <label for="email">Email</label>
                                  <input type="email" class="form-control" >
                              </div>
                              <div class="form-group">
                                  <label for="password">password</label>
                                  <input type="password" class="form-control" >
                              </div>
                              <button class="btn btn-success"> Login</button>
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

    data() {
        return {

        }
    },

    methods:{
        submit() {

            axios.get('/sanctum/csrf-cookie').then(response => {
                axios.post('/api/login',{
                    email: "parsonal494@gmail.com",
                    password: "anis5221"
                } ).then(response => {
                    console.log(response)
                })
            });
        }
     }
}
</script>

<style>

</style>
