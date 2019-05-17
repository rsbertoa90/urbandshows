<template>
        <div class="container" v-if="set">
              <div class="row">
                <div class="col-12 justify-content-center d-flex">
                  <h1> {{set.title |uc}} </h1>
                </div>
            </div>
            
            <div class="row mt-4" v-if="set.samplevid">
                <div class="col-12 d-flex justify-content-center">
                    <iframe width="100%" :height="$mq=='lg' ? '400px' :' 200px'"
                        :src="'https://www.youtube.com/embed/'+set.samplevid">
                    </iframe>
                </div>
            </div>
          
            <div class="row mt-4">
                <div class="col-12 col-lg-4">
                    <img :src="set.image" :alt="set.title">
                </div>
                <div class="col-12 col-lg-4 d-flex flex-column">
                  
                    <p> {{set.description}} </p>
                     <p> {{set.details}} </p>
                  
                    
                </div>
                <div class="col-12 col-lg-4">
                    <h3>Incluye las siguientes canciones:</h3>
                    <ul>
                           <li v-for="song in set.songs"
                                :key="song.id">
                                <span class="fa fa-star"></span>
                                <a v-if="song.sample" :href="song.sample" class="songsample">
                                    {{song.name}}
                                </a>
                                <span v-if="!song.sample">
                                    {{song.name}}    
                                </span>    
                            </li>
                       </ul>
                </div>
                <hr>
                <div class="col-12 row mt-4">

                       <h3>
                        ¡Contrata este show para tu evento!
                       </h3>
                       <br>
                       

                </div>
                <div class="col-12 row mt-4">

                       
                       
                       
                        <set-form :set_id="set_id"></set-form>
               
                </div>
            </div>
         
            <div class="row mt-4">
                <relatedSets></relatedSets>
            </div>
        </div>
</template>

<script>
import relatedSets from './related.vue';
import setForm from './form.vue';
export default {
    props:['set_id'],
    components:{setForm,relatedSets},
    data(){
        return{}
    },
    computed:{
        sets(){
            return this.$store.getters['sets/getSets'];
        },
        set(){
            if (this.sets){
                return this.sets.find(s => {
                    return s.id == this.set_id;
                });
            }
        }
    }

}
</script>
<style lang="scss" scoped>
.songsample{
    cursor: pointer;
    color:#0000ff;
}
</style>

