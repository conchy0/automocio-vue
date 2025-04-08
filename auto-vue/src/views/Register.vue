<script setup>
import { ref } from 'vue';
import { useRouter } from 'vue-router';
import axios from 'axios';
import { toast } from 'vue3-toastify';
import Checkbox from 'primevue/checkbox';

const username = ref('');
const email = ref('');
const password = ref('');
const confirmPassword = ref('');
const checked = ref(false);
const showPassword = ref(false);
const showConfirmPassword = ref(false); 
const router = useRouter();

const handleRegister = () => {
  if (password.value !== confirmPassword.value) {
    toast.error('La contrasenya no coincideix', { position: 'top-center' });
    return;
  }
  if (!checked.value) {
    toast.warning('Accepta la Política de Privacitat', { position: 'top-center' });
    return;
  }

  axios
    .post('http://localhost/automocio-vue/back/auth/register', {
      nom_usuari: username.value,
      correu: email.value,
      contrasenya: password.value,
      politica_privacitat_acceptada: checked.value,
    })
    .then(function (resposta) {
      sessionStorage.setItem('toastMessage', 'Registre fet amb èxit');
      router.push('/login');
    })
    .catch(function (error) {
      toast.error(error.response.data.error || 'Error en el registre', { position: 'top-center' });
    });
};

const togglePasswordVisibility = () => {
  showPassword.value = !showPassword.value;
};

const toggleConfirmPasswordVisibility = () => {
  showConfirmPassword.value = !showConfirmPassword.value;
};


const getPasswordIconClass = (isVisible) => {
  if (isVisible) {
    return 'pi pi-eye-slash';
  } else {
    return 'pi pi-eye';
  }
};
</script>

<template>
  <div class="register-container">
    <h1>Registrat</h1>
    <form @submit.prevent="handleRegister">
      <div class="form-group">
        <label for="username">Nom d'Usuari</label>
        <input type="text" id="username" v-model="username" required />
      </div>
      <div class="form-group">
        <label for="email">Correu Electrònic</label>
        <input type="email" id="email" v-model="email" required />
      </div>
      <div class="form-group">
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
            :class="getPasswordIconClass(showPassword)"
            @click="togglePasswordVisibility"
            class="toggle-password"
          ></i>
        </div>
      </div>
      <div class="form-group">
        <label for="confirm-password">Confirmar Contrasenya</label>
        <div class="password-wrapper">
          <input
            v-if="showConfirmPassword"
            type="text"
            id="confirm-password"
            v-model="confirmPassword"
            placeholder="Confirma la teva contrasenya"
            required
          />
          <input
            v-else
            type="password"
            id="confirm-password"
            v-model="confirmPassword"
            placeholder="Confirma la teva contrasenya"
            required
          />
          <i
            :class="getPasswordIconClass(showConfirmPassword)"
            @click="toggleConfirmPasswordVisibility"
            class="toggle-password"
          ></i>
        </div>
      </div>

      <div class="terms">
        <Checkbox v-model="checked" :invalid="!checked" binary />
        <p>Accepto la <a href="#">Política de Privacitat</a></p>
      </div>

      <button type="submit" class="register-button">Registrar-se</button>
    </form>
  </div>
</template>

<style scoped>
.register-container {
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

.register-button {
  width: 50%;
  padding: 10px;
  margin-top: 40px;
  background-color: #1976d2;
  border: none;
  border-radius: 5px;
  color: #fff;
  font-size: 16px;
  cursor: pointer;
  transition: background-color 0.3s;
}

.register-button:hover {
  background-color: rgb(36, 36, 118);
}

.terms {
  display: flex;
  align-items: center;
  gap: 8px;
  margin-top: 10px;
}

.terms p {
  margin: 0;
  font-size: 14px;
}

.terms a {
  color: #1976d2;
  text-decoration: none;
}

.terms a:hover {
  text-decoration: underline;
}
</style>