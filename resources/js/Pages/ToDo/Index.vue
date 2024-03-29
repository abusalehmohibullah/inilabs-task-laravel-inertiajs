<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import { Link } from '@inertiajs/vue3';
import Header from '../../Components/Header.vue';
import PrimaryButton from '../../Components/PrimaryButton.vue';
import ShowToDoTable from './Partials/ShowToDoTable.vue';

const props = defineProps({
    toDos: Object
});

</script>

<template>
    <AppLayout>
        <template #header>
            <Header>
                <template #header>
                    To-Dos
                </template>

                <template #aside>
                    <Link :href="route('to-dos.create')">
                    <PrimaryButton>
                        Create
                    </PrimaryButton>
                    </Link>
                </template>
            </Header>
        </template>
        <template #main>
            <ShowToDoTable :toDos="toDos" />
        </template>
    </AppLayout>
</template>
