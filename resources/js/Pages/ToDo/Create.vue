<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import { Head } from '@inertiajs/vue3';

import CreateToDoForm from './Partials/CreateToDoForm.vue';

</script>

<template>
  <AppLayout>

    <Head title="Create a Task" />
    <template #header>
      Create a Task
    </template>

    <template #main>
      <CreateToDoForm />
    </template>
  </AppLayout>
</template>
