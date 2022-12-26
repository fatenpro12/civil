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
         //   return axios.post('/api/login').then(({data})=>{
                console.log(data)
                commit('SET_USER',data)
                commit('SET_AUTHENTICATED',true)
                router.push({name:'dashboard'})
          /*  }).catch(({response:{data}})=>{
                commit('SET_USER',{})
                commit('SET_AUTHENTICATED',false)
            })*/
        },
        logout({commit}){
            commit('SET_USER',{})
            commit('SET_AUTHENTICATED',false)
        }
    }
}