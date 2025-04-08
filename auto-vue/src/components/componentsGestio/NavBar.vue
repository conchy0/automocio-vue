<template>
    <nav class="navbar">
        <div class="nav-section">
            <div class="logo-container">
                <img src="/logo.png" alt="Logo" class="logo">
            </div>

            <ul class="nav-links" :class="{ 'nav-active': isMenuOpen }">
                <li><a href="/" @click.prevent="navigateTo('/')"><i class="pi pi-home"></i> Inici</a></li>
                <li><a href="/agenda" @click.prevent="navigateTo('/agenda')"><i class="pi pi-calendar"></i> Agenda</a></li>
                <li><a href="/hackato" @click.prevent="navigateTo('/hackato')"><i class="pi pi-users"></i> Hackato</a></li>
                <li><a href="/actualitat" @click.prevent="navigateTo('/actualitat')"><i class="pi pi-info-circle"></i> Actualitat</a></li>
                <li><a href="/lloc" @click.prevent="navigateTo('/lloc')"><i class="pi pi-map-marker"></i> Lloc</a></li>
                <template v-if="usuari && usuari.rol === 'administrador'">
                    <li>
                        <a href="/admin" @click.prevent="navigateTo('/admin')"><i class="pi pi-cog"></i> Administració</a>
                    </li>
                </template>
            </ul>
        </div>
        <div class="nav-section">
            <template v-if="usuari">
                <div class="user-info">
                    <span class="user-name">{{ usuari.nom_usuari }}</span>
                    <button class="logout-button" @click="logout">✖</button>
                </div>
            </template>
            <template v-else>
                <button class="desktop-login" @click.prevent="navigateTo('/login')">Iniciar Sessió</button>
            </template>
            <button class="hamburger" @click="toggleMenu">
                ☰
            </button>
        </div>
    </nav>
</template>

<script setup>
import { ref, computed } from 'vue';
import { useRouter } from 'vue-router';
import { eventBus } from '../../eventBus';

const router = useRouter();
const isMenuOpen = ref(false);


const usuari = computed(() => eventBus.user);

const navigateTo = (path) => {
    isMenuOpen.value = false;
    router.push(path);
};

const toggleMenu = () => {
    isMenuOpen.value = !isMenuOpen.value;
};

const logout = () => {
    sessionStorage.removeItem('token');
    eventBus.clearUser();
    router.push('/login');
};
</script>

<style scoped>
.navbar {
    display: flex;
    align-items: center;
    justify-content: space-between;
    background-color: transparent;
    padding: 20px 10%;
    user-select: none;
    position: relative;
}

.nav-section {
    display: flex;
    align-items: center;
    gap: 20px;
}

.logo-container {
    display: flex;
    align-items: center;
}

.logo {
    height: 40px;
}

.nav-links {
    display: flex;
    list-style: none;
    gap: 20px;
    margin: 0;
    align-items: center;
}

.nav-links a {
    text-decoration: none;
    color: rgb(49, 49, 49);
    font-weight: 500;
    display: flex;
    align-items: center;
    gap: 5px;
}

.nav-links a:hover {
    font-weight: bold;
    color: #1976d2;
}

.desktop-login {
    background-color: #1976d2;
    border: none;
    border-radius: 20px;
    padding: 8px 25px;
    font-size: 14px;
    cursor: pointer;
    color: aliceblue;
    transition: 0.5s;
}

.desktop-login:hover {
    background-color: rgb(54, 54, 201);
    transform: scale(1.05);
    box-shadow: 0px 0px 5px 0px rgba(0, 0, 0, 0.2);
}

.user-info {
    display: flex;
    align-items: center;
    gap: 10px;
}

.user-name {
    font-weight: bold;
    color: #333;
}

.logout-button {
    background-color: transparent;
    border: none;
    font-size: 18px;
    cursor: pointer;
    color: #d9534f;
    transition: transform 0.2s ease-in-out;
}

.logout-button:hover {
    transform: scale(1.2);
    color: #c9302c;
}

.hamburger {
    display: none;
    background: none;
    border: none;
    font-size: 24px;
    cursor: pointer;
}

@media (max-width: 1038px) {
    .hamburger {
        display: block;
    }

    .desktop-login {
        display: none;
    }

    .nav-links {
        position: absolute;
        top: 60px;
        left: 0;
        right: 0;
        background-color: white;
        flex-direction: column;
        align-items: center;
        gap: 15px;
        padding: 20px;
        width: 100%;
        transform: translateY(-150%);
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        transition: transform 0.3s ease-in-out;
        z-index: 100;
    }

    .nav-links.nav-active {
        transform: translateY(0);
    }

    .nav-links li {
        width: 100%;
        text-align: center;
    }

    .nav-links a {
        display: block;
        padding: 10px 0;
    }
}
</style>