<template>
    <div v-if="postulation" class="d-flex flex-column bg-white p-4">
        <div>
            {{postulation.created_at | datetime}} - 
        </div>
        <hr>
    
        <div class="d-flex flex-column">
             
             <span v-if="postulation.name">Nombre:  {{postulation.name}}  </span>  
             
             <span v-if="postulation.age">Edad:  {{postulation.age}}  </span>  
            
             <span v-if="postulation.instrument">Instrumento:  {{postulation.instrument}}  </span>  
            
             <span v-if="postulation.mail">Mail:  {{postulation.mail}}  </span>  

             <span v-if="postulation.phone"> Tel:{{postulation.phone}}  </span>    

            <span v-if="postulation.site"> {{postulation.site}} </span>
            
            

        </div>
        <hr>
        <div>
            <p>
             Mensaje:   {{postulation.text}}
            </p>
        </div>
        <div>
            Comentarios:
            <textarea  @change="update('comments')" v-model.lazy="postulation.comments"
                        class="form-control w-100"></textarea>
        </div>
    </div>
</template>

<script>
export default {
    props:['postulation'],
    methods:{
        update(field){
           
            let data = {
                field:field,
                id:this.postulation.id,
                value: this.postulation[field]
            };
            this.$http.put('/admin/postulation',data)
                .then(res => {
                    this.$emit('reloadMessages');
                });
        }
    }

}
</script>
