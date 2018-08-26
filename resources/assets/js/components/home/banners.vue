<template>
    <div >
        <div class="row">
            <div class="col-12 col-lg-8 p-1">
                <a href="/cotizador" class="w-100 d-block">
                    <img src="/storage/images/app/cotizador.gif" alt="cotizador">
                </a>
            </div>
            <div class="col-12 col-lg-4 row p-1">
                <div class="small-banner col-12 p-0 p-lg-2 ml-lg-4">
                    <a href="/cotizer" class="w-100 d-block">
                        <img src="/storage/images/app/regalos-empresariales.png" alt="regalos-empresariales">
                    </a>
                </div>
                <div class="small-banner mt-lg-1 col-12 p-0 p-lg-2 ml-lg-4">
                     <a href="/sucursales" class="w-100 d-block">
                        <img src="/storage/images/app/sucursales.png" alt="sucursales">
                    </a>
                </div>
                
                <div class="small-banner mt-lg-1 col-12 p-0 p-lg-2 ml-lg-4">
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

    @media(min-width: 990px){
        .small-banner
        {
            max-width: 89%;
            padding : 5px 15px ;
        }
    }
</style>