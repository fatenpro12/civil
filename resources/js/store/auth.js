import router from '../auth/router';

export default {
    namespaced: true,
    state:{
        authenticated:false,
        user:{}
    },
    getters:{
        authenticated(state){
            return state.authenticated
        },
        user(state){
            return state.user
        }
    },
    mutations:{
        SET_AUTHENTICATED (state, value) {
            state.authenticated = value.success
        },
        SET_USER (state, value) {
            state.user = value.user
        }
    },
    actions:{
        login({commit},data){
                console.log(data)
                commit('SET_USER',data)
                commit('SET_AUTHENTICATED',true)
                window.location.href= "/"
        },
        logout({commit}){
            commit('SET_USER',{})
            commit('SET_AUTHENTICATED',false)
        }
    }
}