<script setup>
import { ref } from 'vue';
import { toast } from 'vue3-toastify';

const name = ref('');
const email = ref('');
const age = ref('');
const gender = ref('');
const termsAccepted = ref(false);

const handleFormSubmit = () => {
  toast.success('Formulari enviat amb èxit!', { position: 'top-center' });
  console.log('Nom:', name.value);
  console.log('Correu Electrònic:', email.value);
  console.log('Edat:', age.value);
  console.log('Gènere:', gender.value);
  console.log('Accepta Termes:', termsAccepted.value);
};
</script>

<template>
  <div class="form-container">
    <h1>Formulari</h1>
    <form @submit.prevent="handleFormSubmit">
      <!-- Nom -->
      <div class="form-group">
        <label for="name">Nom</label>
        <input
          type="text"
          id="name"
          v-model="name"
          placeholder="Entra el teu nom"
          required
        />
      </div>

      <!-- Cognom -->
      <div class="form-group">
        <label for="cognom">Cognom</label>
        <input
          type="text"
          id="name"
          v-model="cognom"
          placeholder="Entra el teu cognom"
          required
        />
      </div>

      <!-- Correu Electrònic -->
      <div class="form-group">
        <label for="email">Correu Electrònic</label>
        <input
          type="email"
          id="email"
          v-model="email"
          placeholder="Entra el teu correu electrònic"
          required
        />
      </div>


      <!-- Inscrit -->
      <div class="form-group">
        <label>Et vols inscriure en el 2n Hackathon en el sector de l'Automoció de les Comarques Gironines?</label>
        <div>
          <label>
            <input
              type="checkbox"
              value="Si"
              v-model="Si"
              required
            />
            Si
          </label>
          <label>
            <input
              type="checkbox"
              value="No"
              v-model="No"
              required
            />
            No
          </label>
        </div>
      </div>

      <!-- Inscrit -->
      <div class="form-group">
        <label>De quin àmbit ets?</label>
        <div>
          <label>
            <input
              type="radio"
              value="Si"
              v-model="Si"
              required
            />
            Soc de l'àmbit educatiu
          </label>
          <label>
            <input
              type="radio"
              value="No"
              v-model="No"
              required
            />
            Soc professional del sector de l'automoció
          </label>
        </div>
      </div>

      

      <!-- Botó d'Enviament -->
      <button type="submit" class="submit-button">Enviar Formulari</button>
    </form>
  </div>
</template>

<style scoped>
.form-container {
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

input[type="text"],
input[type="email"],
input[type="number"] {
  width: 100%;
  padding: 10px;
  border: 1px solid #ccc;
  border-radius: 5px;
  font-size: 14px;
}

input[type="radio"],
input[type="checkbox"] {
  margin-right: 5px;
}

input:focus {
  outline: none;
  border-color: #1976d2;
  box-shadow: 0 0 5px rgba(0, 123, 255, 0.5);
}

.submit-button {
  width: 100%;
  padding: 10px;
  background-color: #1976d2;
  border: none;
  border-radius: 5px;
  color: #fff;
  font-size: 16px;
  cursor: pointer;
  transition: background-color 0.3s;
}

.submit-button:hover {
  background-color: rgb(36, 36, 118);
}
</style>