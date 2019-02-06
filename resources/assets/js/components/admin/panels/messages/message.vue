<template>
    <div v-if="contact" class="d-flex flex-column bg-white p-4">
        <div>
            {{contact.created_at | datetime}} - {{contact.name}}
        </div>
        <hr>
        <div>
          Mail:  {{contact.mail}} /  Tel:{{contact.phone}}
        </div>
        <hr>
        <div>
            <p>
                {{contact.message}}
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
