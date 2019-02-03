<template>
   <div class="card h-100" style="width: 18rem;">
    <img class="card-img-top" :src="set.image" :alt="set.title">
    <div class="card-body d-flex flex-column justify-content-between">
        <h5 class="card-title merienda font-weight-bold"> {{set.title |ucFirst}} </h5>
        <p v-if="set.description" class="card-text">{{set.description|ucFirst}}</p>
        <a :href="set.slug" class="btn btn-outline-info text-info">Ver mas</a>
    </div>
</div>
</template>

<script>
export default {
    props:['set']
}
</script>

<style scoped>
.h100{
    height: 100%;
}
    .card-text{
        overflow:hidden;
        text-overflow:ellipsis;
        height: 100px;
    }

    .card{
        min-height: 600px;
    }
</style>
