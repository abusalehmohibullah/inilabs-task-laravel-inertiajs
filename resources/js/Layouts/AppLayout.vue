<script setup>
import { Head } from '@inertiajs/vue3';
import Sidebar from '../Components/Sidebar.vue';
import Topbar from '../Components/Topbar.vue';

</script>

<template>
    <div>

        <Head :title="title" />

        <div class="min-h-screen flex flex-col flex-auto flex-shrink-0 antialiased bg-gray-50 text-gray-800">

            <Sidebar />

            <div class="main">
                        <Topbar />
                    <!-- Page Content -->
                    <main class="content">
                        <!-- <slot name="header" /> -->
                        <slot />
                    </main>
                </div>

        </div>
    </div>
</template>
