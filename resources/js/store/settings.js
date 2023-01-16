
export default {
    namespaced: true,
    state:{
       languages:[],
       settings:[]
    },
    getters:{
        languages(state){
            return state.languages
        },
        settings(state){
            return state.settings
        }
    },
    mutations:{
        SET_LANGUAGES (state, value) {
            state.languages = value
        },
        SET_SETTINGS(state, value){
            state.settings = value
        }
    },
    actions:{
        getLanguages({commit}){
        axios.get('/languages')
        .then(function (response) {
            commit('SET_LANGUAGES',response.data)
        })
    },
    settings({commit}){
        axios.get('/settings')
        .then(function (response) {
            commit('SET_SETTINGS',response.data)
        })
    }
}
}