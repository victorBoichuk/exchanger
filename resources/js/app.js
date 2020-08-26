/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

Vue.component('exchangerates', require('./components/CurrenciesRate.vue').default);
Vue.component('currencies-exchange', require('./components/Exchange.vue').default);
Vue.component('currencies-payment', require('./components/Payment.vue').default);
Vue.component('currencies-cashin', require('./components/cashin.vue').default);

const app = new Vue({
  el:'#app'
});
