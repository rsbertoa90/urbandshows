<template>
    <div class="container">
        <div class="row p-5">
            <h1>Mayorista Mates Fabi</h1>
            <p>
                En Mayorista Mates Fabi tenemos precios y diseños únicos. Somos fabricante. Podes visitar nuestras sucursales ubicadas en Once de lunes a viernes de 9 a 18 hs o hacer tu pedido Online. Hacemos envíos a todo el país
                Compra mínima por local $1500, para envíos $3000.
            </p> 
            <p>  
                La compra es entregada sin cargo al transporte de carga elegido por el cliente.
            </p>
        </div>

        <div mt-4 p-2>
            <a href="/cotizador" class="d-flex w-100 justify-content-center">
                <img src="/storage/images/app/no-image.png" alt="presupuesto" height="80px" style="width:85%">
            </a>
        </div>

        <home-maps></home-maps>

        <div>
            <p>
                Atencion Personalizada llamando o por whatsapp al <b> 11-4951-5417 </b>
            </p>
        </div>

        <home-offers></home-offers>
        <hr>
        <div class="mt-4">
            <h2>Productos de Mayorista Mates Fabi  </h2>
            <home-categories-mobile v-if="$mq!='lg'"></home-categories-mobile>
            <home-categories-wide v-else></home-categories-wide>
        </div>

    </div>
</template>

<script>
import homeMaps from './maps.vue';
import homeOffers from './offers.vue';
import homeCategoriesMobile from './categories-mobile.vue';
import homeCategoriesWide from './categories-wide.vue';
export default {
    components:{
        homeMaps,
        homeOffers,
        'home-categories-mobile' : homeCategoriesMobile,
        'home-categories-wide' : homeCategoriesWide
    }
}
</script>
