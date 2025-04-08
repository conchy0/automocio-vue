<script>
    import { ref } from 'vue';
    import DataTable from 'primevue/datatable';
    import Column from 'primevue/column';
    import InputText from 'primevue/inputtext';
    import InputNumber from 'primevue/inputnumber';
    import Select from 'primevue/select';
    import Tag from 'primevue/tag';

    export default {
        setup() {
            const products = ref([
                { id: 1, code: 'A001', name: 'Product A', inventoryStatus: 'IN_STOCK', price: 20.0 },
                { id: 2, code: 'A002', name: 'Product B', inventoryStatus: 'OUT_OF_STOCK', price: 15.0 },
                { id: 3, code: 'A003', name: 'Product C', inventoryStatus: 'IN_STOCK', price: 25.0 },
            ]);

            const statuses = ref([
                { label: 'In Stock', value: 'IN_STOCK' },
                { label: 'Out of Stock', value: 'OUT_OF_STOCK' },
                { label: 'Discontinued', value: 'DISCONTINUED' }
            ]);

            const editingRows = ref([]);

            // Format currency helper function
            const formatCurrency = (value) => {
                return new Intl.NumberFormat('en-US', {
                    style: 'currency',
                    currency: 'USD'
                }).format(value);
            };

            // Status label helper function
            const getStatusLabel = (status) => {
                if (status === 'IN_STOCK') return 'success';
                if (status === 'OUT_OF_STOCK') return 'danger';
                return 'info';
            };

            // Row edit save handler
            const onRowEditSave = (event) => {
                console.log('Row Edited:', event.data);
            };

            return {
                products,
                statuses,
                editingRows,
                formatCurrency,
                getStatusLabel,
                onRowEditSave
            };
        }
    };
</script>

<template>
    <DataTable v-model:editingRows="editingRows" :value="products" editMode="row" dataKey="id" @row-edit-save="onRowEditSave"
        :pt="{
            table: { style: 'min-width: 50rem' },
            column: {
                bodycell: ({ state }) => ({
                    style: state['d_editing'] && 'padding-top: 0.75rem; padding-bottom: 0.75rem'
                })
            }
        }"
    >
        <Column field="code" header="Code" style="width: 20%">
            <template #editor="{ data, field }">
                <InputText v-model="data[field]" />
            </template>
        </Column>

        <Column field="name" header="Name" style="width: 20%">
            <template #editor="{ data, field }">
                <InputText v-model="data[field]" fluid />
            </template>
        </Column>

        <Column field="inventoryStatus" header="Status" style="width: 20%">
            <template #editor="{ data, field }">
                <Select v-model="data[field]" :options="statuses" optionLabel="label" optionValue="value" placeholder="Select a Status" fluid>
                    <template #option="slotProps">
                        <Tag :value="slotProps.option.value" :severity="getStatusLabel(slotProps.option.value)" />
                    </template>
                </Select>
            </template>
            <template #body="slotProps">
                <Tag :value="slotProps.data.inventoryStatus" :severity="getStatusLabel(slotProps.data.inventoryStatus)" />
            </template>
        </Column>

        <Column field="price" header="Price" style="width: 20%">
            <template #body="{ data, field }">
                {{ formatCurrency(data[field]) }}
            </template>
            <template #editor="{ data, field }">
                <InputNumber v-model="data[field]" mode="currency" currency="USD" locale="en-US" fluid />
            </template>
        </Column>

        <Column :rowEditor="true" style="width: 10%; min-width: 8rem" bodyStyle="text-align:center"></Column>
    </DataTable>
</template>

<style>
    .p-datatable {
        margin: 20px;
    }

    .p-datatable-header {
        background-color: #f4f4f4;
        border-bottom: 1px solid #ccc;
    }

    .p-datatable-header th {
        font-weight: bold;
        color: #333;
    }

    .p-datatable-body td {
        padding: 10px;
        border-bottom: 1px solid #ccc;
    }

    .p-datatable-row-editing {
        background-color: #e0f7fa;
    }
</style>
