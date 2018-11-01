<template>
    <div class="modal fade" id="image-modal" tabindex="-1" role="dialog">
   <div class="modal-dialog" role="document">
    <div  v-if="product" class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title"> {{product.name |ucFirst}} </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          
          <form enctype="multipart/form-data" name="uploader" >
           <b-carousel  
                        :controls="product.images.length > 1"
                        id="carousel"
                        background="#ababab"
                        :interval="4000"
                        img-width="600"
                        >
                  
                  <b-carousel-slide v-if="product.images.length > 0" 
                          v-for="img in product.images" 
                          :key="img.id"
                          :img-src="img.url">
                       
                  </b-carousel-slide>
                  <b-carousel-slide v-else
                                    img-src="/storage/images/app/no-image.png">
                       
                  </b-carousel-slide>


           </b-carousel>
           
          </form>
       
      </div>
     
    </div>
  </div>
</div>
</template>

<script>
    export default {
        props: ['product'],
        data: function(){
            return {
               file : null,
            }
        },
}
</script>

<style scoped lang="scss">
  .carousel-control-prev-icon,
.carousel-control-next-icon {
  height: 100px;
  width: 100px;
  outline: black;
  background-size: 100%, 100%;
  border-radius: 50%;
  border: 1px solid black;
  background-image: none;
}

.carousel-control-next-icon:after
{
  content: '>';
  font-size: 55px;
  color: red;
}

.carousel-control-prev-icon:after {
  content: '<';
  font-size: 55px;
  color: red;
}
</style>
