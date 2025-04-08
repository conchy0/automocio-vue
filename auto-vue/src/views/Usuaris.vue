<script>
import { ref } from 'vue';
import Inscripcio from '../components/componentsGestio/inscripcio.vue'; 

export default {
  components: {
    Inscripcio, 
  },
};
</script>

<template>
  <div class="usuaris-container">
    <h1>Llista d'Usuaris</h1>
    <Inscripcio />
  </div>
</template>

<style scoped>
.usuaris-container {
  padding: 20px;
  max-width: 1200px;
  margin: 0 auto;
}

h1 {
  text-align: center;
  margin-bottom: 20px;
  color: #333;
}
</style>