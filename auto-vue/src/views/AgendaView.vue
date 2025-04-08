<script>
    import '@vueup/vue-quill/dist/vue-quill.snow.css';

</script> 
    
    
<template>
    <div class="agenda-view">
    <h1>Agenda</h1>
    <QuillEditor toolbar="full" theme="snow" />
</div>

</template>
    
    
<style>
    .agenda-view {
       width: 80%;
       margin-top: 2%;
       margin-left: 10%;
       display: flex;
       flex-direction: column;
    }
</style>