<template>
    <div class="mt-4 row">
        <swiper :options="swiperOption" class="col-12">
            <swiper-slide
                v-for="category in categories" 
                :key="category.id">
                
                <div class="card" itemscope itemtype="https://schema.org/Product">
                    <a :href="category.slug"  class="d-block w-100" itemprop="url">
                        <img itemprop="image" class="card-img-top" :src="category.image" 
                                                :alt="category.name">
                        <div class="card-body">
                            <h5 class="card-title" itemprop="name"> {{category.name | ucFirst}} </h5>
                            <p v-if="category.homedescription" class="card-text crop-text" itemprop="description"> {{category.homedescription}} </p>
                        </div>
                    </a>
                </div>
            </swiper-slide>
        </swiper>
    </div>
</template>

<script>
export default {
     data() {
      return {
        swiperOption: {
          slidesPerView: 4,
          slidesPerColumn: 2,
          spaceBetween: 15,
          pagination: {
            el: '.swiper-pagination',
            clickable: true
          }
        }
      }
    },
    computed : {
        categories(){
            return this.$store.getters['categories/getCategories'];
        }
    }
}
</script>

<style scoped>
    
    .swiper-container {
    height: auto!important;
    margin-left: auto;
    margin-right: auto;
  }
  .swiper-slide {
    height: 400px;
  }
</style>
