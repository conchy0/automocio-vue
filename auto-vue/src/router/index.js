import { createRouter, createWebHistory } from 'vue-router';
import Home from '../views/HomeView.vue';
import Agenda from '../views/AgendaView.vue';
import Hackato from '../views/Hackato.vue';
import Actualitat from '../views/Actualitat.vue';
import Lloc from '../views/Lloc.vue';


const routes = [
    { path: '/', name: 'Home', component: Home },
    { path: '/agenda', name: 'Agenda', component: Agenda },
    { path: '/hackato', name: 'Hackato', component: Hackato },
    { path: '/actualitat', name: 'Actualitat', component: Actualitat },
    { path: '/lloc', name: 'Lloc', component: Lloc },
];


const router = createRouter({
    history: createWebHistory(),
    routes,
});

export default router;