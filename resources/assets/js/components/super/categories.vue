<template>
    <div class="row">
        <div class="col-12">
            <h2>Descripciones y metadata de Categorias</h2>
            <hr>
        </div>
        
        <div class="col-12 col-lg-4 d-flex flex-column">
            <button v-for="category in categories" 
                    :key="category.id"
                    @click="selected=category"
                    class="btn btn-block bg-first white-bold"
                    :class="{'bg-focus' : selected == category}">
                    {{category.name}}
            </button>
        </div>
        <div class="col-12 col-lg-8">
            <div v-if="selected">
                <h2> {{selected.name}} </h2>

                <div class="p2 row">
                    <label class="col-12 col-lg-4">
                        Descripcion
                    </label>
                    <textarea rows="5" v-model.lazy="selected.description" @change="save(selected,'description')" 
                        type="text" class="col-12 col-lg-8 form-control"></textarea>
                </div>
                <div class="p2 row">
                    <label class="col-12 col-lg-4">
                        Meta Titutlo
                    </label>
                    <textarea rows="5" v-model.lazy="selected.metatitle" @change="save(selected,'metatitle')" 
                        type="text" class="col-12 col-lg-8 form-control"></textarea>
                </div>
                <div class="p2 row">
                    <label class="col-12 col-lg-4">
                        Meta Descripcion
                    </label>
                    <textarea rows="5" v-model.lazy="selected.metadescription" @change="save(selected,'metadescription')" 
                        type="text" class="col-12 col-lg-8 form-control"></textarea>
                </div>
            </div>
          
        </div>
    </div>
</template>

<script>
export default {
    computed : {
        categories(){
            return this.$store.getters['categories/getCategories'];
        }
    },
    data(){
        return{
            selected : null
        }
    },
    methods :{
        save(category,field){
            var data = {
                id : category.id,
                field : field,
                value : category[field]
            }
            this.$http.put('/admin/category',data);
        }
    }

}
</script>
