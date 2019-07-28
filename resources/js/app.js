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

import Swal from 'sweetalert2';

const Swal = require('sweetalert2');

const router = new VueRouter({
    routes,
    mode: 'history'
});
const app = new Vue({
    router,
    el: '#app',
});
