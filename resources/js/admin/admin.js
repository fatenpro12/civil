//import the common file.
require('../common/common');

// app
import router from './router';
import eventBus from '../common/Event';
import store from '../store'
import Vuetify from 'vuetify';
import 'vuetify/dist/vuetify.min.css'
import axios from 'axios';

var lang_ar=localStorage.getItem('currentLange')=='ar'?true:false;
console.log(lang_ar)
Vue.use(Vuetify, {
    // rtl: true,
     rtl: lang_ar,
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
//axios.defaults.withCredentials=true;
axios.defaults.baseURL = '/api/'
const token= localStorage.getItem('token')
if(token){
  axios.defaults.headers.common['Authorization'] = token
}
/*const axiosInstance = axios.create({
   // baseURL: "http://127.0.0.1:8000/api/",
    withCredentials: true,
    headers: {
      "Content-Type": "application/json",
      common: {
      "Authorization": token?token:''
     }
    },
  });
 
  /*axiosInstance.interceptors.response.use(
    (res) => {
        console.log(res)
      return res;
    },
    async (err) => {
      const originalConfig = err.config;
      console.log(err)
      if (originalConfig.url !== "/login" && err.response) {
        // Access Token was expired
        if (err.response.status === 401 && !originalConfig._retry) {
           store.dispatch('auth/handleResponse',err.response)
      /*  originalConfig._retry = true;

          try {
            const user = JSON.parse(localStorage.getItem("user"));
            const rs = await axiosInstance.post("/refreshtoken", {
              refreshToken: user?.refreshToken ,
            });

            const { accessToken } = rs.data;

            store.dispatch('auth/refreshToken', accessToken);
             user = JSON.parse(localStorage.getItem("user"));
    user.accessToken = accessToken;
    localStorage.setItem("user", JSON.stringify(user));

            return axiosInstance(originalConfig);
          } catch (_error) {
            return Promise.reject(_error);
          }
        }
      }

      return Promise.reject(err);
    })*/
//Vue.use(axiosInstance);
const admin = new Vue({
    el: '#admin',
    vuetify: Vuetify,
    eventBus,
   // axiosInstance,
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
      
        drawerToggle() {
            store.commit('drawerToggle');
        },
   
    },
});