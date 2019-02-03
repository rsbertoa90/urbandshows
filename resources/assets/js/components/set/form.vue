<template>
    
    <div>
        <form>
            <div class="row">
                <label for="" class="col-12 col-lg-4">
                    Tu nombre
                </label>
                <input v-model="formdata.name" class="form-control col-12 col-lg-4">
            </div>
          
            <div class="col-12 row form-group-row">         
                <label class="col-12 col-lg-4 " for=""> Provincia </label>
                <select v-if="states.length > 0" v-model="state" class="form-control col-12 col-lg-4">
                    <option v-for="opt in states" :key="opt.id" :value="opt"> 
                        {{opt.name}}
                    </option>
                </select>
            </div>
            <div class="col-12 row form-group-row">
                <label class="col-12 col-lg-4" for=""> Ciudad </label>
                <select v-if="state" v-model="formdata.city_id" class="form-control col-12 col-lg-4">
                    <option v-for="opt in state.cities" :key="opt.id" :value="opt.id"> 
                        {{opt.name}}
                    </option>
                </select>
            </div>

            <div class="row">
                <label for="" class="col-12 col-lg-4">
                    Fecha del evento
                </label>
                <input v-model="formdata.date" class="form-control col-12 col-lg-4">
            </div>
            <div class="row">
                <label for="" class="col-12 col-lg-4">
                     ¿Te gustaria agregar o cambiar algo ? <br>
                    ¿ Tenes en mente una cancion especial que queres que suene en tu fiesta?
                   <br>
                   contanos que necesitas 
                </label>
                <textarea v-model="formdata.message" class="form-control col-12 col-lg-4" />
            </div>

        </form>
    </div>
</template>

<script>
export default {
    data(){
        return{
            formdata:{
                name:'',
                message:'',
                date:'',
                city_id:0,

            },
            state:null,
            city:null,
        }
    },
    computed:{
        states(){
            return this.$store.getters.getStates;
        }
    }
}
</script>

