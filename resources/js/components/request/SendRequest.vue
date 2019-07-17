<template>
    <div>
        <div class="header">Normal request:</div>
        <div class="card" style="padding: 1%;margin-bottom: 7%;">
            <div>
                <div class="transfer-img">
                    <input type="text" class="card-id" placeholder="enter card ID"
                           style="margin-left: 18%;background-color: #f4f5ff;" @change="getCardId">
                    <div style="text-align: center;color: red">{{ message }}</div>
                    <div style="text-align: center;">or</div>
                    <select name="gadora" class="card-id select-input"
                            style="margin: 4px 0 18px 18%;background-color: #f4f5ff;">
                        <option>
                            <img src="/images/profile/default.jpeg" width="30px" height="30px" alt="">
                            <span>mohamed</span>
                        </option>
                    </select>
                </div>
            </div>
        </div>

        <div v-if="show" style="margin-bottom: 7%;">
            <div class="header" style="margin-bottom: 32px;">Send to {{ user.name }}:</div>
            <img :src="user.avatar" class="recipient-avatar"
                 style="width: 80px;height: 80px;border-radius: 50%;float: left;" alt="">
            <div class="card" style="width: 88%;margin-left: 12%;">
                <input v-model="amount" type="number" placeholder="enter the amount of money" class="card-id"
                       style="width: 86%;">
                <textarea v-model="details"
                          :placeholder="'explanation tell ' + user.name + ' why you send the request.'" id="" cols="30"
                          rows="10"
                          class="card-id" style="width: 86%;">

                    </textarea>
                <input @click="sendRequest()" type="button" value="Send" class="card-id"
                       style="width: 91%;background-color: aliceblue;margin-bottom: 18px;">
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "SendRequest",
        data() {
            return {
                amount: '',
                details: '',
                show: false,
                message: '',
                user: {},
            }
        }, methods: {
            getUser: function (cardId) {
                this.message = "finding...";
                axios.get('/api/user/' + cardId)
                    .then((response) => {
                        this.user = response.data;
                        this.message = '';
                        this.show = true;
                    })
                    .catch((error) => {
                        this.message = 'the number you entered not matched any of our records.';
                    });
            },
            getCardId: function (e) {
                let number = e.target.value;
                if (number.length === 16) {
                    this.getUser(number);
                } else {
                    this.message = 'card number must be Number 16 length Only.';
                }
            },
            sendRequest: function () {
                axios.post()
                    .then((response)=>{
                        this.amount = '';
                        this.details = '';
                        this.show = false;
                    })
            }
        }
    }
</script>

<style scoped>

</style>