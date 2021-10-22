require('./bootstrap');

window.Vue = require('vue').default;
import Vue from 'vue';
import VueRouter from 'vue-router';
import routes from './routes';
import moment from 'moment'

Vue.filter('formatDate', function(value) {
    if (value) {
      return moment(String(value)).format('MM/DD/YYYY hh:mm')
    }
  });


import store from './store'

Vue.component('comment', require('./components/Comments.vue').default);

Vue.component('app-component', require('./components/App.vue').default);
Vue.component('search-bar', require('./components/Search.vue').default);


Vue.component('user-create', require('./components/users/CreateUser.vue').default);
Vue.component('user-edit', require('./components/users/UpdateUser.vue').default);
Vue.component('user-manage', require('./components/users/ManageUser.vue').default);

// Vue.component('login-form', require('./components/LoginForm.vue').default);
Vue.component('dashboard', require('./components/dashboard/Dashboard.vue').default);

Vue.use(VueRouter);

const router = new VueRouter(
    routes
)

const app = new Vue({
    el: '#app', 
    router,
    store,
});

