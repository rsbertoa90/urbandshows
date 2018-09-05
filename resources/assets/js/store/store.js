import Vue from 'vue';
import Vuex from 'vuex';

Vue.use(Vuex);
import categories from './modules/categories.js'
export const store = new Vuex.Store({
    state : {
        user : null,
        config : null
    },
    getters :{
        getUser(store){
            return store.user;
        },
        getConfig(store){
            return store.config;
        }
    },
    mutations : {
        setUser(state,payload){
            state.user = payload;
           
        },
        setConfig(state,payload){
            state.config = payload;
        }
    },
    actions : {
       fetchUser: ({
           commit
       }, payload) => {

           Vue.http.get('/getUser')
               .then(response => {
                   commit('setUser', response.data);
                  
               });
       },
       fetchConfig: ({
           commit
       }, payload) => {

           Vue.http.get('/config')
               .then(response => {
                   commit('setConfig', response.data);
               });
       },
    },
    modules : {
        categories
    }

});

