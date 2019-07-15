<template>
    <div>
        <span class="header">Search:</span>
        <br>

        <input type="text" class="card-id" v-on:change="getCardId" value="" style="margin-left: 5%;font-size: 2.4vh">
        <div>{{ message }}</div>
        <br><br><br>
        <!-- <span style="padding:0 0 0 12px">Find &ctdot;</span> -->


        <div v-if="show">
            <!-- START :: Profile card start -->

            <div class="flex-box profile-card">

                <div class="profile-avatar" style="width: 100%">
                    <a :href="'/profile/' + user.id ">
                        <img style="height: 80px;width: 80px;border-radius: 50%;margin-left: 25%;"
                             :src="user.avatar" alt="">
                    </a>
                </div>


                <div class="text-card">
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
                            <!--{{ user.money.creditCardNumber }}-->

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

            <span>$ </span><input type="number" class="card-id">
            <input type="submit" class="send-money" style="width: 34%;margin-left: 24%;" value="Send">

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
                user: {},
                message: '',
            }
        },
        methods: {
            getUser: function (cardId) {
                this.message = "finding...";
                axios.get('api/user/' + cardId)
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
                }else {
                    this.message = 'card number must be Number 16 length Only.';
                }
            }
        }
    }
</script>

<style scoped>

</style>