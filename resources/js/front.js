/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

const { default: Axios } = require('axios');

require('./bootstrap');

window.Vue = require('vue');
window.Axios = require('axios');

import App from './views/App.vue';

import Vue from 'vue';
import VueRouter from 'vue-router';

import PageHome from './pages/PageHome.vue';
import PageAbout from './pages/PageAbout.vue';
import PageBlog from './pages/PageBlog.vue';
import postsShow from './pages/postsShow.vue';


Vue.use(VueRouter);

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

// Vue.component('example-component', require('./components/ExampleComponent.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

import App from './views/App.vue';

const router = new VueRouter({
    routes:[
        {
            path:'/',
            name: 'home',
            component: PageHome,
        },
        {
            path:'/about',
            name: 'about',
            component: PageAbout,
        },
        {
            path:'/blog',
            name: 'blog',
            component: PageBlog,
        },
        {
            path:'/blog/:slug',
            name: 'postsShow',
            component: postsShow,
        },

    ]
});

const app = new Vue({
    el: '#app',
    render: h => h(App),
    router,
});


