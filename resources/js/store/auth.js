import store from './index'
import router from '../admin/router'
import axios from 'axios';

const user = localStorage.getItem('user');
const initialState = user
  ? { status: { loggedIn: true }, user }
  : { status: { loggedIn: false }, user: null };
export default {
    namespaced: true,
    state:{
        authenticated:false,
        user:{},
        token: null,
        permissions:[],
        roles:[],
        DATE_FORMAT:null,
        TIME_FORMAT:null,
        initialState
    },
    getters:{
        isAuthenticated(state){
            return state.authenticated
        },
        user(state){
            return state.user
        },
        token(state){
            return state.token
        },
        permissions(state){
            return state.permissions
        },
        DATE_FORMAT(state){
            return state.DATE_FORMAT
        },
        TIME_FORMAT(state){
            return state.TIME_FORMAT
        },
        roles(state){
            return state.roles
        }
    },
    mutations:{
        SET_AUTHENTICATED (state, value) {
            state.authenticated = value
        },
        SET_DATE_FORMAT (state, value) {
            state.DATE_FORMAT = value
        },
        SET_TIME_FORMAT (state, value) {
            state.TIME_FORMAT = value
        },
        SET_PERMISSIONS (state, value) {
            state.permissions = value
        },
        SET_USER (state, value) {
            state.user = value
        },
           SET_TOKEN (state, value) {
            state.token = value
        },
        SET_ROLES(state, value){
            state.roles = value
        },
        refreshToken(state, accessToken) {
            state.authenticated = true;
            state.user = { ...state.user, accessToken: accessToken };
          }
    },
    actions:{
        refreshToken({ commit }, accessToken) {
            commit('refreshToken', accessToken);
          },
        login({commit},data){
                commit('SET_PERMISSIONS',data.permissions)
                commit('SET_DATE_FORMAT',data.DATE_FORMAT)
                commit('SET_TIME_FORMAT',data.TIME_FORMAT)
                commit('SET_ROLES',data.roles)
                commit('SET_USER',data.user)
                commit('SET_TOKEN','Bearer '+data.authorisation.token)
                commit('SET_AUTHENTICATED',true)
                localStorage.setItem('token', 'Bearer '+data.authorisation.token)
                localStorage.setItem('user',data.user)
                localStorage.setItem('auth',true)
                axios.defaults.headers.common['Authorization'] = 'Bearer '+data.authorisation.token
                router.push("/");
        },
        logout({commit}){
            commit('SET_USER',{})
            commit('SET_TOKEN',null)
            commit('SET_AUTHENTICATED',false)
            localStorage.removeItem('token')
            localStorage.removeItem('auth')
            localStorage.removeItem('user')
        },
        async handleResponse({commit},response) {
             
                    if (response.status === 401) {
                        /*    const user = localStorage.getItem('user');
                            const rs = await axios.post("/refreshtoken")
                            console.log(rs,user)
                            const { accessToken } = rs.data.authorisation.token;
                
                            store.dispatch('auth/refreshToken', accessToken);
                            localStorage.setItem('token', 'Bearer '+accessToken)
                       
                            localStorage.setItem('auth',true)*/
                      
                     commit('SET_USER',{})
                     commit('SET_TOKEN',null)
                     commit('SET_AUTHENTICATED',false)
                     localStorage.removeItem('token')
                     localStorage.removeItem('auth')
                     localStorage.removeItem('user')
                        router.push('/login')
                    }
     
        }
    }
}