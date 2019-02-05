<template>
    <div v-if="contact" class="d-flex flex-column bg-white p-4">
        <div>
            {{contact.created_at}} - {{contact.name}}
        </div>
        <div>
            {{contact.mail}} - {{contact.phone}}
        </div>
        <div>
            <p>
                {{contact.message}}
            </p>
        </div>
    </div>
</template>

<script>
export default {
    props:['contact'],

}
</script>
