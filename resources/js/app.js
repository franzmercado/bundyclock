/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');
// window.Fire = require('vue');


import moment from 'moment';
import Swal from 'sweetalert2';
import toastr from 'toastr';
import { Form, HasError, AlertError } from 'vform';

window.Form = Form;
window.moment = moment;
window.Swal = Swal;
window.toastr = toastr;
window.Fire = new Vue();

toastr.options.progressBar = true;
toastr.options.showEasing = 'swing';
toastr.options.hideEasing = 'linear';
toastr.options.closeEasing = 'swing';


Vue.component(HasError.name, HasError)
Vue.component(AlertError.name, AlertError)

import VueRouter from 'vue-router'
Vue.use(VueRouter)

let routes = [
  {
    path: '/',
    component: require('./components/Home.vue').default
  },{
    path: '/dashboard',
    component: require('./components/Dashboard.vue').default
  },
  {
    path: '/profile',
    component: require('./components/Profile.vue').default
  },
  {
    path: '/employees',
    component: require('./components/Employees.vue').default
  },
  {
    path: '/departments',
    component: require('./components/Departments.vue').default
  }
]

const router = new VueRouter({
  mode: 'history',
  routes
})


/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i);
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default));

// Vue.component('example-component', require('./components/ExampleComponent.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
    router
});
