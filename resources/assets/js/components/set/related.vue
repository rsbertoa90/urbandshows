
<template>
<div class="container w-100" v-if="sets && sets.length > 0" >
  <hr>
      <!-- swiper -->
      <swiper :options="swiperOption" v-if="render">
        <swiper-slide  v-for="set in sets" :key="set.id">
            <div class="card" itemscope itemtype="https://schema.org/set">
                <div>
                  <v-lazy-image v-if ="set.image" class="card-img card-img-top" 
                        :src="set.image"
                        :title="set.name"
                        itemprop="image" 
                        alt="Card image cap" />
                  <v-lazy-image v-else src="/storage/images/app/no-photo.png" alt="no image" />
                    <div v-if="set.offer" class="card-img-overlay">
                      <span v-if="set.offer" class=" badge bg-focus white-bold"> Oferta! </span>
                    </div>
                </div>
                <div class="card-body">
                    <h5 class="card-title" itemprop="name" style="height:60px"> {{set.title | ucFirst}}  </h5>
                   
                   
                    <a :href="set.slug" style="cursor:pointer" class="btn btn-outline-second  white-bold mb-4 mt-1"> Ver mas</a>
                    <p></p>
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
          centeredSlides: false,
          spaceBetween: 5,
          /* pagination: {
            el: '.swiper-pagination',
            clickable: true
          }, */
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
            this.swiperOption.slidesPerView = 4;
        } else{
            this.swiperOption.slidesPerView = 1.5;
        }
        this.render=true;
    },
    computed:{
        sets(){
          let res =  this.$store.getters['sets/getSets'];
          return res.filter(set => {
            return set.image != undefined;
          });
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


  .badge{
    font-size: 1.2rem;
  }
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
  .card-img-overlay{
    max-height: 60%;
  }
</style>