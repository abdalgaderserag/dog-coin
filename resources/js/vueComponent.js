// Vue.component('statical-view', require("./components/Statical/StaticalView.vue").default);
Vue.component('char', require("./components/Statical/Char.vue").default);

Vue.component('transfer', require("./components/Dashboard/Transfer.vue").default);
Vue.component('send', require("./components/Dashboard/Send.vue").default);

Vue.component('send-request', require("./components/request/Send/SendRequest.vue").default);
Vue.component('send-requests', require("./components/request/Send/SendRequests.vue").default);
Vue.component('recipient-request', require("./components/request/recipient/RecipientRequest").default);
Vue.component('recipient-requests', require("./components/request/recipient/RecipientRequests.vue").default);


Vue.component('authorized-clients', require("./components/passport/AuthorizedClients.vue").default);
Vue.component('clients', require("./components/passport/Clients.vue").default);
Vue.component('personal-access-tokens', require("./components/passport/PersonalAccessTokens.vue").default);
// static