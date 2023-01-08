
export default {
    namespaced: true,
    state:{
       languages:[]
    },
    getters:{
        languages(state){
            return state.languages
        }
    },
    mutations:{
        SET_LANGUAGES (state, value) {
            state.languages = value
        },
    },
    actions:{
        getLanguages({commit}){
        axios.get('/languages')
        .then(function (response) {
            commit('SET_LANGUAGES',response.data)
        })
    }
}
}