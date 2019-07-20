<template>
    <div>
        <div style="margin-top: 32px" class="header">All Recivied Requests:</div>
        <div class="request-list" v-for="request in requests">
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
                    if (response.data[0] != true) {
                        this.displayMore = false;
                    } else {
                        this.displayMore = true;
                    }
                })
        }, methods: {
            getRequest: function () {
                let url = '/api/request/recipient?page=' + this.page;
                axios.get(url)
                    .then((response) => {
                        for (let i = 0; i < response.data[2]; i++) {
                            this.requests.push(response.data[0][this.requests.length]);
                        }

                        if (response.data[1] == true) {
                            this.displayMore = false;
                        }
                        this.page = this.page + 1;
                    });
            }
        }
    }
</script>

<style scoped>

</style>