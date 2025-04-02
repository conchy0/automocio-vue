<script setup>
import NavBar from './components/componentsGestio/NavBar.vue';
import Footer from './components/componentsGestio/footer.vue';
</script>

<template>
  <div id="app">
    <NavBar />
    <main class="main-content">
      <router-view />
    </main>
    <Footer />
  </div>
</template>



<style scoped>
#app {
  display: flex;
  flex-direction: column;
  min-height: 100vh; 
}

.main-content {
  flex: 1; 
}
</style>