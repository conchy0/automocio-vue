import { createRouter, createWebHistory } from 'vue-router';
import HomeView from '../views/HomeView.vue';
import AgendaView from '../views/AgendaView.vue';
import Hackato from '../views/Hackato.vue';
import Actualitat from '../views/Actualitat.vue';
import Lloc from '../views/Lloc.vue';

const routes = [
    { path: '/', name: 'Home', component: HomeView },
    { path: '/agenda', name: 'Agenda', component: AgendaView },
    { path: '/hackato', name: 'Hackato', component: Hackato },
    { path: '/actualitat', name: 'Actualitat', component: Actualitat },
    { path: '/lloc', name: 'Lloc', component: Lloc },
];

const router = createRouter({
    history: createWebHistory(),
    routes,
});

export default router;