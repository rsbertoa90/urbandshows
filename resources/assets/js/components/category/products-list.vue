<template>
    <div class="row" v-if="products">
        <div v-for="product in products" :key="product.id"
                 class="col-12 mt-3 row">
                <hr>
                <div class="card col-12 col-lg-4">
                    <img class="card-img-top" :alt="product.name"
                    :src="product.images[0].url" 
                    @click="show(product)">
                    <div class="card-img-overlay" v-if="product.offer">
                        <span class="badge bg-focus white-bold "> Oferta! </span>
                    </div>
                </div>
                <div class="col-12 col-lg-8 d-flex flex-column justify-content-around align-items-between">
                        <div class="h-25 p-2 d-flex flex-column justify-content-between">
                            <h5 clasS="font-weight-bold">{{product.name}}</h5>
                            <h5>${{product.price}}</h5>

                        </div>
                        <div class="h-50 d-flex align-items-end ml-2">
                            <p> {{product.description}} </p>
                        </div>
                        <div class="h-25">
                            <div class="col-4 d-flex align-items-base">
                                <a :href="product.slug" class="btn btn-outline-focus">Ver mas</a>
                            </div>
                        </div>
                
                </div>
                <hr>
        </div>   
         <carousel v-if="carouselProduct" ref="modal" :product ="carouselProduct"></carousel>
    </div>
</template>

<script>
 import carousel from '../cotizer/Carousel.vue';
export default {
    components:{carousel},
    props:['products'],
    data(){
        return {
            carouselProduct : null
        }
    },
    methods:{
         show(product){
                this.carouselProduct = product;
                this.showCarousel = true;

                let element = this.$refs.modal.$el;
              
                $(element).modal('show');
            }
    }
}
</script>

<style lang="scss" scoped>
    a{
        &:hover{
            text-decoration: none;
            color: inherit;
        }
    }
    img:hover{
        cursor: pointer;
    }
   .card-title,.card-subtitle{
       text-align: center;

   }
   .badge{
       margin-right: 80%;
       margin-top:2%;
       padding: 5px;
   }
</style>

