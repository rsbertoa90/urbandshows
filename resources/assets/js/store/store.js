import Vue from 'vue';
import Vuex from 'vuex';

Vue.use(Vuex);
import categories from './modules/categories.js'
export const store = new Vuex.Store({
    state : {
        user : null
    },
    getters :{
        getUser(store){
            return store.user;
        }
    },
    mutations : {
        setUser(state,payload){
            state.user = payload;
           
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
    },
    modules : {
        categories
    }

});

