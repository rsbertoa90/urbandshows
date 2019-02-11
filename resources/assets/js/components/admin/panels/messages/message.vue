<template>
    <div v-if="contact" class="d-flex flex-column bg-white p-4">
        <div>
            {{contact.created_at | datetime}} - 
            <span v-if="contact.name"> {{contact.name}}</span> 
        </div>
        <hr>
    
        <div class="d-flex flex-column">
             
             <span v-if="contact.mail">Mail:  {{contact.mail}}  </span>  

             <span v-if="contact.phone"> Tel:{{contact.phone}}  </span>  

            <span v-if="contact.city"> Ciudad: {{contact.city.state.name}} - {{contact.city.name}} </span>
            
            <span v-if="contact.set"> Set: {{contact.set.title}} </span>

            <span v-if="contact.date"> Fecha del evento: {{contact.date}} </span>

        </div>
        <hr>
        <div>
            <p>
             Mensaje:   {{contact.message}}
            </p>
        </div>
        <div>
            Comentarios:
            <textarea  @change="update('comments')" v-model.lazy="contact.comments"
                        class="form-control w-100"></textarea>
        </div>
    </div>
</template>

<script>
export default {
    props:['contact'],
    methods:{
        update(field){
           
            let data = {
                field:field,
                id:this.contact.id,
                value: this.contact[field]
            };
            this.$http.put('/admin/contact',data)
                .then(res => {
                    this.$emit('reloadMessages');
                });
        }
    }

}
</script>
