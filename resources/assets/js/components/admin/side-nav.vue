<template>
    <div class="d-flex flex-column panel">
        <div v-for="link in links" :key="link.label">
             <div @click="SetAdminComponent(link.component)" class="link">
                 {{ link.label }}
             </div>
        </div>
    </div>
</template>

<script>
export default {
    data(){
        return{
            links:[
                {label:'Eventos',component:'events-panel'},
                {label:'Sets',component:'sets-panel'},
                {label:'Mensajes',component:'contact-panel'},
                {label:'Metadatos',component:'meta-panel'},
                
            ]
        }
    },
    computed:{
        adminComponent(){
            return this.$store.getters.getAdminComponent;
        }
    },
    methods:{
        SetAdminComponent(component)
        {
            this.$store.commit('setAdminComponent',component);
        }
    }
}
</script>


<style lang="scss" scoped>

    .panel{
        background: #fff;
       
    }

    .link{
        padding: 15px;
        font-size: 1.4rem;
        cursor: pointer;
    }

    
    
</style>