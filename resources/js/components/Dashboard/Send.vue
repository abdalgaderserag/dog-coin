<template>
    <div>
        <span class="header">Search:</span>
        <br>

        <input type="text" class="card-id" v-on:change="getCardId" ref="search" value=""
               style="margin-left: 5%;font-size: 2.4vh">
        <div>{{ message }}</div>
        <br>


        <div v-if="show">
            <!-- START :: Profile card start -->

            <div class="flex-box profile-card">

                <div class="profile-avatar" style="width: 100%">
                    <a :href="'/profile/' + user.slug ">
                        <img style="height: 80px;width: 80px;border-radius: 50%;margin-left: 25%;"
                             :src="user.avatar" alt="">

                    </a>

                    <div v-if="list" @click="addList" class="add-list">
                        add to list
                    </div>

                </div>


                <div class="text-card" style="padding: 2px 0 4px 4%;">
                    <div class="profile-text">
                        <span class="info-item-head">Name: </span>
                        <div>
                            {{ user.name }}
                        </div>
                    </div>
                    <div class="profile-text">
                        <span class="info-item-head">Email: </span>
                        <div>
                            {{ user.email }}
                        </div>
                    </div>
                    <div class="profile-text">
                        <span class="info-item-head">Card ID: </span>
                        <div>
                            {{ user.money.creditCardNumber }}

                        </div>
                    </div>
                    <div class="profile-text">
                        <span class="info-item-head">Join at: </span>
                        <div>
                            {{ user.created_at }}
                        </div>
                    </div>
                </div>
            </div>

            <span>$ </span><input v-model="money" type="number" class="card-id">
            <input type="submit" @click="sendTransfer" class="send-money" style="width: 34%;margin-left: 24%;"
                   value="Send">

            <span>{{ moneyMessage }}</span>

            <!-- END :: Profile card end -->
        </div>
    </div>
</template>

<script>
    export default {
        name: "Send",
        data() {
            return {
                show: false,
                list: true,
                user: {},
                message: '',
                money: null,
                moneyMessage: '',
                favorite: [],
            }
        },
        mounted() {
            axios.get('/api/favorite')
                .then((response) => {
                    this.favorite = response.data;
                })
        },
        methods: {
            getUser: function (cardId) {
                this.message = "finding...";
                axios.get('/api/user/' + cardId)
                    .then((response) => {
                        this.list = true;
                        this.user = response.data;
                        for (let i = 0; i < this.favorite.length; i++) {
                            if (this.favorite[i].listed_id == response.data.id) {
                                this.list = false;
                            }
                        }
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
            sendTransfer: function () {
                if (this.money != null) {
                    this.money = Number.parseInt(this.money);

                    axios.post('/api/transfer', {
                        'sender_id': this.$root.user.id,
                        'recipient_id': this.user.id,
                        'amount': this.money,
                    })
                        .then((response) => {
                            // this.show = false;
                            // this.user = {};
                            this.message = '';
                            this.money = null;
                            this.moneyMessage = "";

                            // this.$refs.search.value = "";
                        })
                        .catch((error) => {
                            this.moneyMessage = "some thing went wrong try refresh the page :(";
                        });

                } else {
                    this.moneyMessage = "please enter the amount you wont to transfer."
                }
            },
            addList: function () {
                axios.post('/api/favorite', {
                    listed_id: this.user.id,
                }).then(() => {
                    this.list = false;
                    this.favorite[this.favorite.length] = {listed_id: this.user.id};
                });
            }
        }
    }
</script>

<style scoped>
    /*.card-id {*/
    /*width: 60%;*/
    /*padding: 4px 16px;*/
    /*margin-top: 18px;*/
    /*border: 1px solid #e3e7f1;*/
    /*font-size: 2.7vh;*/
    /*border-radius: 18px;*/
    /*}*/


</style>