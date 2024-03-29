<script setup>
import { router } from '@inertiajs/vue3'
import Checkbox from '@/Components/Checkbox.vue';

const { data, routeName, fieldName } = defineProps(['data', 'routeName', 'fieldName']);
const toggleStatus = async (data) => {
    const url = route(routeName, {
        id: data.id,
    });

    await router.put(url, {
        [fieldName]: data[fieldName],
    }, {
        preserveScroll: true,
    });
};
</script>


<template>
    <Checkbox :class="'h-8 w-8'" :checked="data[fieldName] === 1 ? true : false" @change="toggleStatus(data)" />
</template>