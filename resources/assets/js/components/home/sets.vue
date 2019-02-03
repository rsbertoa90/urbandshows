<template>
<div class="container">
    <div class="row">
        <div class="col-4 h-100" v-for="set in setswithimages" :key="set.id">
            <set-card class="h-100" :set="set"></set-card>
        </div>
    </div>
</div>
</template>

<script>
import setCard from './set-card.vue';
export default {
    components:{
        setCard
    },

    computed:{
        sets(){
            return this.$store.getters['sets/getSets'];
        },
        setswithimages(){
            if(this.sets){
                return this.sets.filter(s => {
                    return s.image != null;
                });
            }
        }
    }
}
</script>

<style lang="scss" scoped>
    .h-100{
        height: 100%;
    }
</style>
