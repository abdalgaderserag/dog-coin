<template>
    <div>
        <div style="margin-top: 32px" class="header">Requests:</div>
        <div v-for="request in requests">
            <recipient-requests :request="request"></recipient-requests>
        </div>


        <div v-if="displayMore" style="text-align: center;cursor: pointer;" @click="getRequest">
            view more transfers ...
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