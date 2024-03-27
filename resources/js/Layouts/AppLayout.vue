<script setup>
import { Head } from '@inertiajs/vue3';

</script>

<template>
    <div>

        <Head :title="title" />

        <div class="bg-gray-100">

            <slot />

        </div>
    </div>
</template>

