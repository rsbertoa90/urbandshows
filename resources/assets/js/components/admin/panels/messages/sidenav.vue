<template>
    <div>
        <table class="table table-striped">
            <tbody>
                <tr v-for="contact in contacts" :key="contact.id">
                    <td style="cursor:pointer" @click="select(contact)"> {{contact.created_at | datetime}} - {{contact.name}} </td>
                    <td> 
                        <div class="d-flex flex-column">
                            <button class="btn btn-sm btn-outline-danger" @click="destroy(contact)">X</button>
                            <input @change="toggleSaw(contact)" type="checkbox" :checked="contact.saw" class="checkbox mt-2"> 
                        </div>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</template>

<script>
export default {
    props:['contacts'],
    methods:{
        select(contact){
            this.$emit('selected',contact);
        },
        destroy(contact){
            this.$http.post('/admin/contact/delete/'+contact.id)
                .then(res => {
                   this.$emit('reload');
                });
        },
        toggleSaw(contact){
            contact.saw = !contact.saw;
            let data = {
                field:'saw',
                id:contact.id,
                value: contact.saw ? 1 : 0
            };
            this.$http.put('/admin/contact',data)
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
