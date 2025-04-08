<script>
import '@vueup/vue-quill/dist/vue-quill.snow.css';
import { ref } from 'vue';
import { useRouter } from 'vue-router';
import Select from 'primevue/select';


</script>

<template>
  <div class="agenda-view">
    <div class="header">
      <h1>Agenda</h1>
      <div class="confirm-btn">
      <button class="login-button" @click.prevent="navigateTo('/login')">Confirmar Assistència</button>
    </div>
    </div>
    <QuillEditor toolbar="full" theme="snow" />
    <!-- <i class="pi pi-save"></i> -->
    <hr class="gradient-divider">
    <div class="select-container">
      <select class="custom-select" v-model="selectedOption">
        <option value="dia1">Dia 1</option>
        <option value="dia2">Dia 2</option>
        <option value="dia3">Dia 3</option>
      </select>
    </div>
  </div>
  
</template>

<style scoped>
.agenda-view {
  width: 80%;
  margin-top: 2%;
  margin-left: 10%;
  display: flex;
  flex-direction: column;
}

.header {
  display: flex;
  justify-content: space-between; 
  align-items: center; 
  margin-bottom: 20px; 
}

h1 {
  margin: 0; 
}

.login-button {
    background-color: #1976d2;
    border: none;
    border-radius: 20px;
    padding: 8px 25px;
    font-size: 14px;
    cursor: pointer;
    color: aliceblue;
    transition: 0.5s;
    width: 100%;
}

.login-button:hover {
    background-color: rgb(48, 48, 234);
    transform: scale(1.05);
    box-shadow: 0px 0px 5px 0px rgba(0, 0, 0, 0.2);
}
.pi {
    cursor: pointer;
    display: flex;
    justify-content: right;
    padding: 10px 10px;  
    
}
.gradient-divider {
    border: none;
    height: 2px;
    background: linear-gradient(to right, rgba(255, 0, 0, 0), #1976d2, rgba(255, 0, 0, 0));
    margin-top: 2%;
    width: 100%;
}

.select-container {
  margin-top: 2%;
  
}
.select-container {
  margin-top: 2%;
  align-items: center;
}
.custom-select {
  width: 100px;
  padding: 5px;
  font-size: 16px;
  border: 2px solid black;
  border-radius: 20px;
  background-color: #fff;
  color: #333;
  cursor: pointer;
  transition: all 0.3s ease-in-out;
  text-align: center;
}

.custom-select:hover {
  border-color: #1259a7;
}

.custom-select:focus {
  outline: none;
  border-color: #0d47a1;
  box-shadow: 0 0 5px rgba(25, 118, 210, 0.5);
}

.custom-select option {
  background: white;
  color: black;
}



</style>