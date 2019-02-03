<template>
    <div>
        <home-banner/>
        <home-sets></home-sets>
        
    </div>
</template>

<script>
import homeSets from './sets.vue';
import homeBanner from './banner.vue';

export default {
    components:{
        homeSets,
        homeBanner
    }
}
</script>
