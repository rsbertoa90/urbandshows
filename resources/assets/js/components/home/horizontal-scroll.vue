
<template>
<div class="container" >

 
    
      <!-- swiper -->
      <swiper :options="swiperOption" v-if="render">
        <swiper-slide v-for="category in categories" :key="category.id">
            <div class="card">
                <img class="card-img-top" :src="category.image" alt="Card image cap">
                <div class="card-body">
                    <h5 class="card-title"> {{category.name | ucFirst}} </h5>
                    <p class="card-text"> {{category.description}} </p>
                    <a href="#" class="btn btn-primary"> Ver mas</a>
                </div>
            </div>
        </swiper-slide>
        <div class="swiper-pagination" slot="pagination"></div>
        <div class="swiper-button-prev" slot="button-prev"></div>
        <div class="swiper-button-next" slot="button-next"></div>
      </swiper>
  
</div>
</template>

<script>
  export default {
    data() {
      return {
        render:false,
        swiperOption: {
          slidesPerView: null,
          centeredSlides: true,
          spaceBetween: 5,
          pagination: {
            el: '.swiper-pagination',
            clickable: true
          },
          navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev'
          }
        },
        
      }
    },
    created(){
        if (this.$mq == 'lg')
        {
            this.swiperOption.slidesPerView = 3;
        } else{
            this.swiperOption.slidesPerView = 1.5;
        }
        this.render=true;
    },
    computed:{
     
        categories(){
            return this.$store.getters['categories/getCategories'];
        }
    },
    methods: {
      appendSlide() {
        this.swiperSlides.push(this.swiperSlides.length + 1)
      },
      prependSlide() {
        this.swiperSlides.unshift(this.swiperSlides[0] - 1)
      },
      popSlide() {
        this.swiperSlides.pop()
      },
      shiftSlide() {
        this.swiperSlides.shift()
      }
    }
  }
</script>

<style scoped>
  .append-buttons {
    text-align: center;
    margin-top: 20px;
  }
  .append-buttons a {
    display: inline-block;
    margin: 0 10px;
  }
  .container{
      width: 100vw;
  }
</style>