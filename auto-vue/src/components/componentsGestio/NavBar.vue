<script setup>
import { ref } from 'vue';
import { useRouter } from 'vue-router';


const router = useRouter();

const navigateTo = (path) => {
    router.push(path);
};
</script>

<template>
    <nav class="navbar">
        <img src="/logo.png" alt="Logo" class="logo">
        <ul class="nav-links">
            <li><RouterLink to="/">Inici</RouterLink></li>
            <li><RouterLink to="/agenda">Agenda</RouterLink></li>
            <li><RouterLink to="/hackato">Hackato</RouterLink></li>
            <li><RouterLink to="/actualitat">Actualitat</RouterLink></li>
            <li><RouterLink to="/lloc">Lloc</RouterLink></li>
        </ul>
        <RouterLink to="/" class="login-button">Iniciar Sessio</RouterLink>
    </nav>
</template>

<style scoped>
.navbar {
    display: flex;
    align-items: center;
    justify-content: space-between;
    background-color: transparent;
    padding: 10px 20px;
    user-select: none;
}

.logo {
    height: 50px;
}

.nav-links {
    display: flex;
    list-style: none;
    gap: 20px;
}

.nav-links a {
    text-decoration: none;
    color: rgb(62, 62, 175); 
    margin-right: 10px;
    
}

.nav-links a:hover {
    font-weight: bold;
    color: rgb(0, 0, 139); 
}

.login-button {
    background-color: transparent;
    border: 2px solid rgb(62, 62, 175); 
    border-radius: 20px;
    color: rgb(62, 62, 175);  
    padding: 5px 10px;
    cursor: pointer;
    font-weight: bold;
    transition: 0.5s;
}

.login-button:hover {
    background-color: rgb(62, 62, 175); 
    color: white;
}
</style>