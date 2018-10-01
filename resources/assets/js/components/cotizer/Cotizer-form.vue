<template>
    <div class="" v-if="user">
        <h5>Envianos tu pedido</h5>
        <p>Recibiras confirmacion de tu presupuesto por email</p>
        <form id="form" class="col-12">
               
               <div v-if="user.role_id > 2" class="col-12 row form-group-row">
                   <label class="col-4 col-lg-4" for="">Nombre</label>
                   <input required type="text" v-model="formData.client"  class="form-control col-8 col-lg-4">
                </div> 
                 <div v-if="user.role_id < 3" class="col-12 row form-group-row">
                   <label class="col-4 col-lg-4" for="">Nombre del vendedor</label>
                   <input required type="text" v-model="formData.seller"  class="form-control col-8 col-lg-4">
                </div> 
               <div v-if="user.role_id < 3" class="col-12 row form-group-row">
                   <label class="col-4 col-lg-4" for="">Nombre del cliente</label>
                   <input required type="text" v-model="formData.client"  class="form-control col-8 col-lg-4">
                </div> 
              
               <div class="col-12 row form-group-row">
                   <label class="col-4 col-lg-4" for="">Email</label>
                   <input :required="user.role_id > 2" type="email" v-model="formData.email"  class="form-control col-8 col-lg-4">
                </div> 
               <div class="col-12 row form-group-row">
                   <label class="col-4 col-lg-4" for="">Telefono</label>
                   <input v-model="formData.phone" type="text" class="form-control col-8 col-lg-4">
                </div> 
               <div class="col-12 row form-group-row">
                   <label class="col-4 col-lg-4" for="">Mensaje</label>
                   <textarea v-model="formData.msg" name="msg" class="form-control col-8 col-lg-4"></textarea>
                </div> 

               <div v-if="user.role_id > 2" class="col-12 row form-group-row mt-2">
                   <div class="col-12 col-lg-5 offset-lg-2 p-0">
                        <button formnovalidate @click.prevent.stop="ship = false"
                            class="btn btn-block"
                            :class="{'btn-outline-info' : ship,
                                        'btn-info text-white font-weight-bold': !ship}">  
                            Retiro en el local                
                        </button>
                   </div>
                    <div class="col-12 col-lg-5 p-0">
                        <button formnovalidate @click.prevent.stop="ship = true"
                                class="btn btn-block"
                                :class="{'btn-outline-success' : !ship,
                                            'btn-success text-white font-weight-bold': ship}">  
                                Quiero que me lo envien              
                        </button>
                    </div>
                </div> 
                <div v-if="user.role_id > 2" class="col-12 row form-group-row">
                    <span class="offset-2 text-danger" v-if="!ship">*El minimo de compra retirando en el local es de ${{minBuy}}</span>
                    <span class="offset-2 text-danger" v-if="ship">*El minimo de compra para envios es de ${{minBuy}} </span>
                </div> 

                <button class="button btn-lg btn-outline-success offset-2 mt-2" 
                        @click.prevent.stop="send">
                        Enviar
                </button>
        </form>
    </div>
</template>

<script>
export default{
    props : {
        list : {default : []},
        total : {default : 0}
    },

    data(){return{
        formData : {
            msg : '',
            phone : '',
            email : '',
            client:'',
            seller:''
        },
        ship : false,
       
    }},
    computed : {
        minBuy(){
           if(this.user && this.user.role_id > 2)
           {
              return this.ship ? 3000 : 1500 ;
           }
           return 1;
        },
        user(){
            return this.$store.getters.getUser;
        }
    },
    
    methods : {
        formValid()
        {
            if (this.formData.email.length < 4 && this.user.role_id > 2)
            {
                swal('Hay algo mal con el mail','','error');
                return false;
            }else if (this.list.length <= 0) 
            {   
                swal('No hay productos seleccionados','','error');
                return false;
            } else if (this.total < this.minBuy)
            {
                swal('El minimo de compra es de $'+this.minBuy,'','error');
                return false;
            } else {return true;}
        },
        send(){
            if (this.formValid()){

                var data = {
                    message : this.formData.msg,
                    phone : this.formData.phone,
                    email : this.formData.email,
                    client : this.formData.client,
                    seller :this.formData.seller,
                    list : JSON.stringify(this.list),
                    total : this.total
                };
                var vm = this;
                $.ajax({
                    method : 'post',
                    data : data,
                    url : '/cotizer/send',
                    success(r){
                        console.log(r);
                        if(vm.user.role_id > 2){
                            swal('Enviamos tu presupuesto', 'Te estaremos contactando a la brevedad','success')
                                .then(confirm => {window.location.replace('/')});
                        }
                        else{
                            swal('Orden guardada', 'Revisa el panel de administracion deordenes','success')
                                .then(confirm =>{window.location.replace('/admin/cotizador')});
                        }
                    } 
                });
            }
        }
    }
}

</script>

<style>
</style>