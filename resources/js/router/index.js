import Vue from 'vue';
import VueRouter from 'vue-Router';
import Home from '../pages/Home.vue';
Vue.use(VueRouter);

const router = new VueRouter({
    mode: 'history',
    routes: [
        {
            path: '/',
            component: Home
         }
    ]
});

export default router;