<template>
    <div>
        <div class="card">
            <div class="card-header">
                <div class="card-header-image">
                    <div class="card-img-container">
                        <v-lazy-image v-if="set.image" :src="set.image"></v-lazy-image>
                        <v-lazy-image v-else src="/storage/images/app/no-image.png"></v-lazy-image>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <h4> {{set.title | ucFirst}} </h4>
                <p> {{set.description}} </p>
 
                
               <!--  <ul>
                    <li v-for="song in set.songs" :key="song.id">
                       <a v-if="song.sample" :href="song.sample" rel="noreferrer">
                            {{song.name}}
                       </a>
                       <span v-if="!song.sample">
                           {{song.name}}
                       </span>
                    </li>
                </ul> -->
                <span>
                    <span class="fa fa-star"></span>
                    {{set.songs.length}} canciones
                </span>

            </div>
            <slot></slot>
        </div>
    </div>
</template>

<script>
export default {
    props:['set']
}
</script>

<style scoped lang="scss">
    
    .card{
        height: 100%;
    }
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

    .card-img-container{
        height: 300px;
        display: flex;
        flex-direction: column;
        justify-content: center;
        overflow: hidden;
        background-color: #000;
    }
</style>

