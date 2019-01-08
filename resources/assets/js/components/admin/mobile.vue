<template>
    <div>
        <div>
            <div class="row">
                <button @click="sideNav=true" class="btn btn-outline-info ">
                    <span class="fas fa-bars"></span>
                </button>
            </div>
            <transition enter-active-class="animated slideInLeft">
                <div v-if="sideNav" class="sidenav">
                    <side-nav></side-nav>
                </div>
            </transition>
            <div class="col-12">
                <admin-panel></admin-panel>
            </div>
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
</style>

