require('./bootstrap');

window.Vue = require('vue');
// import Vue from 'vue';

//Vuex
import Vuex from 'vuex';
Vue.use(Vuex);
import storeData from './store/index';
const store = new Vuex.Store(
    storeData
);

//Vue-Router
import VueRouter from 'vue-router';
Vue.use(VueRouter);
import {routes} from './routes';

// Vue.component('example-component', require('./components/ExampleComponent.vue').default);
Vue.component('admin-main', require('./components/admin/AdminMaster').default);

//V-form
import { Form, HasError, AlertError } from 'vform';
Vue.component(HasError.name, HasError);
Vue.component(AlertError.name, AlertError);
window.Form = Form;

//Sweet Alert
import swal from 'sweetalert2';
window.swal = swal;
const toast = swal.mixin({
    toast: true,
    position: 'top-end',
    showConfirmButton: false,
    timer: 3000
});
window.toast = toast;

//Moment.JS
import moment from 'moment';

const router = new VueRouter({
    routes,
    mode: 'history'
});
const app = new Vue({
    router,
    store,
    el: '#app',
});
