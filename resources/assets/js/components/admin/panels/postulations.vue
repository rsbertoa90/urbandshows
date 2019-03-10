<template>
    <div class="row">
        <div class="col-12 row" v-if="postulations && postulations.length > 0">
            <div class="col-9">
                <messageCard v-if="selectedPostulation" 
                            :postulation="selectedPostulation">
                </messageCard>
            </div>
            <div class="col-3">
                <postulationSide @reload="reload" :postulations="postulations" @selected="selected" @reloadMessages="reload"></postulationSide>
            </div>

        </div>
        <div v-else class="col-12">
            <h3>No hay postulaciones</h3>
        </div>
    </div>
</template>

<script>
import postulationSide from './postulations/sidenav.vue';
import messageCard from './postulations/message.vue';
export default {
    components:{postulationSide,messageCard},
    data(){
        return{
            postulations:null,
            selectedPostulation:null
        }
    },
    created(){
        this.reload();
    },
    methods:{
        reload(){
              this.$http.get('/api/postulations')
            .then(res => {
                this.postulations = res.data;
               
            });
        },
        selected(event){
            this.selectedPostulation=event;
        }
    }

}
</script>
