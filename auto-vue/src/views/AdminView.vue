<template>
  <div class="admin-container">
    <div class="header">
      <h1>Gestió d'Usuaris</h1>
      <div class="search-container">
        <transition name="slide-fade">
          <InputText
            v-if="showSearch"
            v-model="searchQuery"
            placeholder="Cerca per nom d'usuari..."
            class="search-input"
          />
        </transition>
        <Button
          icon="pi pi-search"
          class="p-button-text search-button"
          @click="toggleSearch"
        />
      </div>
    </div>

    <DataTable
      :value="filteredUsers"
      dataKey="id"
      responsiveLayout="scroll"
      :pt="{
        table: { style: 'margin-top: 0' },
        thead: { style: 'background-color: #f8f9fa' }
      }"
    >
      <Column field="nom_usuari" header="Nom d'Usuari" style="width: 30%">
        <template #body="slotProps">
          <template v-if="editingRow === slotProps.data.id">
            <InputText v-model="slotProps.data.nom_usuari" />
          </template>
          <template v-else>
            {{ slotProps.data.nom_usuari }}
          </template>
        </template>
      </Column>
      <Column field="correu" header="Correu Electrònic" style="width: 40%">
        <template #body="slotProps">
          <template v-if="editingRow === slotProps.data.id">
            <InputText v-model="slotProps.data.correu" />
          </template>
          <template v-else>
            {{ slotProps.data.correu }}
          </template>
        </template>
      </Column>
      <Column header="Accions" style="width: 20%; text-align: center">
        <template #body="slotProps">
          <template v-if="editingRow === slotProps.data.id">
            <Button
              icon="pi pi-check"
              class="p-button-text p-button-sm p-button-secondary"
              @click="saveEdit(slotProps.data)"
            />
            <Button
              icon="pi pi-times"
              class="p-button-text p-button-sm p-button-secondary"
              @click="cancelEdit"
            />
          </template>
          <template v-else>
            <Button
              icon="pi pi-pencil"
              class="p-button-text p-button-sm p-button-secondary"
              @click="startEdit(slotProps.data.id)"
            />
            <Button
              icon="pi pi-trash"
              class="p-button-text p-button-sm p-button-secondary"
              @click="confirmDelete(slotProps.data)"
            />
          </template>
        </template>
      </Column>
    </DataTable>
  </div>
</template>

<script setup>
import { ref, computed, onMounted } from 'vue';
import DataTable from 'primevue/datatable';
import Column from 'primevue/column';
import InputText from 'primevue/inputtext';
import Button from 'primevue/button';
import { toast } from 'vue3-toastify';
import axios from 'axios';

const users = ref([]);
const editingRow = ref(null);
const searchQuery = ref('');
const showSearch = ref(false);

const fetchUsers = () => {
  const token = sessionStorage.getItem('token');
  axios
    .get('http://localhost/automocio-vue/back/user/all', {
      headers: {
        Authorization: `Bearer ${token}`,
      },
    })
    .then((response) => {
      users.value = response.data;
    })
    .catch(() => {
      toast.error('Error en obtenir els usuaris', { position: 'top-center' });
    });
};

const filteredUsers = computed(() => {
  if (!searchQuery.value) return users.value;
  return users.value.filter((user) =>
    user.nom_usuari.toLowerCase().includes(searchQuery.value.toLowerCase())
  );
});

const toggleSearch = () => {
  showSearch.value = !showSearch.value;
  if (showSearch.value) {
    setTimeout(() => {
      document.querySelector('.search-input')?.focus();
    }, 100);
  }
};

const startEdit = (id) => {
  editingRow.value = id;
};

const cancelEdit = () => {
  editingRow.value = null;
  fetchUsers(); // Refresca els usuaris per descartar els canvis
};

const saveEdit = (user) => {
  const token = sessionStorage.getItem('token');
  axios
    .put(
      'http://localhost/automocio-vue/back/user/update',
      {
        id: user.id,
        nom_usuari: user.nom_usuari,
        correu: user.correu,
        rol: user.rol,
      },
      {
        headers: {
          Authorization: `Bearer ${token}`,
        },
      }
    )
    .then(() => {
      toast.success('Usuari editat correctament', { position: 'top-center' });
      editingRow.value = null;
      fetchUsers();
    })
    .catch(() => {
      toast.error('Error en actualitzar l\'usuari', { position: 'top-center' });
    });
};

const confirmDelete = (user) => {
  toast.info(
    `Estàs segur que vols eliminar l'usuari ${user.nom_usuari}?`,
    {
      position: 'top-center',
      autoClose: false,
      closeOnClick: false,
      draggable: false,
      buttons: [
        {
          text: 'Sí',
          onClick: () => deleteUser(user),
        },
        {
          text: 'No',
          onClick: () => toast.dismiss(),
        },
      ],
    }
  );
};

const deleteUser = (user) => {
  const token = sessionStorage.getItem('token');
  axios
    .delete('http://localhost/automocio-vue/back/user/delete', {
      headers: {
        Authorization: `Bearer ${token}`,
      },
      data: { id: user.id },
    })
    .then(() => {
      toast.success('Usuari eliminat correctament', { position: 'top-center' });
      fetchUsers();
    })
    .catch(() => {
      toast.error('Error en eliminar l\'usuari', { position: 'top-center' });
    });
};

onMounted(() => {
  fetchUsers();
});
</script>

<style scoped>
.admin-container {
  max-width: 1200px;
  margin: 20px auto;
  padding: 20px;
  background-color: #fff;
  border-radius: 6px;
}

.header {
  display: flex;
  justify-content: space-between;
  align-items: center;
  margin-bottom: 1.5rem;
}

h1 {
  font-size: 1.5rem;
  color: #333;
  margin-left: 3%;
  font-weight: 600;
}

.search-container {
  display: flex;
  align-items: center;
  gap: 0.5rem;
}

.search-button {
  color: #6c757d;
  width: 2.5rem;
  height: 2.5rem;
}

.search-button:hover {
  color: #495057;
  background-color: #f8f9fa;
}

.search-input {
  width: 250px;
  transition: all 0.3s ease;
}

.p-datatable {
  margin-top: 0;
}

.p-datatable-thead > tr > th {
  background-color: #f8f9fa !important;
}
</style>