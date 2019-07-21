<template>
    <div>
        <div class="flex-box" style="padding-bottom: 10px;border-bottom: 1px solid gray;margin-top: 10px">
            <div style="margin-right: 2%">
                <a :href="'/profile/' + request.user.slug">
                    <img :src="request.user.avatar" style="width: 80px;border-radius: 50%;" alt="">
                </a>
            </div>
            <div class="flex-box" style="width: 80%;flex-direction: column">
                <div>{{ request.user.name }}</div>
                <div>${{ request.money }}</div>
                <div style="width: 100%">{{ request.details }}</div>
                <div style="height: 34px;margin-top: 6px">
                    <button @click="denyRequest" style="border: 1px solid #e3e7f1;padding: 4px 4%;">Deny
                    </button>
                    <button @click="acceptRequest"
                            style="border: 1px solid #e3e7f1;padding: 4px 4%;background-color: #0067ff;color: white;">
                        Accept
                    </button>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "RecipientRequests",
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
                        this.$root.money -= this.request.money;
                    })
            }
        }
    }
</script>

<style scoped>

</style>