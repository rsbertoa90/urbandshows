<template>
    <div class="container" v-if="set">
        <div class="d-flex">
            <button class="btn btn-lg btn-outline-danger mb-4" @click="$emit('backToList')"> <span class="fa fa-arrow-left"></span> </button>
            <h2 class="ml-4"> {{set.title |ucFirst}} </h2>
        </div>
        <p v-if="set.description"> {{set.description | ucFirst}} </p>
        <br>
        <p v-if="set.details" style="font-sstyle:italic"> {{set.details |ucFirst}} </p>
        <hr>
        
        <div class="row d-flex flex-column ">
            <div class="image-container">
                <img v-if="set.image" :src="set.image" :alt="set.name">
                <img v-else src="/storage/images/app/no-image.png" alt="">
            </div>
            <div>
                <label class="btn btn-file btn-outline-info">
                    <input type="file" style="display:none"
                             @change="imageUploaded =true">
                    Cargar imagen
                </label>
                <button v-if="imageUploaded" class="btn btn-info" @click="saveImage()">Guardar</button>
            </div>
        </div>
        <hr>
        <div class="row d-flex flex-column mt-4">
            <div class="row">
                <label class="col-4"> Titulo: </label>
                <textarea type="text" class="col-4 form-control" 
                    v-model.lazy="set.title"
                    @change="update('title')" />
            </div>

            <div class="row">
                <label class="col-4"> Video muestra: </label>
                <div class="col-4">
                    <textarea type="text" class=" form-control" 
                        v-model.lazy="set.samplevid"
                        @change="update('samplevid')" />
                    <span class="text-warning"> Poner solo el id del video: </span>
                    <span>https://www.youtube.com/watch?v=<span class="text-danger font-weight-bold">Q2u8TyOVpOo</span></span>
                </div>
            </div>

            <div class="row">
                 <label class="col-4"> Descripcion: </label>
                <textarea  type="text" class="form-control col-4" 
                v-model.lazy="set.description"
                @change="update('description')" />
            </div>

            <div class="row">
                 <label class="col-4"> 
                     <span>Detalles:</span> <br>
                     <span style="font-size:.85rem;font-style:italic">
                         Cantidad de integrantes, instrumentos, duracion.
                    </span> 
                </label>
                <textarea  type="text" class="form-control col-4" 
                v-model.lazy="set.details"
                @change="update('details')" />
            </div>

            <div class="row">
                 <label class="col-4"> Palabras clave: </label>
                <textarea  type="text" class="form-control col-4" 
                v-model.lazy="set.tags"
                @change="update('tags')" />
            </div>

             <div class="row">
                 <label class="col-4"> Precio del set: </label>
                <input  type="number" step="1" class="form-control col-4" 
                v-model.lazy="set.base_price"
                @change="update('base_price')" />
            </div>
            <hr>

            <songs-panel :set="set"></songs-panel>
           
    
    </div>
</div>
</template>


<script>
import songsPanel from './songs.vue';
export default {
    components:{songsPanel},
    props:['rawset'],
    data(){
        return{
            imageUploaded:false,
            file:null,
           
        }
    },
    computed:{
        set(){
            
            return this.$store.getters['sets/getSet'](this.rawset.id);
        }
    },
    methods:{
             saveImage :  function(event){
                var vm =this;
                var file = $('input[type="file"]')[0].files[0];
                if (file == null){
                    swal('No se ha seleccionado una imagen','','error');
                } else {

                    this.file = file;
                    // console.log(file);
                    
                    
                    var fdata =  new FormData();
                    fdata.append('image',file);
                    fdata.append('set',this.set.id)
                    // console.log(fdata);
                    
    
                    $.ajax({
                        url: "/admin/set/image",
                        type: "post",
                        data: fdata,
                        // async: false,
                        cache: false,
                        contentType: false,
                        processData: false,
                        files : true,
                        success: function () {
                           vm.$store.dispatch('sets/fetch');
                         /*   $('input[type="file"]')[0].files[0] = null; */
                           vm.imageUploaded = false;
                        },
                    });
                }

        
        },

        update(field)
        {
            let vm = this;
            let data = {
                field :field,
                value : this.set[field],
                id : this.set.id
            }

            this.$http.put('/admin/set',data)
                .then(response => {

                });
        },
        
    }
}
</script>


<style scoped lang="scss">

.image-container{
    width: 200px;
    padding:10px;
    border: 1px solid #ccc;
    margin-bottom:15px;
    img{
        width:100%;
    }
}

.songs-panel{
    ul{
        li{

            display:flex;
            padding:2px;

        }
    }
}
    
</style>