<script setup>
import { ref } from 'vue'
import NavBar from './components/componentsGestio/NavBar.vue';
import router from './router';
</script>

<template>
    <NavBar />
    <router-view />
</template>

<style scoped>
</style>