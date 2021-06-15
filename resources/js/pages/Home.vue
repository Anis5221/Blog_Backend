<template>
    <div>
        <div class="row" v-if="user">
           <div class="col-12">
                <Header :userInfo="user"></Header>
                <div class="row">
                    <div class="col-md-2">
                        <Sidber/>
                    </div>
                    <div class="col-md-9">
                   <router-view></router-view>
                    </div>
                </div>
           </div>
        </div>

        <div v-if="user == {}">

            <div class="row">
            <div class="col-12">
                <Login  />
            </div>
            </div>
        </div>


    </div>

</template>

<script>


import Header from '../components/Header.vue'
import Sidber from '../components/Sidber'
import Login from '../pages/auth/login.vue'
export default {
    components: {
        Header,
        Sidber,
        Login
    },

    data() {
        return {
            user:{}
        }
    },

    created() {
        this.token = localStorage.getItem('user_token')
        axios.defaults.headers.common["Authorization"] = "Bearer" + localStorage.getItem('user_token')
        axios.get('/api/current').then((response) => {
            this.user = response.data
        })
    }
}
</script>

<style>

</style>
