<template>
    <component :is="adminComponent"></component>
</template>

<script>
import setsPanel from './panels/sets.vue';
import metaPanel from './panels/meta.vue';
import songsPanel from './panels/songs.vue';
import eventsPanel from './panels/events.vue';
import tagsPanel from './panels/tags.vue';
export default {
    components:{
        setsPanel,
        metaPanel,
        songsPanel,
        eventsPanel,
        tagsPanel
    },
    computed:{
        adminComponent(){
            return this.$store.getters.getAdminComponent;
        }
    }
}
</script>
