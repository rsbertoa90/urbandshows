<template>
    <div class="row" v-if="products">
        <div v-for="product in products" :key="product.id"
                 class="col-12 col-lg-4 mt-3">
            
                <div class="card text-center p-1">
                    <img v-if="product.images[0]" class="card-img-top" :alt="product.name"
                    :src="product.images[0].url" 
                    @click="show(product)">
                    <img v-else src="/storage/images/app/no-image.png" 
                        class="card-img-top" alt="no hay foto">
                    <div class="card-img-overlay" v-if="product.offer">
                        <span class="badge bg-focus white-bold "> Oferta! </span>
                    </div>
                    <div class="card-body p-0">
                        <h5 style="height:40px" class="card-title font-weight-bold">{{product.name}}</h5>
                        <h5 v-if="config && !config.hide_prices" class="card-subtitle">${{product.price}}</h5>
                      <!--   <p class="card-text"> {{product.description}} </p> -->
                        <a :href="product.slug" class="btn btn-outline-focus">Ver mas</a>
                    </div>
                </div>
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
    ,
    computed : {
            config(){
                return this.$store.getters.getConfig;
            }
        },
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

