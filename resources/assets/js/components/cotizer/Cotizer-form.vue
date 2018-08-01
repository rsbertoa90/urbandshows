<template>
    <div class="">
        <h5>Envianos tu pedido</h5>
        <p>Recibiras confirmacion de tu presupuesto por email</p>
        <form class="col-12">
                <csrf></csrf>
               <div class="col-12 row form-group-row">
                   <label class="col-4 col-lg-2" for="">Email</label>
                   <input required type="email" v-model="formData.email"  class="form-control col-8 col-lg-4">
                </div> 
               <div class="col-12 row form-group-row">
                   <label class="col-4 col-lg-2" for="">Telefono</label>
                   <input v-model="formData.phone" type="text" class="form-control col-8 col-lg-4">
                </div> 
               <div class="col-12 row form-group-row">
                   <label class="col-4 col-lg-2" for="">Mensaje</label>
                   <textarea v-model="formData.msg" name="msg" class="form-control col-8 col-lg-4"></textarea>
                </div> 

               <div class="col-12 row form-group-row">
                   <button formnovalidate @click.prevent.stop="ship = false"
                           class="offset-2 btn btn-md"
                           :class="{'btn-outline-info' : ship,
                                    'btn-info text-white font-weight-bold': !ship}">  
                        Retiro en el local                
                    </button>
                   <button formnovalidate @click.prevent.stop="ship = true"
                           class="btn btn-md"
                           :class="{'btn-outline-success' : !ship,
                                    'btn-success text-white font-weight-bold': ship}">  
                        Quiero que me lo envien              
                    </button>
                </div> 
                <div class="col-12 row form-group-row">
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
        },
        ship : false,
       
    }},
    computed : {
        minBuy(){
            return this.ship ? 3000 : 1500 ;
        }
    },

    methods : {
        formValid()
        {
            if (this.formData.email.length < 4)
            {
                swal('Hay algo mal con el mail','','error');
                return false;
            }else if (this.formData.list.length <= 0) 
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
                    msg : this.formData.msg,
                    phone : this.formData.phone,
                    email : this.formData.email,
                    list : JSON.stringify(this.list),
                    total : this.total
                };
                var vm = this;
                $.ajax({
                    method : 'post',
                    data : data,
                    url : '/cotizer/send',
                    success(){
                        swal('Enviamos tu presupuesto. Te estaremos contactando a la brevedad');
                    } 
                });
            }
        }
    }
}

</script>

<style>
</style>