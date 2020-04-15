/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');
import Vuetify from 'vuetify'
import 'vuetify/dist/vuetify.min.css'
import Routes from './router'
import Store from './store'
import App from './App.vue'

Vue.use(Vuetify);

const app = new Vue({
    el: '#app',
    router : Routes,
    store  : Store,
    vuetify: new Vuetify(),
    render: h => h(App)
});
