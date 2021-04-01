<template>
    <div>
        <div class="row">
           <div class="col-12">
                <Header></Header>
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
       
    </div>
    
</template>

<script>


import Header from '../components/Header.vue'
import Sidber from '../components/Sidber'
export default {
    components: {
        Header,
        Sidber
        
    }
}
</script>

<style>

</style>