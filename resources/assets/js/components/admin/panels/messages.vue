<template>
    <div class="row">
        <div class="col-12 row" v-if="contacts && contacts.length > 0">
            <div class="col-9">
                <messageCard v-if="selectedContact" 
                            :contact="selectedContact">
                </messageCard>
            </div>
            <div class="col-3">
                <contactSide :contacts="contacts" @selected="selected" @reloadMessages="reload"></contactSide>
            </div>

        </div>
        <div v-else class="col-12">
            <h3>No hay mensajes</h3>
        </div>
    </div>
</template>

<script>
import contactSide from './messages/sidenav.vue';
import messageCard from './messages/message.vue';
export default {
    components:{contactSide,messageCard},
    data(){
        return{
            contacts:null,
            selectedContact:null
        }
    },
    created(){
        this.reload();
    },
    methods:{
        reload(){
              this.$http.get('/api/contacts')
            .then(res => {
                this.contacts = res.data;
               
            });
        },
        selected(event){
            this.selectedContact=event;
        }
    }

}
</script>
