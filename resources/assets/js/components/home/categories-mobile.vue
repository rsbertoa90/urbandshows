<template>
<div class="container mt-4">
    <div class="mt-4 row">
        <div class="col-12" 
              v-for="category in categories" 
              :key="category.id">
              
            <div class="card" itemscope itemtype="https://schema.org/Product">
                <a :href="'/'+category.slug"  class="d-block w-100" itemprop="url">
                    <img itemprop="image" class="card-img-top" :src="category.image" 
                                            :alt="category.name">
                    <div class="card-body">
                        <h5 class="card-title" itemprop="name"> {{category.name | ucFirst}} </h5>
                        <p v-if="category.description" class="card-text" itemprop="description"> {{category.description}} </p>
                    </div>
                </a>
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
    }
}
</script>
