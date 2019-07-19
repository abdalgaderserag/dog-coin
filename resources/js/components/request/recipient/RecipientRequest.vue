<template>
    <div>
        <div style="margin-top: 32px" class="header">Requests:</div>
        <div v-for="request in requests">
            <requests :request="request"></requests>
        </div>
    </div>
</template>

<script>
    export default {
        name: "RecipientRequest",
        data() {
            return {
                requests: [],
                displayMore: false,
                page: 2,
            }
        }, mounted() {
            axios.get('/api/request/recipient')
                .then((response) => {
                    this.requests = response.data[0];
                    if (response.data[0]) {
                        this.displayMore = false;
                    } else {
                        this.displayMore = true;
                    }
                })
        }
    }
</script>

<style scoped>

</style>