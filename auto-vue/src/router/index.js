import { createRouter, createWebHistory } from 'vue-router';
import Home from '../views/HomeView.vue';
import Agenda from '../views/AgendaView.vue';
import Hackato from '../views/Hackato.vue';
import Actualitat from '../views/Actualitat.vue';
import Lloc from '../views/Lloc.vue';
import login from '../views/Login.vue';
import register from '../views/Register.vue';
import usuari from '../views/Usuaris.vue';


const routes = [
    { path: '/', name: 'Home', component: Home },
    { path: '/agenda', name: 'Agenda', component: Agenda },
    { path: '/hackato', name: 'Hackato', component: Hackato },
    { path: '/actualitat', name: 'Actualitat', component: Actualitat },
    { path: '/lloc', name: 'Lloc', component: Lloc },
    { path: '/login', name: 'Login', component: login },
    { path: '/register', name: 'Register', component: register },
    { path: '/usuari', name: 'Usuari', component: usuari },
];


const router = createRouter({
    history: createWebHistory(),
    routes,
});

export default router;