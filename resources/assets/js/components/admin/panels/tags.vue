<template>
    <div>
        <div class="d-flex">

            <div v-for="tag in tags" :key="tag.id">
                {{tag.name}}
            </div>

        </div>
        <div class="mt-4">
            <h4>Nuevo TAG</h4>
            <div class="row mb-2">
                <label class="col-12 col-lg-4" for="">Nombre</label>
                <input class="col-12 col-lg-4 "  type="text" v-model="formData.name">
            </div>
           
            <button class="btn btn-outline-info" @click="saveNew()">Guardar</button>

        </div>
    </div>
</template>

<script>
export default {
    data(){
        return{
            formData:{
                name:'',

            }
        }
    },
    computed:{
        tags(){
            return this.$store.getters['tags/getTags'];
        }
    },
    methods:{
        fetchTags(){
            this.$store.dispatch('tags/fetch');
        },
        saveNew(){
            let data = this.formData;

            this.$http.post('/admin/tags',data)
                .then(response => {
                    this.formData = {
                        name:'',
                    }
                this.fetchTags();

                });
        }

    }
}
</script>
