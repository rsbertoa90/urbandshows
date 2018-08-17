<template>
    <div class="w-100">
        
        <div class="row d-flex justify-content-around align-items-center mt-4">
            <div class="col-3 p-4">
                <div class="p-4">
                    <image-logo></image-logo>
                </div>
            </div>
            <div class="col-6">
                <form class="form-inline">
                    <div class="input-group w-100">
                        <input type="text" class="form-control" 
                                placeholder="Que estas buscando?">
                        <div class="input-group-prepend">
                            <span class="white-bold input-group-text bg-second d-flex justify-content-center" 
                                  id="basic-addon1">
                                Buscar
                            </span>
                        </div>
                    </div>  
                </form>
            </div>
            <div class="col-3 flex-button">
                <span class="white-bold bg-second p-2 flex-button rounded" style="width:60px">
                    <fa-icon icon="phone-volume" ></fa-icon>
                </span>  
                <span class=" p-3 d-big"> 11 3008 5414</span>
            </div>
        </div>

        <div class="row bg-first nav-row">
            <div class="col-4 white-bold  row p-0">
                <div class=" offset-3 w-100 col-9  bg-focus bb-second p-3 ">
                    <span class="fa fa-bars white-bold mr-1"></span>
                    Productos Mayorista Mates Fabi
                </div>
            </div>
            <div class="row col-8">
                <ul class="navbar">
                    <li>Hace tu pedido</li>
                    <li>Regalos Empresariales</li>
                    <li>Sucursales</li>
                    <li>Contacto</li>
                    <li>Franquicia</li>
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

<style scoped lang="scss">
 $color-first : #b2037a;

// El verde es 09cca2 
$color-second : #09cca2;

// Rosa fuerte es ff0aaf
$color-focus: #ff0aaf; 

// Rosa claro es ff97dd
$color-back: #ff97dd;

.fa-phone-volume{
    font-size: 2rem;
}
.nav-row{
           margin: 0px -7.5%;
       }
  
.navbar{
    font-weight: bold;
    color:#fff;
    display:flex;
    width: 100%;
    justify-content: space-around;
    align-items: center;
    margin: 0;
    padding: 0;
    li{
        cursor:pointer;
        padding: 1;

        height: 100%;
        width: 20%;
        display: flex;
        align-items:center;
        justify-content: center;
        &:hover{
             background-color: #eee;
             color: darken($color-second,10%);
            border-bottom: 3px solid $color-second;
        }
    }

 
     
   

}
</style>