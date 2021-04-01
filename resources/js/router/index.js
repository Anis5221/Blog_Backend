import Vue from 'vue';
import VueRouter from 'vue-Router';
import Dashboard from '../pages/Dashboard.vue';
import Category from '../pages/categorie/Category.vue';
import Post from '../pages/post/index.vue';
import addPost from '../pages/post/addPost.vue';
import addCategory from '../pages/categorie/addCategory.vue';
import edit from '../pages/categorie/edit.vue';
Vue.use(VueRouter);

const router = new VueRouter({
    mode: 'history',
    linkExactActiveClass: 'acitve',
    routes: [
        {
            path: '/',
            component: Dashboard,
            
         },
         {
            path: '/category',
            component: Category,
            name: "categories"
          
         },
         {
             path: '/post',
             component: Post,
             name: "Posts"
             
         },
         {
             path: '/addPost',
             component: addPost,
             name: "addPosts"
             
         },
         {
             path: '/addCategory',
             component: addCategory,
             
         },
         {
             path: '/category/edit:id',
             component: edit,
             name: 'categoryEdit'
         }
    ]
});

export default router;