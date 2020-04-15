import Vue from 'vue'
import Router from 'vue-router'
import routes from './routes/index.js'
import Home from '../components/HomeComponent'
Vue.use(Router);

const router = new Router({
    routes: [
        {
            path: '/',
            redirect: '/home'
        },
        {
            path: '/home',
            name: 'Home',
            component: Home,
        }
    ].concat(routes)
});

export default router