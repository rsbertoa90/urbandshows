<template>
   <div class="row">
       <div class="col-12">
           <img src="/storage/images/app/trabaja-con-nosotros.jpg" alt="trabaja con nosotros">
       </div>
       <div class="col-12 mt-4">
           <p>
               Aprender nuevos repertorios permanentemente es muy divertido, pero puede ser muy exigente.
               Muchas veces es una carrera contra el tiempo, muchas veces no contamos con partes escritas por lo que hay que hacer el trabajo de transcripción, y el producto final a la hora de dar un show no puede ser menos que excelente.
           </p>
           <p>
               A si que, si bien nos encanta que quieras trabajar con nosotros, tenemos algunos requisitos necesarios para estar tranquilos de que podemos trabajar todos juntos al mismo ritmo, y disfrutar a la hora de entregar un show.
           </p>

           <p>
               <b>Que necesitamos de vos:</b>
               <br>
               <ul class="offset-2">
                   <li> 
                       <i class="fas fa-pen"></i> 
                       Saber leer y escribir música </li>
                   <li> 
                       <i class="fas fa-music"></i> 
                       Entender de armonía y rítmica 
                    </li>
                   <li> 
                       <i class="fas fa-assistive-listening-systems"></i> 
                       Tener un buen nivel de audio perceptiva  
                    </li>
                   <li> 
                       <i class="fas fa-glasses"></i>
                       Ser responsable y puntual
                    </li>
                    <li>
                         <i class="fas fa-wrench"></i>
                        Tener ganas de trabajar
                    </li>
                    
               </ul>
           </p>
            <h4>¿Todavía queres trabajar con nosotros?</h4>
            <h4>Dejanos tus datos:</h4>

            <work-form></work-form>

         


       </div>
   </div>
</template>

<script>
import workForm from './form.vue';
export default {
    components:{workForm}
}
</script>
