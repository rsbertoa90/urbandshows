<template>
<div>
    <div class="row">
        <admin-header></admin-header>
    </div>
    <div class="row mt-4 w-100">
        <mobile-admin v-if="$mq!='lg'" ></mobile-admin>
        <web-admin v-else></web-admin>
    </div>
    

</div>
</template>


<script>
import mobileAdmin from './mobile.vue'
import webAdmin from './web.vue'
import adminHeader from './header.vue'
export default {
    components:{
        mobileAdmin,
        webAdmin,
        adminHeader
    }
}
</script>


<style lang="scss" scoped>
 
</style>
