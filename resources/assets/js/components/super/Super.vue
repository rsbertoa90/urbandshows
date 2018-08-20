<template>
    
    <div class="row">
        <div class="col-12">
            <super-categories></super-categories>
        </div>
        <div class="col-12">
            <super-metadata></super-metadata>
        </div>
        
    </div>
</template>

<script>
import superCategories from './categories.vue';
import superMetadata from './metadata.vue'
export default {
    components : {
        superCategories,
        superMetadata
    },
    data(){
        return{
            
        }
    }

}
</script>
