<script setup>
import { computed } from 'vue';
import { Link } from '@inertiajs/vue3';

const props = defineProps({
    href: String,
    active: Boolean,
});

const classes = computed(() => {
    return props.active
        ? 'relative flex flex-row items-center h-11 focus:outline-none hover:bg-gray-50 text-gray-600 hover:text-gray-800 border-l-4 border-transparent hover:border-indigo-500 pr-6'
        : 'relative flex flex-row items-center h-11 focus:outline-none hover:bg-gray-50 text-gray-600 hover:text-gray-800 border-l-4 border-transparent hover:border-indigo-500 pr-6';
});
</script>

<template>
    <li>
    <Link :href="href" :class="classes">

            <span class="inline-flex justify-center items-center ml-4 w-6">
                <slot name="icon" />

            </span>
            <span class="text-sm tracking-wide truncate">
                <slot name="name" />
            </span>
        </Link>
    </li>
</template>
