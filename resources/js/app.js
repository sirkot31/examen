/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');
import vue from 'vue';
window.Vue = vue;
import App from './components/App.vue'

//axios
import axios from 'axios';
import VueAxios from 'vue-axios';
//router
import VueRouter from 'vue-router';
import {routes} from './routes';



Vue.use(VueRouter);
Vue.use(VueAxios,axios);

const router= new VueRouter({
    mode:'history',
    routes: routes
});

Vue.component('example-component', require('./components/ExampleComponent.vue').default);



const app = new Vue({
    el:'#app',
    router:router,
    render:h=>h(App)
});

