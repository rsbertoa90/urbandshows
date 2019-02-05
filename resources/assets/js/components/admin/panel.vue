<template>
    <component :is="adminComponent"></component>
</template>

<script>
import setsPanel from './panels/sets.vue';
import metaPanel from './panels/meta.vue';
import contactPanel from './panels/messages.vue';

import eventsPanel from './panels/events.vue';

export default {
    components:{
        setsPanel,
        metaPanel,
        contactPanel,
        eventsPanel,
    
    },
    computed:{
        adminComponent(){
            return this.$store.getters.getAdminComponent;
        }
    }
}
</script>
