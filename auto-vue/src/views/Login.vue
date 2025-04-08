<script setup>
import { ref } from 'vue';
import { toast } from 'vue3-toastify';

const email = ref('');
const password = ref('');

const handleLogin = () => {
    toast.success('Registre fet amb èxit', { position: 'top-center' });
  console.log('Email:', email.value);
  console.log('Password:', password.value);
};
</script>

<template>
  <div class="login-container">
    <h1>Iniciar Sessió</h1>
    <form @submit.prevent="handleLogin">
      <div class="form-group">
        <label for="email">Correu Electrónic</label>
        <input
          type="email"
          id="email"
          v-model="email"
          placeholder="Entra el teu correu electrònic"
          required
        />
      </div>
      <div class="form-group">
        <label for="password">Contrassenya</label>
        <input
          type="password"
          id="password"
          v-model="password"
          placeholder="Entra la teva contrassenya"
          required
        />
      </div>
      <div class="form-register">
        <p>Encara no tens compte? <a href="/register">Registra't aquí</a></p>
      </div>
      <button type="submit" class="login-button">Iniciar Sessió</button>
      
    </form>
  </div>
</template>

<style scoped>
.login-container {
  max-width: 500px;
  margin: 50px auto;
  padding: 50px;
  border: 1px solid #ccc;
  border-radius: 10px;
  box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
  background-color: #fff;
  text-align: center;
}

h1 {
  margin-bottom: 20px;
  font-size: 24px;
  color: #333;
}

.form-group {
  margin-bottom: 15px;
  text-align: left;
}

label {
  display: block;
  margin-bottom: 5px;
  font-weight: bold;
  color: #555;
}

input {
  width: 100%;
  padding: 10px;
  border: 1px solid #ccc;
  border-radius: 5px;
  font-size: 14px;
}

input:focus {
  outline: none;
  border-color: #1976d2;
  box-shadow: 0 0 5px rgba(0, 123, 255, 0.5);
}

.login-button {
  width: 50%;
  padding: 10px;
  margin-top: 10vh;
  background-color: #1976d2;
  border: none;
  border-radius: 5px;
  color: #fff;
  font-size: 16px;
  cursor: pointer;
  transition: background-color 0.3s;
}

.login-button:hover {
    background-color: rgb(36, 36, 118);
}

</style>