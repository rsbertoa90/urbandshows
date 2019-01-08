<template>
    <div class="row w-100">
        <div class="col-3">
                <div class="sidenav  side-borders">
                    <side-nav></side-nav>
                </div>
        </div>
        <div class="col-9">
            <admin-panel></admin-panel>
        </div>
    </div>
</template>

<script>
import adminPanel from './panel.vue';
import sideNav from './side-nav.vue';
export default {
    components:{
        adminPanel,
        sideNav
    },
    data(){
        return{
            sideNav:false
        }
    }
}
</script>

<style scoped lang="scss">
    .fas{
        font-size: 2rem;
        margin-left:50px;

    }
    .side-borders{
        padding:15px;
        border-left: 1px solid black;
        border-right: 1px solid black;
        
    }
</style>

