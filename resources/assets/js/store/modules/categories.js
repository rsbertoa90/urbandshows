



const state = {
    categories : []
};


const getters = {
     getCategories(state) {
        return state.categories;
    },
    getCategory: (state) => (id)=> {
        if(state.categories.length > 0){
            return state.categories.find( cat => {
                return cat.id == id;
            });
        }
    },
    getProducts(state) {
        let prods = [];
        if (state.categories.length > 0){
            state.categories.forEach(category => {
                prods.concat(category.products);
            });
        }
        return prods;
    },
    getProduct: (state) => (id) => {
        var res  = null;
        if (state.categories.length > 0) {
            state.categories.forEach(cat => {
             
                var prod = cat.products.find(p => {
                    return p.id == id
                });
                if (prod){
                
                    res = prod;
                    
                } 
            });
            return res;
      
        }
    },
    getOffers(state){
        let prods = [];
        if (state.categories.length > 0) {
            state.categories.forEach(category => {
                category.products.forEach(product => {
                   
                    if (product.offer) {
                        prods.push(product);
                    }
                });
            });
        }
       
        return prods;
    },
    slug : (state) => (object) =>{
            var str = object.name;
             str = str.replace(/^\s+|\s+$/g, ''); // trim
             str = str.toLowerCase();

             // remove accents, swap ñ for n, etc
             var from = "àáäâèéëêìíïîòóöôùúüûñç·/_,:;";
             var to = "aaaaeeeeiiiioooouuuunc------";
             for (var i = 0, l = from.length; i < l; i++) {
                 str = str.replace(new RegExp(from.charAt(i), 'g'), to.charAt(i));
             }

             str = str.replace(/[^a-z0-9 -]/g, '') // remove invalid chars
                 .replace(/\s+/g, '-') // collapse whitespace and replace by -
                 .replace(/-+/g, '-'); // collapse dashes

             return object.id+'-'+str;
    }
};

const mutations = 
{
    update : (state, payload) => {
        state.categories = payload;
    },
    save : (state,category) => {
        state.categories.push(category);
    },
    delete(state,category)
    {
        for (const key in state.categories) {
            if (state.categories.hasOwnProperty(key)) {
                const element = state.categories[key];
                if (element === category)
                {
                    state.categories.splice(key,1);
                }
            }
        }
    }
};

const actions = {
    fetch : ({
        commit
    }, payload) => {
        
        Vue.http.get('/api/categories')
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