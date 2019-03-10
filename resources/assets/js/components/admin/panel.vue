<template>
    <component :is="adminComponent"></component>
</template>

<script>
import setsPanel from './panels/sets.vue';
import metaPanel from './panels/meta.vue';
import contactPanel from './panels/messages.vue';
import postulationsPanel from './panels/postulations.vue';

import eventsPanel from './panels/events.vue';

export default {
    components:{
        setsPanel,
        metaPanel,
        contactPanel,
        postulationsPanel,
        eventsPanel,
    
    },
    computed:{
        adminComponent(){
            return this.$store.getters.getAdminComponent;
        }
    }
}
</script>
