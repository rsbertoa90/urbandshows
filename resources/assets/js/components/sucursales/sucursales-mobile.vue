<template>
    <div>
        <div id="accordion">
            <!-- pasteur -->
            <div class="card">
                <div class="card-header" id="headingOne">
                <h5 class="mb-0">
                    <button class="btn btn-link" data-toggle="collapse"
                             data-target="#sucursal1" aria-expanded="true" aria-controls="collapseOne">
                    Mates Fabi Pasteur
                    </button>
                </h5>
                </div>

                <div id="sucursal1" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
                    <div class="card-body row">
                       <col-12>
                            <iframe width="100%" height="250" 
                                    src="https://maps.google.com/maps?width=100%&amp;height=200&amp;hl=en&amp;coord=-34.604274628571,-58.399603253061&amp;q=pasteur%20428%2C%20CABA+(Mates%20Fabi)&amp;ie=UTF8&amp;t=&amp;z=14&amp;iwloc=B&amp;output=embed" 
                                    frameborder="0" scrolling="no" 
                                    marginheight="0" marginwidth="0">
                                    <a href="https://www.maps.ie/create-google-map/">Google map generator</a>
                            </iframe>
                       </col-12>
                       <col-12>
                            Dirección: Pasteur 428
                            Horario de Atención: Lunes a viernes de 9 a 18 hs
                            Teléfono: 4951-5417
                            Esta sucursal se encuentra a metros de Avenida Corrientes y de la estación Pasteur del subte B.
                       </col-12>
                    </div>
                </div>
            </div>
            <!-- Castelli -->
            <div class="card">
                <div class="card-header" id="headingTwo">
                <h5 class="mb-0">
                    <button class="btn btn-link" data-toggle="collapse"
                             data-target="#sucursal2" aria-expanded="true" aria-controls="collapseOne">
                    Mates Fabi Castelli
                    </button>
                </h5>
                </div>

                <div id="sucursal2" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
                    <div class="card-body row">
                       <col-12>
                            <iframe width="100%" height="250" src="https://maps.google.com/maps?width=100%&amp;height=200&amp;hl=en&amp;coord=-34.606197869388,-58.398923226531&amp;q=Sarmiento%202268%2C%20CABA+(Mates%20Fabi)&amp;ie=UTF8&amp;t=&amp;z=14&amp;iwloc=B&amp;output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"><a href="https://www.maps.ie/create-google-map/">Create Google Map</a></iframe>
                
                       </col-12>
                       <col-12>
                            Lorem, ipsum dolor sit amet consectetur adipisicing elit. Quasi, temporibus! Totam accusantium quos cupiditate, eum libero modi explicabo. Vitae corrupti laborum tenetur id voluptas libero iste perferendis culpa modi rerum!
                       </col-12>
                    </div>
                </div>
            </div>
            <!-- Sarmiento -->
            <div class="card">
                <div class="card-header" id="headingTree">
                <h5 class="mb-0">
                    <button class="btn btn-link" data-toggle="collapse"
                             data-target="#sucursal3" aria-expanded="true" aria-controls="collapseOne">
                    Mates Fabi Sarmiento
                    </button>
                </h5>
                </div>

                <div id="sucursal3" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
                    <div class="card-body row">
                       <col-12>
                             <iframe width="100%" height="250" src="https://maps.google.com/maps?width=100%&amp;height=250&amp;hl=en&amp;coord=-34.607568055102,-58.404725091837&amp;q=Sarmiento%202268%2C%20CABA+(Mates%20Fabi)&amp;ie=UTF8&amp;t=&amp;z=14&amp;iwloc=B&amp;output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"><a href="https://www.maps.ie/create-google-map/">Embed Google Map</a></iframe>
              
                       </col-12>
                       <col-12>
                            Lorem, ipsum dolor sit amet consectetur adipisicing elit. Quasi, temporibus! Totam accusantium quos cupiditate, eum libero modi explicabo. Vitae corrupti laborum tenetur id voluptas libero iste perferendis culpa modi rerum!
                       </col-12>
                    </div>
                </div>
            </div>
          
            
        </div>
    </div>
</template>



<style scoped lang="scss">
// violeta oscuro es b2037a
$color-first : #b2037a;

// El verde es 09cca2 
$color-second : #09cca2;

// Rosa fuerte es ff0aaf
$color-focus: #ff0aaf; 

// Rosa claro es ff97dd
$color-back: #ff97dd;


    .btn-link{
        display: block;
        width: 100%;
        height: 100%;
        background-color: $color-focus;
        color: #fff;
        font-weight: bold;
        &:hover{
            cursor: pointer;
            text-decoration: none;
            
        }
    }
</style>
