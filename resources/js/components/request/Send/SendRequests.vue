<template>
    <div class="flex-box"
         style="padding-bottom: 10px;border-bottom: 1px solid gray;margin-top: 10px">
        <div style="margin-right: 2%">
            <a :href="'/profile/' + request.recipient.slug">
                <img :src="request.recipient.avatar" style="width: 80px;border-radius: 50%;" alt="">
            </a>
        </div>
        <div class="flex-box" style="width: 80%;flex-direction: column">
            <div>{{ request.recipient.name }}</div>
            <div>${{ request.money }}</div>
            <div style="width: 100%">{{ request.details }}</div>
            <div style="height: 34px;margin-top: 6px">
                <button @click="$parent.editRequest(request , index)" style="border: 1px solid #e3e7f1;padding: 4px 4%;">Edit
                </button>
                <button @click="deleteRequest(request.id)"
                        style="border: 1px solid #e3e7f1;padding: 4px 4%;background-color: #0067ff;color: white;">
                    Delete
                </button>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "SendRequests",
        props: {
            request: {
                type: Object,
                required: true,
            },
            index: {
                type: Number,
                required: true,
            }
        },
        methods: {
            deleteRequest: function () {
                axios.delete('/api/request/' + this.request.id)
                    .then((response) => {
                        this.$parent.remove(this.index);
                    })
            },
        }
    }
</script>

<style scoped>

</style>