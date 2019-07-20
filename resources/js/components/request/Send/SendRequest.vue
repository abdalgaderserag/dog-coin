<template>
    <div>
        <div class="header">Normal request:</div>
        <div class="card request-position" style="padding: 1%;margin-bottom: 7%;">
            <div>
                <div class="transfer-img">
                    <input v-model="cardId" type="text" class="card-id" placeholder="enter card ID"
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
                <input @click="request()" type="button" value="Send" class="card-id"
                       style="width: 91%;background-color: aliceblue;margin-bottom: 18px;">
            </div>
        </div>


        <div style="margin-top: 32px" class="header">All Requests:</div>

        <div v-for="(request, index) in users">
            <send-requests :request="request" :index="index"></send-requests>
        </div>


        <div v-if="displayMore" style="text-align: center;cursor: pointer;" @click="getRequest">
            view more transfers ...
        </div>
    </div>
</template>

<script>
    export default {
        name: "SendRequest",
        data() {
            return {
                cardId: '',
                amount: '',
                details: '',
                show: false,
                message: '',
                method: 'post',
                id: '',
                editNumber: 0,
                user: {},
                users: [],
                displayMore: true,
                page: 2,
            }
        },
        mounted() {
            axios.get('/api/request')
                .then((response) => {
                    this.users = response.data[0];
                    if (response.data[1] == true)
                        this.displayMore = false;
                })
        },
        methods: {
            request: function () {
                if (this.method == 'post')
                    this.sendRequest();
                else if (this.method == 'put')
                    this.putRequest();
            },
            getUser: function (cardId) {
                this.message = "finding...";
                axios.get('/api/user/' + cardId)
                    .then((response) => {
                        this.method = 'post';
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
                axios.post('/api/request', {
                    recipient_id: this.user.id,
                    money: this.amount,
                    details: this.details,
                })
                    .then((response) => {
                        this.cardId = '';
                        this.amount = '';
                        this.details = '';
                        this.show = false;
                        this.users.add(response.data);
                    })
            },
            editRequest: function (req, id) {
                this.editNumber = id;
                this.show = true;
                this.method = 'put';
                let number = document.getElementsByClassName('request-position')[0].offsetTop;
                this.id = req.id;
                window.scrollTo(0, number);
                this.user = req.recipient;
                this.amount = req.money;
                this.details = req.details;
            },
            putRequest: function () {
                axios.put('/api/request/' + this.id, {
                    money: this.amount,
                    details: this.details,
                })
                    .then((response) => {
                        this.cardId = '';
                        this.users[this.editNumber].money = this.amount;
                        this.users[this.editNumber].details = this.details;
                        this.amount = '';
                        this.details = '';
                        this.show = false;
                        this.method = 'post';
                    })
            },
            getRequest: function () {
                let url = '/api/request?page=' + this.page;
                axios.get(url)
                    .then((response) => {
                        for (let i = 0; i < response.data[2]; i++) {
                            this.users.push(response.data[0][this.users.length]);
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