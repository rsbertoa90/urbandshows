<template>
    <div>
        <div class="d-flex align-items-stretch">
            
            <set-card v-for="set in sets" :key="set.id"
                    :set="set" class="col-4"> 
                    <button class="btn btn-info" @click="editSet(set)">
                        Editar
                    </button>
            </set-card>
        </div>

        <div class="d-flex flex-column mt-4">
            <h3>Nuevo Set:</h3>
            <div class="row">
                <textarea placeholder="Titulo" class="col-3" type="text" v-model.lazy="newSet.title"/>
                <textarea placeholder="Descripcion" class="col-3"  type="text" v-model.lazy="newSet.description"/>
                <button  @click="createSet()" class="btn btn-info col-2">
                    Crear
                </button>
            </div>
            
        </div>
    </div>
</template>

<script>
import setCard from './set.vue';
import setUpdate from './update.vue';
export default {
    props:['sets'],
    components:{
        setCard,
        setUpdate
    },
    data(){
        return{
            newSet:{title:'',description:''},
            updateSet:false,
            setToUpdate:null
        }
    },

    

    methods:{
        fetchSets()
        {
            this.$store.dispatch('sets/fetch');
        },
        createSet()
        {
            var vm =this;
            let data = this.newSet;
            this.$http.post('/admin/set',data)
                .then(res => {
                    vm.fetchSets();
                });
        },
        editSet(set){
           /*  console.log('set',set); */
            this.$emit('updateSet',set);
        }
    }
}
</script>
