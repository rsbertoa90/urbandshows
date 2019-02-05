<template>
    <div class="row">
        <div class="col-9">
            <messageCard v-if="selectedContact" 
                        :contact="selectedContact">
            </messageCard>
        </div>
        <div class="col-3">
            <contactSide :contacts="contacts" @selected="selected"></contactSide>
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
        this.$http.get('/api/contacts')
            .then(res => {
                this.contacts = res.data;
                _.sortBy(this.contacts,'created_at');
            });
    },
    methods:{
        selected(event){
            this.selectedContact=event;
        }
    }

}
</script>
