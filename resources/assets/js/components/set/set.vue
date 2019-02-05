<template>
        <div class="container">
            <div class="row">
                <div class="col-12 col-lg-4">
                    <img :src="set.image" :alt="set.title">
                </div>
                <div class="col-12 col-lg-4 d-flex flex-column">
                    <h1> {{set.title}} </h1>
                    <p> {{set.description}} </p>
                     <p> {{set.details}} </p>
                      <p> a partir de ${{set.base_price}} </p>
                    
                </div>
                <div class="col-12 col-lg-4">
                    <h3>Incluye las siguientes canciones:</h3>
                    <ul>
                           <li v-for="song in set.songs"
                                :key="song.id">
                                <span class="fa fa-star"></span>
                                <a v-if="song.sample" :href="song.sample">
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
                       
                        <set-form></set-form>
               

                </div>
            </div>
        </div>
</template>

<script>
import setForm from './form.vue';
export default {
    props:['set_id'],
    components:{setForm},
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
