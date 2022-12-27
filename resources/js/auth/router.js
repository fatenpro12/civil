import Vue from 'vue';
import Router from 'vue-router';
import store from '../store';
import Login from './Login.vue'
import Register from './Register.vue'

Vue.use(Router);

const router = new Router({
   // mode: 'history',
    routes: [
        {
            path: '/',
            name: 'login',
            component: Login,
        },
        {
            path: '/register',
            name: 'register',
            component: Register,
        },
    ],
});

router.beforeEach((to, from, next) => {
    store.commit('showLoader');
    next();
});

router.afterEach((to, from) => {
    setTimeout(() => {
        store.commit('hideLoader');
    }, 1000);
});

export default router;
