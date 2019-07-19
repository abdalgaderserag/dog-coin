<template>
    <div>
        <div class="transfer">
            <div class="transfer-item">
                <div class="transfer-image">
                    <img class="second-avatar" :src="request.user.avatar" style="position: unset;"
                         alt="">
                </div>
                <div class="transfer-text flex-box" style="justify-content: space-between;padding-left: 1%">
                    <div>
                        <span>{{ request.user.name }}</span>
                        <span style="color: #0067ff">${{ request.money }}</span>
                    </div>
                    <div>
                        {{ request.details }}
                    </div>
                    <div class="flex-box" style="width: 20%">
                        <input type="submit" value="deny" @click="denyRequest" class="card">
                        <input type="submit" value="accept" @click="acceptRequest" class="card">
                    </div>
                </div>
            </div>
        </div>
        <hr class="line">
    </div>
</template>

<script>
    export default {
        name: "requests",
        props: {
            request: {
                type: Object,
                required: true,
            }
        },
        methods: {
            denyRequest: function () {
                axios.delete('/api/request/' + this.request.id)
                    .then((response) => {
                        this.$el.innerHTML = "";
                        this.$el.outerHTML = "";
                    })
            },
            acceptRequest: function () {
                axios.delete('/api/request/' + this.request.id + '?accept=1')
                    .then((response) => {
                        this.$el.innerHTML = "";
                        this.$el.outerHTML = "";
                    })
            }
        }
    }
</script>

<style scoped>

</style>