
require('./bootstrap');

import Vue from 'vue';
import VueRouter from 'vue-router';

Vue.use(VueRouter);

import App from "./components/App";
import ConferenceRooms from "./components/ConferenceRooms";

const router = new VueRouter({
    mode: 'history',
    routes: [
        {
            path: '/',
            name: 'conferenceRooms',
            component: ConferenceRooms
        },
    ],

});

const app = new Vue({
    el: '#app',
    components: { App },
    router
});
