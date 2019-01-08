const state = {
    tags: []
};


const getters = {
    getTags(state) {
        return state.tags;
    },
    getTag: (state) => (id) => {
        if (state.tags.length > 0) {
            return state.tags.find(tag => {
                return tag.id == id;
            });
        }
    },



};

const mutations = {
    update: (state, payload) => {
        state.tags = payload;
    },
    save: (state, tag) => {
        state.tags.push(tag);
    },
    delete(state, tag) {
        for (const key in state.tags) {
            if (state.tags.hasOwnProperty(key)) {
                const element = state.tags[key];
                if (element === tag) {
                    state.tags.splice(key, 1);
                }
            }
        }
    }
};

const actions = {
    fetch: ({
        commit
    }, payload) => {

        Vue.http.get('/api/tags')
            .then(response => {
                commit('update', response.data);
            });
    },

};

export default {
    namespaced: true,
    state,
    mutations,
    actions,
    getters
}