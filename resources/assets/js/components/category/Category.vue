<template>
    <div class="container" v-if="category">
        <div class="row">
            <div class="col-12">
                <h1> {{category.name}} </h1>
            </div>
        </div>
        <div class="row">
            <div class="col-12 col-lg-6">
                <img :src="category.image" :alt="category.name">
            </div>
            <div class="col-12 col-lg-6">
                {{category.description}}
            </div>
        </div>
        <!-- LINKS -->
        <div class="row links mt-3">
            <div class="col-2 col-lg-2 p-0">
                <button @click="display = 'grid'"
                        class="btn btn-sm "
                        :class="{'bg-focus white-bold' : display == 'grid'}">
                        <span class="fa fa-th"></span>
                </button>
                <button @click="display = 'list'"
                        class="btn btn-sm "
                        :class="{'bg-focus white-bold' : display == 'list'}">
                        <span class="fa fa-list-ul"></span>
                </button>
            </div>
            <div class="col-10 col-lg-8 row p-0 d-flex justify-content-start pl-4">
                <div class="col-5 row p-0">
                    <label class=" p-0 pt-2 col-5 text-right pr-1">Ordenar</label>
                    <select class="form-control col-7" v-model="sortby">
                        <option value="name">Nombre</option>
                        <option value="price">Precio</option>
                    </select>
                </div>
                <div class="col-1 offset-1">
                    <button v-if="order == 'asc'" 
                            class="btn btn-sm bg-transparent" 
                            @click="order='desc'">
                        <span class="fa fa-arrow-up"></span>
                    </button>
                    <button v-else
                            class="btn btn-sm bg-transparent" 
                            @click="order = 'asc'">
                        <span class="fas fa-arrow-down"></span>
                    </button>
                </div>
                <div class="col-5 col-lg-3 row p-0">
                    <label class=" col-6 pt-2 pr-1 ">Mostrar</label>
                    <select class="form-control col-6 p-0" v-model="show">
                        <option v-for="op in showOptions" 
                                :key="op"
                                :value="op"> 
                                {{op}} 
                        </option>
                    </select>
                </div>
            </div>
            <div class="col-12 mt-2 mt-lg-0 col-lg-2">
                <div v-if="pages > 1">
                    <button v-if="page != 1" class=" bg-transparent"
                            @click="page--">
                        <span class="fa fa-chevron-left"></span>
                    </button>
                    <button v-for="p in pages" :key="p" 
                            class=" bg-transparent"
                            :class="{'text-focus' : page == p }"
                            @click="page = p">
                        <span> {{p}} </span>
                    </button>
                    
                    <button v-if="page != pages" class=" bg-transparent"
                            @click="page++">
                        <span class="fa fa-chevron-right"></span>
                    </button>
                </div>
            </div>
        </div>
        <!-- END links -->

        <div class="row">
            <div class="col-12" v-if="display == 'grid'">
                <products-grid :products="products"></products-grid>
            </div>
            <div class="col-12" v-else>
                <products-list :products="products"></products-list>
            </div>
        </div>
    </div>
</template>

<script>
import productsGrid from './products-grid.vue';
import productsList from './products-list.vue';
export default {
    components : {productsGrid,productsList},
    props : ['category_id'],
    computed : {
        category(){
            return this.$store.getters['categories/getCategory'](this.category_id);
        },
        products(){
            
            
            if (this.category != null && this.category.products.length > 0){

                let prods = this.category.products;
                prods = _.sortBy(prods,this.sortby);
                if (this.order == 'desc'){
                    prods = prods.reverse();
                }
                let from = (this.page-1)*this.show;
                let to = from + this.show;
                prods = prods.slice(from,to);
           
                return prods;
            }
        },
        pages(){
            return Math.round(this.category.products.length / this.show);
        },
      
    },
    data(){
        return{
            display : 'list',
            sortby : 'name',
            order : 'desc',
            showOptions :[3,6,9,12],
            show:3,
            page:1,
        }
    },
    watch : {
        show(){
            this.page = 1 ;
        }
    }
}
</script>

<style lang="scss" scoped>
    .links{
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 5px;
        background-color: #6e6c6c44;
        font-size: .75rem;
        font-weight: bold;
        div{
             display: flex;
                justify-content: center;
                align-items: center;
        }
    }
    .form-control{
        font-size: .7rem;
        padding: 0;
    }
    @media(max-width: 990px){
        .links{
            margin-left: -11%;
            margin-right: -20%;
        }
    }
</style>
