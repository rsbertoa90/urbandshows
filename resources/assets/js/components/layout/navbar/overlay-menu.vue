<template>
    <div id="overlay" >
        <div class="row w-100 p-0 m-0 d-flex ">
           
                <div class="col-9 col-lg-4 p-0">
                    <ul v-on-click-outside="close"> 
                        
                        <li>
                            <a href="/home">
                                Sets
                            </a>
                        </li>
                        <li>
                            <a href="/contacto">
                                Contactanos
                            </a>
                        </li>
                        <li v-if="user.role_id < 3">
                            <a href="/admin">
                                Administracion
                            </a>
                        </li>
                        <li v-if="user.role_id < 3">
                            <a href="/logout">
                                Salir
                            </a>
                        </li>
                    
                    </ul>
                </div>
       
        </div>
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
            showMenu : false,
     }
    },
    computed :{
        user(){
            return this.$store.getters.getUser;
        }
    },

    methods:{
        close(){
            this.$emit('close');
        }
    }
}
</script>

<style scoped lang="scss">


// violeta oscuro es b2037a
$color-first : #242223;

// El verde es 09cca2 
$color-second : #313635;

/* $color-second : #059274; */

// Rosa fuerte es ff0aaf
$color-focus: #3b3a3b; 

// Rosa claro es ff97dd
$color-back: #555555;






      #overlay{
        width: 100vw;
        height: 100vw;
        background-color: #aaaaaa55;
        position: fixed;
        top: 0;
        left: 0;
        z-index: 50;
    }
    
  ul > li:nth-child(odd) {
  background: #fff;
}
  ul > li:nth-child(even) {
  background: darken( #fff, 10% );
}

ul li {
    font-size: 1rem;
    color : $color-first;
    font-weight: bold;
    border-bottom: 1px solid $color-first;
    padding-left: 15px;
    a {
        display: block;
    }
}

</style>