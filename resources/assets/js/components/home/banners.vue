<template>
    <div >
        <div class="row">
            <div class="col-12 col-lg-8 p-1">
                <a href="/cotizer" class="w-100 d-block">
                    <img src="/storage/images/app/no-image.png" alt="cotizador">
                </a>
            </div>
            <div class="col-12 col-lg-4 row p-1">
                <div class="small-banner col-12">
                    <a href="/cotizer" class="w-100 d-block">
                        <img src="/storage/images/app/no-image.png" alt="cotizador">
                    </a>
                </div>
                <div class="small-banner col-12">
                     <a href="/cotizer" class="w-100 d-block">
                        <img src="/storage/images/app/no-image.png" alt="cotizador">
                    </a>
                </div>
                
                <div class="small-banner col-12">
                     <a href="/cotizer" class="w-100 d-block">
                        <img src="/storage/images/app/no-image.png" alt="cotizador">
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
            padding : 5px 15px ;
        }
    }
</style>