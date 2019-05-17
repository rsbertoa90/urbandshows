<template>
    <div class="mt-4 mb-4"> 
        <form>
            <div class="row">
                <label class="col-12 col-lg-3">Tu Nombre</label>
                <input type="text" class="col-12 col-lg-3 form-control" 
                        v-model="formData.name">
            </div>
            <div class="row">
                <label class="col-12 col-lg-3">Tu edad</label>
                <input type="number" class="col-12 col-lg-3 form-control" 
                        v-model="formData.age">
            </div>
            <div class="row">
                <label class="col-12 col-lg-3">Que instrumento tocás</label>
                <input type="text" class="col-12 col-lg-3 form-control" 
                        v-model="formData.instrument">
            </div>
            <div class="row">
                <label class="col-12 col-lg-3">De donde sos</label>
                <input type="text" class="col-12 col-lg-3 form-control" 
                        v-model="formData.site">
            </div>
            <div class="row">
                <label class="col-12 col-lg-3">Email</label>
                <input type="text" class="col-12 col-lg-3 form-control" 
                        v-model="formData.email">
            </div>
            <div class="row">
                <label class="col-12 col-lg-3">Teléfono</label>
                <input type="text" class="col-12 col-lg-3 form-control" 
                        v-model="formData.phone">
            </div>
            <div class="row">
                <label class="col-12 col-lg-3">Contanos sobre vos</label>
                <textarea type="text" class="col-12 col-lg-3 form-control" 
                        v-model="formData.text" />
            </div>
            <button @click.prevent="send" class="btn btn-outline-success">
                Enviar
            </button>
        </form>
    </div>
</template>

<script>
export default {
    data(){
        return{
            formData:{
                age:18,
                instrument:'',
                name:'',
                site:'',
                email:'',
                phone:'',
                text:''
            }
        }
    },
    methods:{
        send(){
            
                this.$http.post('/postulacion',this.formData)
                    .then(res => {
                        swal('Tu mensaje se envio','','success')
                        .then(() => {
                            window.location.replace('/');
                        });
                    });    
            
            
        }
    }
}
</script>
