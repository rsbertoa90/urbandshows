<template>
    <div>

         <div class="songs-panel d-flex flex-column">
                <h3>Canciones:</h3>
                <br>
                <table class="table table-striped"
                        :class="{'w-50':$mq=='lg'}">
                    <thead>
                        
                    </thead>
                    <transition-group tag="tbody" 
                                    enter-active-class="animated slideInLeft"
                                    leave-active-class="animated slideOutRight">
                        <tr v-for="song in set.songs" :key="song.id">
                            <td class="d-flex flex-column"> 
                                <button @click="moveUp(song)" v-if="song.order > 1" class="btn btn-sm btn-link"> <span class="fa fa-arrow-up"></span> </button>
                                <button @click="moveDown(song)"  v-if="song.order < set.songs.length" class="btn btn-sm btn-link" > <span class="fa fa-arrow-down"></span></button>
                            </td>
                            <td class="align-middle">{{song.order}} </td>
                            <td class="align-middle">{{song.name |ucFirst}}</td>
                            <td class="align-middle"> <a class="text-info" :href="song.sample" rel="noreferrer" target="_blank"> {{song.sample}} </a> </td>
                            <td class="align-middle"> <button class="btn-btn-sm btn-outline-danger"
                                        @click="destroySong(song.id)">
                                        X
                                 </button> 
                            </td>
                        </tr>
                    </transition-group>
                </table>
            </div>
            <hr>

            <div class="row new-song">
                <span class="col-12">

                    Nueva cancion:
                </span>
                <input type="text" v-model.lazy="newSong.name" 
                        class="col-4 form-control" placeholder="Nombre">
                <input type="text" v-model.lazy="newSong.sample" 
                        class="col-4 form-control" placeholder="Link de muestra">
                <button class="btn col-2 ml-1 btn-success"
                        @click="saveNewSong()" >
                    Guardar
                </button>
            </div>
            
    </div>
    

</template>

<script>
export default {
    props:['set'],
    data(){
        return{
             newSong:{
                set_id:0,
                name:'',
                sample:''
            }
        }
    },
    methods:{
        saveNewSong(){
            this.newSong.set_id=this.set.id;
            this.$http.post('/admin/song',this.newSong)
                .then(res => {
                    this.$store.dispatch('sets/fetch'); 
                    
                    this.newSong.name = '';
                    this.newSong.sample = '';
                    this.$forceUpdate();
                });
        },
        destroySong(id)
        {
            this.$http.post('/admin/song/delete/'+id)
                .then(res => {
                       this.$store.dispatch('sets/fetch'); 
                });
        },
        updateSong(song,field)
        {
            let data = {
                field : field,
                value : song[field],
                id: song.id 
            }
            this.$http.put('/admin/song',data)
                .then(res => {
                    this.$store.dispatch['sets/fetch'];
                    this.$forceUpdate();
                });
        },
        moveUp(song){
            let otherSong = this.set.songs.find(s => {
                return s.order == song.order-1;
            });
            otherSong.order++;
            song.order--;
            this.set.songs = _.sortBy(this.set.songs,'order');
            this.updateSong(song,'order');
            this.updateSong(otherSong,'order');
         
        },
        moveDown(song){
            let otherSong = this.set.songs.find(s => {
                return s.order == song.order+1;
            });
            otherSong.order--;
            song.order++;
            this.set.songs = _.sortBy(this.set.songs,'order');
            this.updateSong(song,'order');
            this.updateSong(otherSong,'order');
           
        }
        }
}
</script>
