<template>
    <div class="container">   
        
     
        <div>
           
             <!-- <div class="row w-100 d-flex justify-content-center">
                 <img src="/storage/images/app/logo.png" style="width : 200px ; height: 110px" alt="logo">
             </div>  --> 
                <hr>
                <h1>Administrar Productos</h1>
             <hr>
                <admin-create :categories="categories" @productSaved="refresh"></admin-create>
                <hr>
                <div id="accordion">
                    <div v-for="category in categories" :key="category.id" class="card flex-wrap">
                        <div class="card-header" :id="category.id">
                            <h5 class="mb-0">
                                <button class="btn  btn-link w-100 btn-block text-left" 
                                        data-toggle="collapse" 
                                        :data-target="'#category-'+category.id" 
                                        aria-expanded="true" 
                                        :aria-controls="category.name"
                                       >
                                {{category.name.ucfirst()}}
                                </button>
                            </h5>
                        </div>
                        <div :id="'category-'+category.id" class="collapse collapsed" 
                              aria-labelledby="headingOne" 
                              data-parent="#accordion">
                            <div class="card-body">
                            <table class="table table-striped table-bordered ">
                                <thead class="">
                                    <th >imagen</th>
                                    <th>Codigo</th>
                                    <th>Producto</th>
                                    <th>Precio</th>
                                </thead>
                                <transition-group tag="tbody" 
                                                    enter-active-class="animated slideInLeft faster "
                                                    leave-active-class="animated fadeOutDown faster position-absolute ">
                                    <tr v-for="product in category.products" :key="product.id">
                                        <td >
                                            <img v-if="product.images.length > 0" 
                                                  :src="product.images[0].url" 
                                                  :alt="product.name" 
                                                  @click="imgModal(product)">  
                                            <img v-else src="/storage/images/app/no-image.png" 
                                                alt="no-image" @click="imgModal(product)"> 
                                        </td>
                                        <td>  
                                            <input v-model.lazy="product.code" @change="saveChange(product,'code')" type="text" class="nametd"> 
                                        </td>
                                        <td>  
                                            <input placeholder="Nombre" v-model.lazy="product.name" @change="saveChange(product,'name')" type="text" class="nametd"> 
                                            <textarea placeholder="Descripcion" v-model="product.description" @change="saveChange(product,'description')" rows="5"></textarea>
                                        </td>
                                        
                                        <td class="text-info text-center"> 
                                            $<input style="width:80%" type="number" v-model.lazy="product.price" @change="saveChange(product,'price')"> 
                                            <button class="btn btn-block mt-3" :class="{'bg-focus white-bold':product.offer}" @click="toggleOffer(product)">Oferta</button>
                                        </td>                
                                        <td>
                                            <button @click.prevent="deleteProduct(product)" class="btn btn-sm btn-outline-danger m-1">
                                                <i class="fa fa-trash"></i>
                                            </button>
                                            <button @click.prevent="togglePause(product)" class="btn btn-sm m-1" :class="{'btn-info' : !product.paused, 'btn-success': product.paused}">
                                                <i :class="{'fa fa-pause-circle' : !product.paused , 'fa fa-play' : product.paused}"></i>
                                            </button>
                                            
                                        </td>
                                    </tr>
                                </transition-group>
                            </table>
                            </div>
                        </div>
                    </div>
                </div>
                <image-modal :product="product"  ref="modal" @refresh="refresh()"></image-modal>
        </div>

        
    </div>
</template>

<script>
import imageModal from './Img-modal.vue';
import adminCreate from './Create.vue';
    export default {
        components : {
            imageModal : imageModal,
            adminCreate : adminCreate
        },
        data(){
            return {
                categories : [],
                list : [],
                product : null,
                showModal : false,
            }
        },
        methods : {
            toggleOffer(product){
                product.offer = ! product.offer;
                var data = {
                    id : product.id,
                    field : 'offer',
                    value : product.offer ? 1 : 0
                }
                $.ajax({
                    method : 'put',
                    data : data,
                    url : '/admin/product'
                });
            },
            togglePause(product){
                var vm = this;
                product.paused = !product.paused;
                vm.saveChange(product,'paused');
                for (const key in vm.categories) {
                    if (vm.categories.hasOwnProperty(key)) {
                        const category = vm.categories[key];
                        for (const k in category.products) {
                            if (category.products.hasOwnProperty(k)) {
                                const prod = category.products[k];
                                if (prod.id == product.id )
                                {
                                    vm.categories[key].products[k].paused = product.paused;
                                    return;
                                }
                            }
                        }
                    }
                }

                
            },
            deleteProduct(product){
                var vm = this;
                this.$http.delete('/admin/product/'+product.id)
                    .then(response => {
                        // console.log(response);
                        for (const key in vm.categories) {
                            if (vm.categories.hasOwnProperty(key)) {
                                const cat = vm.categories[key];
                                for (const k in cat.products) {
                                    if (cat.products.hasOwnProperty(k)) {
                                        const prod = cat.products[k];
                                        if(prod.id == product.id)
                                        {
                                            vm.categories[key].products.splice(k,1);
                                            if (vm.categories[key].products.length == 0){
                                                vm.categories.splice(key,1);
                                            }
                                        }
                                    }
                                }
                            }
                        }
                        
                    });
            },
            logme(e){console.log(e)},
            refresh(){
                var vm = this;
                $.ajax({
                    url : 'api/categories',
                    success(response){
                        vm.categories = response;
                    }
                });
            },
            saveChange(product,field){
                var data = {
                    product : product.id,
                    field : field,
                    value : product[field]
                }
                $.ajax({
                    method : 'put',
                    data : data,
                    url : '/admin/product'
                });
            },
            imgModal(product){
                this.product = product;
                this.showModal = true;
                let element = this.$refs.modal.$el
                
                $(element).modal('show')
            }
        },
        created(){
            var vm = this;
            $.ajax({
                url : 'api/categories',
                success(response){
                    vm.categories = _.sortBy(response,'name');
                    
                    // console.log (vm.categories);
                }
            });

            
        },
        filters : {
            price(value){
                return  value.toFixed(2);
            }
        }
    }
</script>

<style scoped>
.btn-link {color : black;}
    td img {
        width: 10vw;
    }
   @media(max-width: 600px){
       table,.container,.card,.card-body {font-size: 0.66rem ; padding : 0}
       
       th,td, input{
           white-space:nowrap;
           width: 13vw;
           padding: 2px;
       }
       .form-control{width: 20vw;}
       .nametd {width: 25vw;}
   }
</style>
