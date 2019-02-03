<template>
    <div>
        <div v-if="future && future.length > 0">
            <table>
                <tbody>
                    <tr v-for="event in future" :key="event.id">
                        <td> {{event.date}} - {{event.time}}</td>
                        <td>  {{event.city.state.name}} / {{event.city.name}} </td>
                        <td> {{event.address}} </td>
                        <td> {{event.set}} </td>
                        <td> {{event.set.details}} </td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div v-else>
            <h2>No hay eventos agendados</h2>
        </div>
    </div>
</template>

<script>
export default {
    data(){
        return{

        }
    },

    computed:{
        events(){
            return this.$store.getters['events/getEvents'];
        },
        future(){
            if (this.events){
                return this.events.filter(ev => {
                    let evdate = new Date(ev.date);
                    let today = new Date();
                    return  evdate > today;
                });
            }
        },
        past(){
            if (this.events){
                return this.events.filter(ev => {
                    let evdate = new Date(ev.date);
                    let today = new Date();
                    return  evdate < today;
                });
            }
        }
    }
}
</script>


