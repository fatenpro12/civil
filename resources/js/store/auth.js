
import router from '../admin/router'
export default {
    namespaced: true,
    state:{
        authenticated:false,
        user:{},
        token: null,
        permissions:[],
        roles:[]
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
        roles(state){
            return state.roles
        }
    },
    mutations:{
        SET_AUTHENTICATED (state, value) {
            state.authenticated = value
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
        }
    },
    actions:{
        login({commit},data){
            console.log(data)
                commit('SET_PERMISSIONS',data.permissions)
                commit('SET_ROLES',data.roles)
                commit('SET_USER',data.user)
                commit('SET_TOKEN','Bearer '+data.authorisation.token)
                commit('SET_AUTHENTICATED',true)
                localStorage.setItem('token', 'Bearer '+data.authorisation.token)
                localStorage.setItem('auth',true)
                axios.defaults.headers.common['Authorization'] = 'Bearer '+data.authorisation.token
                router.push("/");
        },
        logout({commit}){
            commit('SET_USER',{})
            commit('SET_TOKEN',null)
            commit('SET_AUTHENTICATED',false)
        }
    }
}