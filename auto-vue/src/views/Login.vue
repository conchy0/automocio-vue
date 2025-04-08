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
      <div class="form-group password-group">
        <label for="password">Contrasenya</label>
        <div class="password-wrapper">
        
          <input
            v-if="showPassword"
            type="text"
            id="password"
            v-model="password"
            placeholder="Entra la teva contrasenya"
            required
          />
         
          <input
            v-else
            type="password"
            id="password"
            v-model="password"
            placeholder="Entra la teva contrasenya"
            required
          />
          <i
            :class="getPasswordIconClass()"
            @click="togglePasswordVisibility"
            class="toggle-password"
          ></i>
        </div>
      </div>
      <div class="form-register">
        <p>Encara no tens compte? <a href="/register">Registra't aquí</a></p>
      </div>
      <button type="submit" class="login-button">Iniciar Sessió</button>
    </form>
  </div>
</template>

<script setup>
import { ref } from 'vue';
import { useRouter } from 'vue-router';
import axios from 'axios';
import { toast } from 'vue3-toastify';
import { eventBus } from '../eventBus';

const email = ref('');
const password = ref('');
const showPassword = ref(false); 
const router = useRouter();

const handleLogin = () => {
  axios
    .post('http://localhost/automocio-vue/back/auth/login', {
      correu: email.value,
      contrasenya: password.value,
    })
    .then(function (resposta) {
      const dadesUsuari = resposta.data.user;
      sessionStorage.setItem('token', resposta.data.token);
      eventBus.setUser(dadesUsuari);
      sessionStorage.setItem('user', JSON.stringify(dadesUsuari));

      sessionStorage.setItem('toastMessage', 'Sessió iniciada correctament');

      router.push('/');
    })
    .catch(function (error) {
      toast.error(error.response.data.error || 'Error en iniciar sessió', { position: 'top-center' });
    });
};


const togglePasswordVisibility = () => {
  showPassword.value = !showPassword.value;
};


const getPasswordIconClass = () => {
  if (showPassword.value) {
    return 'pi pi-eye-slash';
  } else {
    return 'pi pi-eye';
  }
};
</script>

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

.password-group {
  position: relative;
}

.password-wrapper {
  display: flex;
  align-items: center;
  position: relative;
}

.toggle-password {
  position: absolute;
  right: 10px;
  cursor: pointer;
  font-size: 18px;
  color: #555;
  transition: color 0.3s;
}

.toggle-password:hover {
  color: #1976d2;
}

.login-button {
  width: 50%;
  padding: 10px;
  margin-top: 50px;
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