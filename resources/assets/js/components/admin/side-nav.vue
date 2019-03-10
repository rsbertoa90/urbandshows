<template>
    <div class="d-flex flex-column panel">
        <div v-for="link in links" :key="link.label">
             <div @click="SetAdminComponent(link.component)" class="link"
                    :class="{'selected' : adminComponent == link.component}">
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
                {label:'Postulaciones',component:'postulations-panel'},
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

    .selected{
        background-color: #0000ff99;
    }

    
    
</style>