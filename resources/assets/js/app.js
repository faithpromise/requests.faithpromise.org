import Vue from 'vue';
import axios from 'axios';
import router from './routes';

Vue.config.productionTip = false;
Vue.prototype.$http      = axios;

new Vue({
    router,
    el: '#app',
});