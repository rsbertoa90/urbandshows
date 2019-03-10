<template>
    <div>
        <table class="table table-striped">
            <tbody>
                <tr v-for="postulation in postulations" :key="postulation.id">
                    <td style="cursor:pointer" @click="select(postulation)"> {{postulation.created_at | datetime}} - {{postulation.name}} </td>
                    <td> 
                        <div class="d-flex flex-column">
                            <button class="btn btn-sm btn-outline-danger" @click="destroy(postulation)">X</button>
                            <input @change="toggleSaw(postulation)" type="checkbox" :checked="postulation.saw" class="checkbox mt-2"> 
                        </div>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</template>

<script>
export default {
    props:['postulations'],
    methods:{
        select(postulation){
            this.$emit('selected',postulation);
        },
        destroy(postulation){
            this.$http.post('/admin/postulation/delete/'+postulation.id)
                .then(res => {
                   this.$emit('reload');
                });
        },
        toggleSaw(postulation){
            postulation.saw = !postulation.saw;
            let data = {
                field:'saw',
                id:postulation.id,
                value: postulation.saw ? 1 : 0
            };
            this.$http.put('/admin/postulation',data)
                .then(res => {
                    this.$emit('reloadMessages');
                });
        }
    }
}
</script>


<style lang="scss" scoped>
    .checkbox{
        display: block;
        width:30px;
        height: 30px;
    }
</style>
