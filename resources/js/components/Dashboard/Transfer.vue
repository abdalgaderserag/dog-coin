<template>
    <div>
        <div v-for="(transfer,index) in transfers">
            <div class="transfer">
                <div class="transfer-item">
                    <div v-if="index === 0" class="transfer-image">
                        <img :src="transfer.sender.avatar" alt="">
                        <img class="avatar-length" :src="transfer.recipient.avatar" alt="">
                    </div>
                    <div v-else class="transfer-image">
                        <img :src="transfer.sender.avatar" alt="">
                        <img class="second-avatar" :src="transfer.recipient.avatar" alt="">
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
            <hr class="line">
        </div>

    </div>
</template>

<script>
    export default {
        name: "Transfer",
        data() {
            return {
                transfers: [],
            }
        },
        mounted() {
            axios.get('api/transfer')
                .then((response) => {
                    this.transfers = response.data;
                });
            // console.log(images);
            // for (let i = 0; i < images.length; i++) {
            // if ((i + 1)% 2 == 0) {
            console.log(image)
            // }
            // }
        }
    }
</script>