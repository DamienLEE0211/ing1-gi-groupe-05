// Import Vue Router and the components
import Vue from 'vue';
import VueRouter from 'vue-router';
import FooterUser from '../components/FooterUser.vue';
import HeaderUser from '../components/HeaderUser.vue';
import MidUser from '../components/MidUser.vue';
import P1Capitaine from '../components/P1Capitaine.vue';
import P1Participant from '../components/P1Participant.vue';
import Q1mid from '../components/Q1mid.vue';
import U1MidBot from '../components/U1MidBot.vue';
import U1MidTop from '../components/U1MidTop.vue';

// Use Vue Router plugin
Vue.use(VueRouter);

// Create routes
const routes = [
    { path: '/', component: MidUser },
    { path: '/header', component: HeaderUser },
    { path: '/footer', component: FooterUser },
    { path: '/p1capitaine', component: P1Capitaine },
    { path: '/p1participant', component: P1Participant },
    { path: '/q1mid', component: Q1mid },
    { path: '/u1midbot', component: U1MidBot },
    { path: '/u1midtop', component: U1MidTop },
];

// Create the router instance
const router = new VueRouter({
    mode: 'history',
    routes,
});

// Export the router instance
export default router;
