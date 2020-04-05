<template>
    <div>
        <div v-if="transfers.length != 0" v-for="(transfer,index) in transfers">
            <div class="transfer">
                <div class="transfer-item">
                    <div v-if="index === 0" class="transfer-image">
                        <a :href="'/profile/' + transfer.sender.slug">
                            <img :src="transfer.sender.avatar" alt="">
                        </a>
                        <a :href="'/profile/' + transfer.recipient.slug">
                            <img class="avatar-length" :src="transfer.recipient.avatar" alt="">
                        </a>
                    </div>
                    <div v-else class="transfer-image">
                        <a :href="'/profile/' + transfer.sender.slug">
                            <img :src="transfer.sender.avatar" alt="">
                        </a>
                        <a :href="'/profile/' + transfer.recipient.slug">
                            <img class="second-avatar" :src="transfer.recipient.avatar" alt="">
                        </a>
                    </div>
                    <div class="transfer-text flex-box">
                        <span>{{ transfer.sender.name }}</span>
                        <span>&bkarow;</span>
                        <span>{{ transfer.recipient.name }}</span>
                        <span>{{ '$' + transfer.amount }}</span>
                        <span>{{ transfer.created_at.slice(0,10) }}</span>
                    </div>
                </div>
            </div>
            <hr class="line transfer-line">
        </div>
        <div>
            sadly there nno transfers for now.
        </div>
        <div v-if="displayMore" style="text-align: center;cursor: pointer;" @click="getTransfer">view more transfers
            ...
        </div>

    </div>
</template>

<script>
    export default {
        name: "Transfer",
        data() {
            return {
                transfers: [],
                displayMore: false,
                page: 2,
            }
        },
        mounted() {
            axios.get('/api/transfer')
                .then((response) => {
                    this.transfers = response.data[0];
                    if (response.data[1] == true) {
                        this.displayMore = false;
                    } else {
                        this.displayMore = true;
                    }
                });
        },
        methods: {
            getTransfer: function () {
                let url = '/api/transfer?page=' + this.page;
                axios.get(url)
                    .then((response) => {
                        for (let i = 0; i < response.data[2]; i++) {
                            // this.transfers[this.transfers.length] = response.data[i];
                            this.transfers.push(response.data[0][this.transfers.length]);
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