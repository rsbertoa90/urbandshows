



const state = {
    events : []
};


const getters = {
     getEvents(state) {
        return state.events;
    },
    getEvent: (state) => (id)=> {
        if(state.events.length > 0){
            return state.events.find( event => {
                return event.id == id;
            });
        }
    },
    
   
   
};

const mutations = 
{
    update : (state, payload) => {
        state.events = payload;
    },
    save : (state,event) => {
        state.events.push(event);
    },
    delete(state,event)
    {
        for (const key in state.events) {
            if (state.events.hasOwnProperty(key)) {
                const element = state.events[key];
                if (element === event)
                {
                    state.events.splice(key,1);
                }
            }
        }
    }
};

const actions = {
    fetch : ({
        commit
    }, payload) => {
        
        Vue.http.get('/api/events')
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