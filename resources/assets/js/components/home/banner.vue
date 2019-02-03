<template>
    <div class="">
        <div class="w-100 d-flex justify-content-center bordered">
            <h1>Shows para fiestas y eventos</h1>
        </div>
       <p class="nice-fount">
           Elegi el show ideal para tu fiesta. Busca el estilo perfecto para lo que estas planeando, y si no lo econtras, contactate con nosotros y contanos que necesitas!. Armamos Tu show a medida.

       </p>
       <hr>
    </div>
</template>

<script>

export default {
    components: {},
    data(){
        return{
            gifImages : [
                '/storage/images/app/cotizador1.png',
                '/storage/images/app/cotizador2.png'
            ]
        }
    }
}
</script>

<style scoped>
.bordered{
    border:1px solid #ccc;
    padding:10px;
    font-weight: bold;
    margin-bottom:10px;
}
    .row, a{
        display: flex;
        justify-content: center;
        align-items: center;
    }

  
        .small-banner
        {
            width: 100%;
            padding : 5px 15px ;
        }
    @media(max-width: 990px){
        .small-banner{
            padding: 0;
            margin:15px 0px;
        }
    }
</style>