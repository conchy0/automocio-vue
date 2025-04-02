<script>
import { ref } from 'vue';
import { toast } from 'vue3-toastify';
import Checkbox from 'primevue/checkbox';

export default {
  components: {
    Checkbox,
  },
  setup() {
    const username = ref('');
    const email = ref('');
    const password = ref('');
    const confirmPassword = ref('');
    const checked = ref(false); 

    const handleRegister = () => {
        if (password.value !== confirmPassword.value) {
            toast.error('La contrasenya no coincideix', { position: 'top-center' });
            return;
        }
        if (!checked.value) { 
            toast.warning('Accepta la Política de Privacitat', { position: 'top-center' });
            return;
        }
        toast.success('Registre fet amb èxit', { position: 'top-center' });
        console.log('Username:', username.value);
        console.log('Email:', email.value);
        console.log('Password:', password.value);
    };

    return {
      username,
      email,
      password,
      confirmPassword,
      checked,
      handleRegister
    };
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
        <input type="password" id="password" v-model="password" required />
      </div>
      <div class="form-group">
        <label for="confirm-password">Confirmar Contrasenya</label>
        <input type="password" id="confirm-password" v-model="confirmPassword" required />
      </div>
      <Checkbox v-model="checked" :invalid="!checked"  binary />
      <div class="terms">
        <p>Accepto la <a href="#">Política de Privacitat</a></p>
      </div>
      <button type="submit" class="register-button">Registrar-se</button>
    </form>
  </div>
</template>


<style scoped>
.register-container {
  max-width: 400px;
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

.register-button {
  width: 50%;
  padding: 10px;
  margin-top: 20px;
  background-color:#1976d2;
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
</style>
