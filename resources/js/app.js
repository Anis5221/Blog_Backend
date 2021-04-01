import Vue from 'vue';
import Router from './router/index'
require('./bootstrap');
import { Form, HasError, AlertError } from 'vform'
import 'cxlt-vue2-toastr/dist/css/cxlt-vue2-toastr.css';
import CxltToastr from 'cxlt-vue2-toastr'

Vue.use(CxltToastr)

var toastrConfigs = {
    position: 'top right',
    showDuration: 2000
}
Vue.use(CxltToastr, toastrConfigs)
 
Vue.component(HasError.name, HasError)
Vue.component(AlertError.name, AlertError)

 Vue.component('home', require('./pages/Home.vue').default);

const app = new Vue({
    el: '#app',
    router: Router,
});
