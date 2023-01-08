//import the common file.
require('../common/common');

// app
import router from './router';
import eventBus from '../common/Event';
import store from '../store'
import Vuetify from 'vuetify';
import 'vuetify/dist/vuetify.min.css'
import axios from 'axios';

var x=APP.RTL;
Vue.use(Vuetify, {
    // rtl: true,
     rtl: x,
     theme: {
         primary: '#1976D2',
         secondary: '#424242',
         accent: '#82B1FF',
         error: '#FF5252',
         info: '#2196F3',
         success: '#4CAF50',
         warning: '#FFC107',
     },
 });
Vue.use(eventBus);
axios.defaults.withCredentials=true;
axios.defaults.baseURL = '/api/'
const token= localStorage.getItem('token')
if(token){
    axios.defaults.headers.common['Authorization'] = token
}
const admin = new Vue({
    el: '#admin',
    vuetify: Vuetify,
    eventBus,
    router,
    store,
    computed: {
        getBreadcrumbs() {
            return [];
        },
    },
    methods: {
      menuClick(routeName, routeType) {
            let rn = routeType || 'vue';

            if (rn === 'vue') {
                this.$router.push({ name: routeName });
               
            }
            if (rn === 'full_load') {
                window.location.href = routeName;
            }
        },
        clickLogout(logoutUrl, afterLogoutRedirectUrl) {
            axios.post(logoutUrl).then(r => {
                window.location.href = afterLogoutRedirectUrl;
            });
        },
        dialogOk() {
            store.commit('dialogOk');
        },
        dialogCancel() {
            store.commit('dialogCancel');
        },
        drawerToggle() {
            store.commit('drawerToggle');
        },
   
    },
});