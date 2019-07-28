require('./bootstrap');

window.Vue = require('vue');
// import Vue from 'vue';
import VueRouter from 'vue-router';
Vue.use(VueRouter);
import {routes} from './routes';
// Vue.component('example-component', require('./components/ExampleComponent.vue').default);
Vue.component('admin-main', require('./components/admin/AdminMaster').default);

//V-form
import { Form, HasError, AlertError } from 'vform';
window.Form = Form;
Vue.component(HasError.name, HasError);
Vue.component(AlertError.name, AlertError);

//Sweet Alert
import Swal from 'sweetalert2';
window.Swal = Swal;
const toast = Swal.mixin({

});
const Toast = Swal.mixin({
    toast: true,
    position: 'top-end',
    showConfirmButton: false,
    timer: 3000
});
window.Toast = Toast;

const router = new VueRouter({
    routes,
    mode: 'history'
});
const app = new Vue({
    router,
    el: '#app',
});
