<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import { Head } from '@inertiajs/vue3';
import EditToDoForm from './Partials/EditToDoForm.vue';

const props = defineProps({
    toDo: Object
});
</script>

<template>
  <AppLayout>

    <Head title="Edit Task" />
    <template #header>
      Edit Task
    </template>

    <template #main>
      <EditToDoForm :toDo="toDo" />
    </template>
  </AppLayout>
</template>
