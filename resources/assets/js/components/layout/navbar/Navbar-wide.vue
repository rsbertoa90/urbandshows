<template>
    <div class="w-100">
        
        <div class="row d-flex justify-content-around align-items-center mt-4">
            <div class="col-2 p-4">
                <div class="">
                    <image-logo></image-logo>
                </div>
            </div>
            <div class="col-6">
                <form class="form-inline" action="/buscar">
                    <div class="input-group w-100">
                        <input type="text" class="form-control" 
                                 aria-label="Buscar productos"
                                placeholder="Que estas buscando?"
                                name="search">
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
                    <span class="fa fa-phone-volume"></span>
                </span>  
                <span class=" p-3 d-big"> 11 3008 5414</span>
            </div>
        </div>

        <div class="row bg-first nav-row">
            <div class="col-3 white-bold p-0">
                <div class="focus-nav-item">
                    <span class="fa fa-bars white-bold mr-1"></span>
                    Productos Mayorista Mates Fabi
                </div>
            </div>
            <div class="row col-9">
                <ul class="navbar">
                    <li> <a href="/cotizador"> Hace tu pedido</a></li>
                    <li> <a href="/regalos-empresariales"> Regalos Empresariales</a></li>
                    <li> <a href="/sucursales"> Sucursales</a></li>
                    <li> <a href="/contacto"> Contacto</a></li>
                    <li> <a href="/franquicia"> Franquicia</a></li>
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

.focus-nav-item
{
    background-color: $color-focus;
    width: 80%;
    margin-left: 10%;
    padding: 15px 6px;
}

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
        a{
            &:hover{
                color:inherit;
                text-decoration: none;
            }
                display: flex;
                 align-items:center;
                justify-content: center;
                width: 100%;
                height: 100%;
        }

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