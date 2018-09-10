<template>
    <div class="w-100">
        <div class="row d-flex justify-content-center">
            <div class="w-50 mt-3 p-3 ">
                <image-logo></image-logo>
            </div>
        </div>
         <transition enter-active-class="animated slideInLeft faster"
                        leave-active-class="animated slideOutLeft faster">
            <overlay-menu v-if="showMenu" :categories='categories' 
                        @close="showMenu=false"></overlay-menu>
        </transition>
             <nav class="navbar navbar-expand-lg navbar-dark bg-first row">
             <button aria-label="menu" class="navbar-toggler col-1 offset-1 bg-second d-flex justify-content-center align-items-center
                            text-white font-weight-bold" 
                     @click="showMenu = true" >
                <span class="fa fa-bars"></span>
            </button>
            <form class="form-inline col-10" action="/buscar">
                <div class="input-group">
                    <input type="text" class="form-control" 
                            aria-label="Buscar productos"
                            name="search"
                            placeholder="Que estas buscando?">
                    <div class="input-group-prepend">
                        <span class="input-group-text bg-second d-flex justify-content-center" id="search-addon">
                            <span class="fa fa-search text-white font-weight-bold">
                            </span>
                        </span>
                    </div>
                </div>  
            </form>
        </nav>

    


         

      
    </div>
</template>

<script>
import imageLogo from '../images/image-logo.vue';
import overlayMenu from './overlay-menu.vue'
import {mapGetters} from 'vuex';
export default {
    components : {
        imageLogo,
        overlayMenu
    },
    data(){
        return{
            showMenu : false
     }
    },
    computed :{
        ...mapGetters({
            categories : 'categories/getCategories'
        }),
    }
}
</script>

<style>
  


</style>