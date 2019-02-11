<template>
    
    <div>
        <form>
            <div class="row">
                <label for="" class="col-12 col-lg-4">
                    Tu nombre
                </label>
                <input v-model="formdata.name" class="form-control col-12 col-lg-4">
            </div>
            <div class="row">
                <label for="" class="col-12 col-lg-4">
                    Tu Mail
                </label>
                <input v-model="formdata.mail" class="form-control col-12 col-lg-4">
            </div>
            <div class="row">
                <label for="" class="col-12 col-lg-4">
                    Dejanos un telefono
                </label>
                <input v-model="formdata.phone" class="form-control col-12 col-lg-4">
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
            <button class="btn-lg btn-outline-info" @click.prevent="submit()">Enviar</button>
        </form>
    </div>
</template>

<script>
export default {
    props:['set_id'],
    data(){
        return{
            formdata:{
                name:'',
                phone:'',
                mail:'',
                message:'',
                date:'',
                city_id:0,
                set_id:null

            },
            state:null,
            city:null,
        }
    },
    computed:{
        states(){
            return this.$store.getters.getStates;
        }
    },
    methods:{
          submit(){
            var vm = this;
            vm.formdata.set_id = vm.set_id;
                swal('Mensaje enviado','Nos comuicaremos con usted a la brevedad','success')
                    .then (response => {
                       vm.$http.post('/setform',vm.formdata)
                        .then(res=>{
                            window.location.replace("/");
                        })
                    });
        }
    }
}
</script>

