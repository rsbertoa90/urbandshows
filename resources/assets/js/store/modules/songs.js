



const state = {
    songs : []
};


const getters = {
     getSongs(state) {
        return state.songs;
    },
    getSong: (state) => (id)=> {
        if(state.songs.length > 0){
            return state.songs.find( song => {
                return song.id == id;
            });
        }
    },
    
   
   
};

const mutations = 
{
    update : (state, payload) => {
        state.songs = payload;
    },
    save : (state,song) => {
        state.songs.push(song);
    },
    delete(state,song)
    {
        for (const key in state.songs) {
            if (state.songs.hasOwnProperty(key)) {
                const element = state.songs[key];
                if (element === song)
                {
                    state.songs.splice(key,1);
                }
            }
        }
    }
};

const actions = {
    fetch : ({
        commit
    }, payload) => {
        
        Vue.http.get('/api/songs')
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