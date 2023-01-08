
import router from '../admin/router'
export default {
    namespaced: true,
    state:{
        authenticated:false,
        user:{},
        token: null
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
        }
    },
    mutations:{
        SET_AUTHENTICATED (state, value) {
            state.authenticated = value
        },
        SET_USER (state, value) {
            state.user = value.user
        },
           SET_TOKEN (state, value) {
            state.token = value
        }
    },
    actions:{
        login({commit},data){
                commit('SET_USER',data)
                commit('SET_TOKEN','Bearer '+data.authorisation.token)
                commit('SET_AUTHENTICATED',true)
                localStorage.setItem('token', 'Bearer '+data.authorisation.token)
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