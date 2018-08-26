<template>
    <div >
        <div class="row ml-1 ml-lg-0">
            <div class="col-12 col-lg-8 p-1">
                <a href="/cotizador" class="w-100 d-block">
                    <img src="/storage/images/app/cotizador.gif" alt="cotizador">
                </a>
            </div>
            <div class="col-12 col-lg-4 row p-1">
                <div class="small-banner">
                    <a href="/cotizer" class="w-100 d-block">
                        <img src="/storage/images/app/regalos-empresariales.png" alt="regalos-empresariales">
                    </a>
                </div>
                <div class="small-banner ">
                     <a href="/sucursales" class="w-100 d-block">
                        <img src="/storage/images/app/sucursales.png" alt="sucursales">
                    </a>
                </div>
                
                <div class="small-banner ">
                     <a href="/franquicia" class="w-100 d-block">
                        <img src="/storage/images/app/franquicia.png" alt="franquicia">
                    </a>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    
}
</script>

<style scoped>
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