<template>
<div>
    <div style="height:20px ; margin-bottom:20px"></div>
    <div class="header">
        <h2 class="mt60"> 
            UrbanD
            ShowS    
         </h2>
        <br>
    </div>    
</div>
</template>

<script>
export default {
    
}
</script>


<style lang="scss" scoped>
.header{
    position:fixed;
    z-index: 200;
    width: 100vw;
    top:-10px;
    left:-10px;
    padding:10px;
    background-color: #119999;
    color:#fff;
    font-weight: bold;
    font-size: 2rem;
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items:center;
    height: 55px;


}

.mt60{
    margin-top:60px;
}
</style>
