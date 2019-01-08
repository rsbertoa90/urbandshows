



const state = {
    sets : []
};


const getters = {
     getSets(state) {
        return state.sets;
    },
    getSet: (state) => (id)=> {
        if(state.sets.length > 0){
            return state.sets.find( set => {
                return set.id == id;
            });
        }
    },
    
   
   
};

const mutations = 
{
    update : (state, payload) => {
        state.sets = payload;
    },
    save : (state,set) => {
        state.sets.push(set);
    },
    delete(state,set)
    {
        for (const key in state.sets) {
            if (state.sets.hasOwnProperty(key)) {
                const element = state.sets[key];
                if (element === set)
                {
                    state.sets.splice(key,1);
                }
            }
        }
    }
};

const actions = {
    fetch : ({
        commit
    }, payload) => {
        
        Vue.http.get('/api/sets')
            .then(response => {
                commit('update',response.data);
            });
    },

};

export default {
    namespaced : true,
    state,
    mutations,
    actions,
    getters
}