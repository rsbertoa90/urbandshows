<template>
    <div>
       <setList :sets="sets"  @updateSet="updateSet($event)" v-if="list"></setList>
       <setUpdate v-else :rawset="setToUpdate" @backToList="backToList()"></setUpdate>
    </div>
</template>

<script>
import setList from './sets/list.vue';
import setUpdate from './sets/update.vue';
export default {
    components:{
        setList,
        setUpdate
    },
    data(){
        return{
            list:true,
            setToUpdate:null
        }
    },
    computed:{
        sets(){
            return this.$store.getters['sets/getSets'];
        }
    },
    methods:{
        updateSet(event)
        {
           /*  console.log(event); */
            this.setToUpdate = event;
            this.list = false;
        },
        backToList(){
            this.list =true;
            this.setToUpdate =null;
        }
    }
    
}
</script>
