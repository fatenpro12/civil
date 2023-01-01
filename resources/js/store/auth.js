
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
                commit('SET_TOKEN',data.token)
                commit('SET_AUTHENTICATED',true)
        },
        logout({commit}){
            commit('SET_USER',{})
            commit('SET_TOKEN',null)
            commit('SET_AUTHENTICATED',false)
        }
    }
}