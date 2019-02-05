<template>
    <div>
        <table class="table table-striped">
            <tr v-for="contact in contacts" :key="contact.id">
                <td style="cursor:pointer" @click="select(contact)"> {{contact.created_at}} - {{contact.name}} </td>
            </tr>
        </table>
    </div>
</template>

<script>
export default {
    props:['contacts'],
    methods:{
        select(contact){
            this.$emit('selected',contact);
        }
    }
}
</script>
